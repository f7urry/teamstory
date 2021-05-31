<?php

//Options
Route::group(["prefix"=>"api"], function(){
    Route::get("/item/options",[App\Http\Controllers\Inventory\ItemController::class,"options"]);
    Route::get("/customer/options",[App\Http\Controllers\Admin\CustomerController::class,"options"]);
    Route::get("/modules/options",[App\Http\Controllers\Core\ModuleController::class,"options"]);
    Route::get("/roles/options",[App\Http\Controllers\Core\RolesController::class,"options"]);

    Route::get("/salesorder/options",[App\Http\Controllers\Sales\SalesOrderController::class,"options"]);
    Route::get("/party/options",[App\Http\Controllers\Admin\PartyController::class,"options"]);
});