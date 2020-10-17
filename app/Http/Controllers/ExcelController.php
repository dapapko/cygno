<?php


namespace app\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Attributes;
use Illuminate\Support\Facades\Storage;
use Rap2hpoutre\FastExcel\FastExcel;

class ExcelController extends Controller
{

    public function render() {
        return view('upload-import');
    }

public function parse(Request $request) {
        $attr = Attributes::all();
$attrs = [];
   $request->file('import')->storeAs('public/reports', 'import.xlsx');
    $parsed = (new FastExcel)->import('storage/reports/import.xlsx');
    foreach ($attr as $attribute) {
        if ($attribute->type == "TEXT") {
            $vals = [];
           $col = $parsed->pluck($attribute->label);
           foreach ($col as $r) {
               $vals = array_merge($vals, explode('|', $r));
           }
            $attrs[$attribute->slug] = $vals;
        }
    }

    var_dump($attrs);
}
}