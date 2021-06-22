<?php
Route::get('/', [App\Http\Controllers\HomeController::class,'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class,'index'])->name('home');

Route::get("/profile",[App\Http\Controllers\Tools\ProfileController::class,"edit"]);
Route::patch("/profile",[App\Http\Controllers\Tools\ProfileController::class,"update"]);
Route::get("/profile/changepass",[App\Http\Controllers\Tools\ProfileController::class,"editpass"]);
Route::post("/profile/changepass",[App\Http\Controllers\Tools\ProfileController::class,"updatepass"]);

Route::get('/goodsreceipt/{goodsreceipt}/print', [App\Http\Controllers\Inventory\GoodsReceiptController::class,'print']);
Route::get('/goodsissue/{goodsissue}/print', [App\Http\Controllers\Inventory\GoodsIssueController::class,'print']);
Route::get('/salesorder/{salesorder}/print', [App\Http\Controllers\Sales\SalesOrderController::class,'print']);
Route::get('/salesorder/{salesorder}/process', [App\Http\Controllers\Sales\SalesOrderController::class,'process']);
Route::get('/explore', [App\Http\Controllers\Sales\ConsumerProductController::class,'index']);
Route::post('/cart/checkout', [App\Http\Controllers\Sales\CartController::class,'checkout']);

Route::get('/customprice/create/{id}', [App\Http\Controllers\Admin\CustomPriceController::class,'create']);
Route::get('/address/create/{id}', [App\Http\Controllers\Admin\PartyAddressController::class,'create']);
Route::get('/address/default/{id}', [App\Http\Controllers\Admin\PartyAddressController::class,'setdefault']);
Route::get('/profileaddress/default/{id}', [App\Http\Controllers\Admin\ProfileAddressController::class,'setdefault']);

