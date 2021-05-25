<?php
//Detail Information
Route::group(["prefix"=>"api"], function(){
    Route::get("/item/get/{item}",[App\Http\Controllers\Inventory\ItemController::class,"get"]);
    Route::get("/party/{party}",[App\Http\Controllers\Admin\PartyController::class,"get"]);
    Route::get("/itembarcode/{param}",[App\Http\Controllers\Inventory\ItemRegisterController::class,"get"]);
});

//Options
Route::group(["prefix"=>"api"], function(){
    Route::get("/item/options",[App\Http\Controllers\Inventory\ItemController::class,"options"]);
    Route::get("/customer/options",[App\Http\Controllers\Admin\CustomerController::class,"options"]);
    Route::get("/modules/options",[App\Http\Controllers\Core\ModuleController::class,"options"]);
    Route::get("/roles/options",[App\Http\Controllers\Core\RolesController::class,"options"]);
});

//Datatables
Route::group(["prefix"=>"api"], function(){
    
    //Admin
    Route::get("/customer/list",[App\Http\Controllers\Admin\CustomerController::class,"list"]);
    Route::get("/supplier/list",[App\Http\Controllers\Admin\SupplierController::class,"list"]);
    
    //Inventory
    Route::get("/item/list",[App\Http\Controllers\Inventory\ItemController::class,"list"]);
    Route::get("/itemregisters/list",[App\Http\Controllers\Inventory\ItemRegisterController::class,"list"]);
    Route::get("/goodsreceipt/list",[App\Http\Controllers\Inventory\GoodsReceiptController::class,"list"]);
    Route::get("/goodsissue/list",[App\Http\Controllers\Inventory\GoodsIssueController::class,"list"]);
    Route::get("/warehouse/list",[App\Http\Controllers\Inventory\WarehouseController::class,"list"]);

    //Vms
    Route::get("/drivers/list",[App\Http\Controllers\Vms\DriverController::class,"list"]);
    Route::get("/vehiclebookings/list",[App\Http\Controllers\Vms\VehicleBookingController::class,"list"]);
    Route::get("/bookingrequest/list",[App\Http\Controllers\Vms\VehicleBookingRequestController::class,"list"]);
});
