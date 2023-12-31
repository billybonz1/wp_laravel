<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
//use DB
use Illuminate\Support\Facades\DB;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth', 'activity', 'role:admin|user']], function () {
    Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard');
    Route::get('/plugin', function () {
        return view('admin.plugin');
    });
});


Route::get('test', function () {
    $get = DB::connection('mysql2')->table("lsw49X_posts")->first();
    print_r($get);
});