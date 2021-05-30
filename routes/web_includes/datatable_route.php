<?php
//Datatables
Route::group(["prefix"=>"api"], function(){
    
    //Admin
    Route::get("/customer/list",[App\Http\Controllers\Admin\CustomerController::class,"list"]);
    Route::get("/supplier/list",[App\Http\Controllers\Admin\SupplierController::class,"list"]);
    
    //Inventory
    Route::get("/item/list",[App\Http\Controllers\Inventory\ItemController::class,"list"]);
    Route::get("/stockadjustment/list",[App\Http\Controllers\Inventory\StockAdjustmentController::class,"list"]);
    Route::get("/goodsreceipt/list",[App\Http\Controllers\Inventory\GoodsReceiptController::class,"list"]);
    Route::get("/goodsissue/list",[App\Http\Controllers\Inventory\GoodsIssueController::class,"list"]);
    Route::get("/warehouse/list",[App\Http\Controllers\Inventory\WarehouseController::class,"list"]);
});
