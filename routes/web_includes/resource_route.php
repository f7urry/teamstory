<?php

//ADMIN ROUTES
Route::resource("/customer",App\Http\Controllers\Admin\CustomerController::class);
Route::resource("/supplier",App\Http\Controllers\Admin\SupplierController::class);
Route::resource("/party",App\Http\Controllers\Admin\PartyController::class);
Route::resource("/address",App\Http\Controllers\Admin\PartyAddressController::class);

//CORE Module
Route::resource("/users",App\Http\Controllers\Core\UserController::class);
Route::resource("/roles",App\Http\Controllers\Core\RolesController::class);

//INVENTORY Module
Route::resource("/item",App\Http\Controllers\Inventory\ItemController::class);
Route::resource("/itembrand",App\Http\Controllers\Inventory\ItemBrandController::class);
Route::resource("/itemgroup",App\Http\Controllers\Inventory\ItemGroupController::class);
Route::resource("/itemattribute",App\Http\Controllers\Inventory\ItemAttributeController::class);
Route::resource("/uom",App\Http\Controllers\Inventory\UnitOfMeasureController::class);
Route::resource("/goodsreceipt",App\Http\Controllers\Inventory\GoodsReceiptController::class);
Route::resource("/goodsissue",App\Http\Controllers\Inventory\GoodsIssueController::class);
Route::resource("/warehouse",App\Http\Controllers\Inventory\WarehouseController::class);
Route::resource("/ledgersummary",App\Http\Controllers\Inventory\Report\LedgerSummaryController::class);
Route::resource("/ledgerdetail",App\Http\Controllers\Inventory\Report\LedgerDetailController::class);
Route::resource("/stockadjustment",App\Http\Controllers\Inventory\StockAdjustmentController::class);

//SALES Module
Route::resource("/customprice",App\Http\Controllers\Admin\CustomPriceController::class);
Route::resource("/salesorder",App\Http\Controllers\Sales\SalesOrderController::class);
Route::resource("/receivable",App\Http\Controllers\Accounting\ReceivableController::class);