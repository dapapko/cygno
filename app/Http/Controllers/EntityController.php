<?php

namespace App\Http\Controllers;

use App\Attribute;
use App\Attributes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EntityController extends Controller
{
    public function renderEdit($id)
    {
        $attributes = Attribute::all();
        $entry = DB::table('people')->find($id);
        return view('entity.edit')->with(["fields" => $attributes, "entry" => $entry]);
    }

    public function edit(Request $request, $id)
    {
        $attrs = Attribute::all();
        $upd = ['name'=>$request->name];
        foreach ($attrs as $attr) {
            if($attr->type == "BOOLEAN") $upd[$attr->slug] = isset($request->{$attr->slug});
            elseif($attr->type == "TEXT") $upd[$attr->slug] = json_encode($request->{$attr->slug});
            else $upd[$attr->slug] = $request->{$attr->slug};
        }

        DB::table('people')->where('id', $id)->update($upd);
        return redirect('/entities');
    }

    public function list()
    {
        $entities = DB::table('people')->get();
        return view('entity.list')->with('banks', $entities);
    }

    public function renderAdd() {
        $fields = Attributes::all();
        return view('entity.create')->with('fields', $fields);
    }

    public function add(Request $request) {
        $attrs = Attributes::all();
        $upd = ['name'=>$request->name];
        foreach ($attrs as $attr) {
            if($attr->type == "BOOLEAN") $upd[$attr->slug] = isset($request->{$attr->slug});
            elseif($attr->type == "TEXT") $upd[$attr->slug] = json_encode($request->{$attr->slug});
            else $upd[$attr->slug] = $request->{$attr->slug};
        }
        DB::table('people')->insert($upd);
        return redirect('/entities');
    }

    public function delete($id) {
        DB::table('people')->delete($id);
        return redirect('/entities');
    }

}
