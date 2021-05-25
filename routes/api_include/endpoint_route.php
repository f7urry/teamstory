<?php

use Illuminate\Http\Request;

Route::get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/vehiclebookings/vehicle/{uniquecode}",[App\Http\Controllers\Vms\Api\VehicleBookingController::class,"get_vehicle"]);
Route::post("/vehiclebookings/vehicle/{uniquecode}",[App\Http\Controllers\Vms\Api\VehicleBookingController::class,"update"]);