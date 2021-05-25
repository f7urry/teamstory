<?php
Route::group(["prefix"=>"popup","as"=>"popup"], function(){
    
    // Popup
    Route::get("/itemvariant/{item}", [App\Http\Controllers\Inventory\Popup\ItemVariantPopupController::class,"index"]);
    Route::post("/itemvariant/{item}", [App\Http\Controllers\Inventory\Popup\ItemVariantPopupController::class,"store"]);
    Route::get("/customer", [App\Http\Controllers\Admin\Popup\CustomerPopupController::class,"popup"]);
    Route::get("/customer/create", [App\Http\Controllers\Admin\Popup\CustomerPopupController::class,"create"]);
    Route::post("/customer", [App\Http\Controllers\Admin\Popup\CustomerPopupController::class,"store"]);
    Route::get("/item/create", [App\Http\Controllers\Inventory\Popup\ItemPopupController::class,"create"]);
    Route::post("/item", [App\Http\Controllers\Inventory\Popup\ItemPopupController::class,"store"]);
});