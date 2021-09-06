<?php

//Options
Route::group(["prefix"=>"api"], function(){

    //ADMIN
    Route::get("/company/options",[App\Http\Controllers\Admin\CompanyController::class,"options"]);
    Route::get("/party/options",[App\Http\Controllers\Admin\PartyController::class,"options"]);
    Route::get("/address/options",[App\Http\Controllers\Admin\PartyAddressController::class,"options"]);
    Route::get("/province/options",[App\Http\Controllers\Admin\ProvinceController::class,"options"]);
    Route::get("/city/options",[App\Http\Controllers\Admin\CityController::class,"options"]);

    //CORE
    Route::get("/modules/options",[App\Http\Controllers\Core\ModuleController::class,"options"]);
    Route::get("/roles/options",[App\Http\Controllers\Core\RolesController::class,"options"]);
});