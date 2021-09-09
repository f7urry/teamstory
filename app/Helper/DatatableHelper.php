<?php
namespace App\Helper;

use Illuminate\Support\Facades\Route;
use Yajra\DataTables\Facades\DataTables;

class DatatableHelper {

    /**
     *
     * @param Type $var
     * @param QueryBuilder $model
     * @param String $route
     * @param Array $grants
     * @return Datatables
     */
    public static function generate(Type $var = null, $model = null, $route = null, $grants = null) {
        if ($model != null) {
            return DataTables::of($model)
                ->addIndexColumn()
                ->addColumn('action', function ($model) use ($route,$grants) {
                if ($grants == null) {
                    $map = [
                        'show' => false,
                        'edit' => false,
                        'delete' => false
                    ];
                } else {
                    if(isset($grants['all']) && $grants['all']){
                        $map=[
                            "show"=>true,
                            "edit"=>true,
                            "delete"=>true
                        ];
                    }else{
                        $map = [
                            'show' => (isset($grants['show']) ? $grants['show'] : false),
                            'edit' => (isset($grants['edit']) ? $grants['edit'] : false),
                            'delete' => (isset($grants['delete']) ? $grants['delete'] : false)
                        ];
                    }
                }
                $map['model'] = $model;
                $map['action_id']=$model->id;
                if (Route::has($route.".show") && $map['show']) {
                    $map['show_url'] = route($route . '.show', $model->id);
                }
                if (Route::has($route.".edit") && $map['edit']) {
                    $map['edit_url'] = route($route . '.edit', $model->id);
                }
                if (Route::has($route.".destroy") && $map['delete']) {
                    $map['delete_url'] = route($route . '.destroy', $model->id);
                }
                return view('layouts.widget.datatables', $map);
            });
        }
        return DataTables::of($model)->addIndexColumn();
    }
}