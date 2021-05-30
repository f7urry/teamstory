<?php
//Detail Information
Route::group(["prefix"=>"api"], function(){
    Route::get("/item/get/{item}",[App\Http\Controllers\Inventory\ItemController::class,"get"]);
    Route::get("/party/{party}",[App\Http\Controllers\Admin\PartyController::class,"get"]);
    Route::get("/stock/{fieldname}/{param}",[App\Http\Controllers\Inventory\StockController::class,"get"]);
});
