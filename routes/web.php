<?php

use App\Http\Middleware\RoleListener;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware'=>['auth',RoleListener::class]],function(){
    include 'web_includes/pages_route.php';
    include 'web_includes/endpoint_route.php';
    include 'web_includes/datatable_route.php';
    include 'web_includes/select_route.php';
    include 'web_includes/popup_route.php';
    include 'web_includes/resource_route.php';
});
include 'web_includes/tools_route.php';
Auth::routes();