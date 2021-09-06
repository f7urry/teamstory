<?php
Route::get('/', [App\Http\Controllers\HomeController::class,'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class,'index'])->name('home');

//ADMIN
Route::get("/profile",[App\Http\Controllers\Tools\ProfileController::class,"edit"]);
Route::patch("/profile",[App\Http\Controllers\Tools\ProfileController::class,"update"]);
Route::get("/profile/changepass",[App\Http\Controllers\Tools\ProfileController::class,"editpass"]);
Route::post("/profile/changepass",[App\Http\Controllers\Tools\ProfileController::class,"updatepass"]);
Route::get('/address/create/{id}', [App\Http\Controllers\Admin\PartyAddressController::class,'create']);
Route::get('/address/default/{id}', [App\Http\Controllers\Admin\PartyAddressController::class,'setdefault']);
Route::get('/profileaddress/default/{id}', [App\Http\Controllers\Admin\ProfileAddressController::class,'setdefault']);

//CORE
Route::get("/users/{user}/changepass",[App\Http\Controllers\Core\UserController::class,"edit_pass"]);
Route::post("/users/{user}/changepass",[App\Http\Controllers\Core\UserController::class,"update_pass"]);



