<?php

//ADMIN ROUTES
Route::resource("/party",App\Http\Controllers\Admin\PartyController::class);
Route::resource("/address",App\Http\Controllers\Admin\PartyAddressController::class);
Route::resource("/province",App\Http\Controllers\Admin\ProvinceController::class);
Route::resource("/city",App\Http\Controllers\Admin\CityController::class);
Route::resource("/profileaddress",App\Http\Controllers\Admin\ProfileAddressController::class);

//CORE Module
Route::resource("/company",App\Http\Controllers\Core\CompanyController::class);
Route::resource("/users",App\Http\Controllers\Core\UserController::class);
Route::resource("/roles",App\Http\Controllers\Core\RolesController::class);
Route::resource("/modules",App\Http\Controllers\Core\ModuleController::class);
