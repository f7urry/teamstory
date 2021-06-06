<?php
Route::get('/', [App\Http\Controllers\HomeController::class,'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class,'index'])->name('home');

Route::get("/profile",[App\Http\Controllers\Tools\ProfileController::class,"edit"]);
Route::patch("/profile",[App\Http\Controllers\Tools\ProfileController::class,"update"]);
Route::get("/profile/changepass",[App\Http\Controllers\Tools\ProfileController::class,"editpass"]);
Route::post("/profile/changepass",[App\Http\Controllers\Tools\ProfileController::class,"updatepass"]);

Route::get('/goodsreceipt/{goodsreceipt}/print', [App\Http\Controllers\Inventory\GoodsReceiptController::class,'print']);
Route::get('/goodsissue/{goodsissue}/print', [App\Http\Controllers\Inventory\GoodsIssueController::class,'print']);

Route::get('/customprice/create/{id}', [App\Http\Controllers\Admin\CustomPriceController::class,'create']);
Route::get('/address/create/{id}', [App\Http\Controllers\Admin\PartyAddressController::class,'create']);
