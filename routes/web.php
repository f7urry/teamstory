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
    include 'includes/pages_route.php';
    include 'includes/async_route.php';
    include 'includes/popup_route.php';
    include 'includes/resource_route.php';
});
include 'includes/tools_route.php';
Auth::routes();