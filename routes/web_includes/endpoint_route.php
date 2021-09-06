<?php
//Detail Information
Route::group(["prefix"=>"api"], function(){
    Route::get("/party/get/{party}",[App\Http\Controllers\Admin\PartyController::class,"get"]);
    Route::get("/address/get/{address}",[App\Http\Controllers\Admin\PartyAddressController::class,"get"]);
    Route::get("/city/get/{city}",[App\Http\Controllers\Admin\CityController::class,"get"]);
});
