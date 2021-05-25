<?php

//ADMIN ROUTES
Route::resource("/customer",App\Http\Controllers\Admin\CustomerController::class);
Route::resource("/supplier",App\Http\Controllers\Admin\SupplierController::class);
Route::resource("/party",App\Http\Controllers\Admin\PartyController::class);

//CORE Module
Route::resource("/users",App\Http\Controllers\Core\UserController::class);
Route::resource("/roles",App\Http\Controllers\Core\RolesController::class);

//INVENTORY Module
Route::resource("/itemregisters",App\Http\Controllers\Inventory\ItemRegisterController::class);
Route::resource("/item",App\Http\Controllers\Inventory\ItemController::class);
Route::resource("/itemgroup",App\Http\Controllers\Inventory\ItemGroupController::class);
Route::resource("/itemattribute",App\Http\Controllers\Inventory\ItemAttributeController::class);
Route::resource("/uom",App\Http\Controllers\Inventory\UnitOfMeasureController::class);
Route::resource("/goodsreceipt",App\Http\Controllers\Inventory\GoodsReceiptController::class);
Route::resource("/goodsissue",App\Http\Controllers\Inventory\GoodsIssueController::class);
Route::resource("/warehouse",App\Http\Controllers\Inventory\WarehouseController::class);
Route::resource("/ledgersummary",App\Http\Controllers\Inventory\Report\LedgerSummaryController::class);
Route::resource("/ledgerdetail",App\Http\Controllers\Inventory\Report\LedgerDetailController::class);

//VMS Module
Route::resource("/drivers",App\Http\Controllers\Vms\DriverController::class);
Route::resource("/vehicles",App\Http\Controllers\Vms\VehicleController::class);
Route::resource("/vehiclebookings",App\Http\Controllers\Vms\VehicleBookingController::class);
Route::resource("/bookingrequest",App\Http\Controllers\Vms\VehicleBookingRequestController::class);
