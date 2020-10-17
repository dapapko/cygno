<?php


namespace app\Http\Controllers;

use App\Groups;
use App\Vector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Group;


class GroupController extends Controller
{
    public function add(Request $request)
    {
        $group = new Groups();
        $group->fill($request->all());
        $group->vector = [];
        $group->save();
        return redirect('/groups');
    }

    public function addRender()
    {
        return view('group.create');
    }

    public function list()
    {
        $groups = Groups::all();
        return view('group.list')->with('groups', $groups);
    }

    public function delete($id) {
        Group::findOrFail($id)->delete();
        Vector::findOrFail($id)->delete();
        DB::table('group_criteria')->where('attribute_id', $id)->delete();
        DB::table('group_filter')->where('filter_id', $id)->delete();
        return redirect('/groups');
    }


}