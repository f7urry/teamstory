<?php
Route::get("/file/{mode}",[App\Http\Controllers\Tools\StorageController::class,"index"]);
