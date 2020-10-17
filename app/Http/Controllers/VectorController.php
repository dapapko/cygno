<?php


namespace app\Http\Controllers;
use Illuminate\Http\Request;
use App\Vector;
use App\Attribute;
use Illuminate\Support\Facades\DB;

class VectorController
{
public static function getEqVector($keys){
    $v = [];
    $c = round(1/count($keys), 3);
        foreach($keys as $key) {
            $v[$key] = $c;
        }
        return $v;
}
public function updateVector(Request $request, $group_id) {
    if (array_sum($request->except('_token')) < 0.99 || array_sum($request->except('_token')) > 1 ) {
        return redirect()->back()
            ->withErrors(['sum'=>"Сумма компонентов вектора должна принадлежать отрезку [0.99; 1]"]);
    }
    $vector = Vector::findOrFail($group_id);
    $vector->group_id = $group_id;
    $vector->vector = collect($request
        ->except('_token'))
        ->toJson();

    $vector->save();
    return redirect("vector/$group_id");
}

public static function getCriterias($group_id) {
    $crit_ids = DB::table('group_criteria')
        ->where('group_id', $group_id)
        ->pluck('attribute_id')
        ->toArray();
    return Attribute::whereIn('id', $crit_ids)->pluck('slug')->toArray();
}

public static function createVector($group_id) {

    $vector = new Vector();
    $vector->vector = collect(self::getEqVector(self::getCriterias($group_id)))
        ->toJson();
    $vector->group_id = $group_id;
    $vector->save();
}

    public static function updateEqVector($group_id) {

        $vector = Vector::find($group_id);
        $vector->vector = collect(self::getEqVector(self::getCriterias($group_id)))
            ->toJson();
        $vector->group_id = $group_id;
        $vector->save();
    }

    public function show($group_id) {
    $attrs = Attribute::whereIn('slug', self::getCriterias($group_id))->get();
    $vector = Vector::find($group_id);
    return view('vector.edit')
        ->with('weights', json_decode($vector->vector, true))
        ->with('attrs', $attrs);
    }
}