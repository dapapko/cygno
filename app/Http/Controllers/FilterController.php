<?php

namespace App\Http\Controllers;
use App\Attribute;
use App\Attributes;
use App\Filters;
use App\Group;
use App\Groups;
use App\Vector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class FilterController extends Controller
{
    

    public function render($group_id)
    {
        $group = Groups::find($group_id);
        $crit = $group->criteria()->get();
        $prefs = $group->preferences()->get();
        $filters = $group->filters()->get();
        return view('filter')
            ->with(['filters'=> $filters, 'crit'=>$crit,
                'prefs'=>$prefs, 'vector'=>$group->vector]);
    }

    public function addRender()
    {
        $attributes = Attributes::all();
        return view('filter.create')->with('attrs', $attributes);
    }

    public function add(Request $request)
    {
        $filter = new Filters();
        $attr = Attributes::findOrFail($request->attr);
        $filter->fill($request->all());
        $filter->attribute_id = $attr->id;
        $filter->variants = $attr->variants;
        $filter->save();
        return redirect('/filter');
    }

    public static function buildSet(Request $request) {
        return DB::table('people');
    }

    public function build(Request $request, $group_id)
    {

        $group = Groups::find($group_id);
        $filters = $group->filters()->get();
        $set = self::buildSet($request);
        $crit = $group->criteria()->pluck('slug')->toArray();
        array_unshift($crit, 'name');
        $data = $set
            ->select($crit)
            ->get();
        $req = $request->all();
        $weights = [];
        $prefweights = [];
        $prefs = [];
        foreach ($req as $k=>$v) {
            if (strpos($k, 'w_') === 0) {
                $k = substr($k,2);
                $weights[$k] = $v;
            } else if (strpos($k, 'pw_') === 0) {
                $k = substr($k,3);
                $prefweights[$k] = $v;
            } else if (strpos($k, 'pr_') === 0) {
                $k = substr($k,3);
                $prefs[$k] = $v;
            }
           
            
        }
        $sum = array_sum($weights) + array_sum($prefweights);
           if (!((0.99 <= $sum) && ($sum <= 1))) {
                return redirect()->back()
                    ->withErrors(['sum'=>"Сумма компонентов вектора должна принадлежать отрезку [0.99; 1]"]);
            }
        $pareto = Pareto::set($data, $weights, $prefweights, $prefs);
        //dd($pareto);
        return view('results')->with('results', $pareto);
    }

    public function delete($id)
    {
        $filter = Filters::find($id);
        $filter->delete();
        return redirect('/filters');
    }

    public function editRender($id)
    {
        $groups = Groups::all();
        $attrs = Attributes::all();
        $filter = Filters::findOrFail($id);
        $associated = $filter->groups()->get();
        return view('filter.edit')
            ->with(["attrs" => $attrs, "filter" => $filter,
                'associated'=>$associated, 'groups'=>$groups]);
    }

    public function edit(Request $request, $id)
    {
        $filter = Filters::findOrFail($id);
        $filter->fill($request->all());
        $filter->groups()->detach();
        foreach ($request->groups as $group) {
            $filter->groups()->attach($group);
        }
        $filter->save();
        return redirect('/filters');
    }

    public function list_groups() {
        $group = Groups::all();
        return view('index')->with('groups', $group);
    }
}
