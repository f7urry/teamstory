<?php
//Datatables
Route::group(["prefix"=>"api"], function(){
    
    //Admin
    Route::get("/company/list",[App\Http\Controllers\Admin\CompanyController::class,"list"]);
    Route::get("/address/list",[App\Http\Controllers\Admin\PartyAddressController::class,"list"]);
    
});
