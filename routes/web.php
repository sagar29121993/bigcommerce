<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstallController;
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




Route::get('/','InstallController@install_page')->name('install_page');
Route::post('/install_page_submit','InstallController@install_page_submit')->name('install_page_submit');
Route::get('/install',"InstallController@installled")->name('installled');
Route::get('/error','InstallController@error')->name('error');











