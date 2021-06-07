<?php
//Detail Information
Route::group(["prefix"=>"api"], function(){
    Route::get("/item/get/{item}",[App\Http\Controllers\Inventory\ItemController::class,"get"]);
    Route::get("/party/get/{party}",[App\Http\Controllers\Admin\PartyController::class,"get"]);
    Route::get("/stock/{fieldname}/{param}",[App\Http\Controllers\Inventory\StockController::class,"get"]);
    Route::get("/customprice/get/{party}/{item}",[App\Http\Controllers\Admin\CustomPriceController::class,"get"]);
    Route::get("/salesorder/get/{salesorder}",[App\Http\Controllers\Sales\SalesOrderController::class,"get"]);

    Route::get("/salesorder/yearlyamount",[App\Http\Controllers\Sales\Report\SalesOrderController::class,"yearlyAmount"]);
});
