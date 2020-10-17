<?php

namespace App\Http\Controllers;


use App\Groups;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Attributes;

class AttributeController extends Controller
{


    public function renderAdd()
    {
        return view('attribute.create');
    }


    public function add(Request $request)
    {
        $query = view('add_field')->with(['table' => 'people',
            'name' => $request->slug,
            'type' => $request->type])->render();
        $attr = new Attributes();
        $attr->slug = $request->slug;
        $attr->label = $request->label;
        $attr->type = $request->type;
        $opts = [];
        foreach($request->variants as $option) {
            $opts[str_slug($option)] = $option;
        }
        $attr->variants = collect($opts)->toJson();
        $attr->label = $request->label;
        $attr->save();
        DB::statement($query);
        return redirect('/attributes');

    }


    public function list()
    {
        $attrs = DB::table('attributes')->get();
        return view('attribute.list')->with('attrs', $attrs);
    }


    public function renderEdit($id) {

        $attr = Attributes::find($id);
        $groups = Groups::all();
        $associated = $attr->groups()->get();
        $prefs = $attr->pref_groups()->get();
        if (empty($attr)) return redirect('/attributes');
        return view('attribute.edit')
            ->with(['attr'=>$attr, 'associated'=>$associated, 'groups'=>$groups, 'prefs'=>$prefs]);
    }


    public function edit(Request $request, $id) {
        $attr = Attributes::find($id);
        $opts = [];
        foreach($request->variants as $option) {
            $opts[str_slug($option)] = $option;
        }

        $attr->variants = collect($opts)->toJson();

        $attr->groups()->detach();
        $attr->pref_groups()->detach();

        if ($request->has('groups'))
        {foreach ($request->groups as $group) $attr->groups()->attach($group);}
        if ($request->has('preferences'))
        {foreach ($request->preferences as $group) $attr->pref_groups()->attach($group);}

        $attr->save();
        return redirect('/attributes');
    }


    public function delete($id)
    {
        $attr = Attributes::find($id);
        if ($attr->slug == 'name') abort(403);
        $query = view('del_field')->with(['table' => 'people',
            'name' => $attr->slug])->render();
        DB::statement($query);
        $attr->preferences()->delete();
        $attr->filters()->delete();
        $attr->delete();
        return redirect('/attributes');
    }

}
