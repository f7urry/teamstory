<?php
namespace App\Helper;

use Illuminate\Support\Facades\DB;

class SelectHelper {

    public static function generate($model, $key_value = '', $key_text = '',$raw=false) {
        $resultCount=10;

        $response = array();
        if($raw)
            $model = $model->select(DB::raw($key_value." as val"),DB::raw($key_text ." as txt"));
        else
            $model = $model->select($key_value." as val", $key_text ." as txt");
        foreach ($model->get() as $m) {
            $response[] = array(
                "id" => $m->val,
                "text" => $m->txt
            );
        }
        $map['results']=$response;
        return response()->json($map);
    }
}