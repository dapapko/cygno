<?php


namespace app\Http\Controllers;
use Illuminate\Http\Request;


class VectorController
{
public static function getEquilVector($keys){
    $v = [];
    $c = 1/count($keys);
        foreach($keys as $key) {
            $v[$key] = $c;
        }
        return $v;
}
public static function updateVector(Request $request, $group_id) {
    Vector =
}
}