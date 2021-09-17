<?php
Route::get("/file/{mode}",[App\Http\Controllers\Tools\StorageController::class,"index"]);
Route::resource("/logs",App\Http\Controllers\Tools\LogsController::class);
Route::get("/console/{command}",[App\Http\Controllers\Tools\ConsoleController::class,"consoleCommand"]);
Route::get("/artisan/{command}",[App\Http\Controllers\Tools\ConsoleController::class,"artisan"]);