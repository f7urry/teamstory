<?php
//Detail Information
Route::group(["prefix"=>"api"], function(){
    Route::get("/item/get/{item}",[App\Http\Controllers\Inventory\ItemController::class,"get"]);
    Route::get("/party/get/{party}",[App\Http\Controllers\Admin\PartyController::class,"get"]);
    Route::get("/address/get/{address}",[App\Http\Controllers\Admin\PartyAddressController::class,"get"]);
    Route::get("/city/get/{city}",[App\Http\Controllers\Admin\CityController::class,"get"]);
    Route::get("/stock/{fieldname}/{param}",[App\Http\Controllers\Inventory\StockController::class,"get"]);
    Route::get("/customprice/get/{party}/{item}",[App\Http\Controllers\Admin\CustomPriceController::class,"get"]);
    Route::get("/salesorder/get/{salesorder}",[App\Http\Controllers\Sales\SalesOrderController::class,"get"]);

    Route::get("/salesorder/yearlyamount",[App\Http\Controllers\Sales\Report\SalesOrderController::class,"yearlyAmount"]);
    Route::get("/salesorder/quotationcount",[App\Http\Controllers\Sales\Report\SalesOrderController::class,"quotation_count"]);
    Route::get("/salesorder/invoicecount",[App\Http\Controllers\Sales\Report\SalesOrderController::class,"invoice_count"]);
    Route::get("/salesorder/monthlyinvoice",[App\Http\Controllers\Sales\Report\SalesOrderController::class,"monthly_invoice"]);
    Route::get("/salesorder/unpaidinvoice",[App\Http\Controllers\Sales\Report\SalesOrderController::class,"unpaid_invoice"]);
    Route::get("/salesorder/bestcustomer",[App\Http\Controllers\Sales\Report\SalesOrderController::class,"best_customer"]);
});
