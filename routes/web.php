<?php

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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/admin', function () {
    return view('admin.admin');
});
Route::get('/admin_login', function () {
    return view('admin.admin_login');
});
Route::get('/admin_register', function () {
    return view('admin.admin_register');
});

Route::get('/form', function () {
    return view('form');
});

Route::post('insertion', [App\Http\Controllers\FormController::class, 'insert'])->name('admin');


//  Route::post('url','Controller@methodname');


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => ['auth','student']], function ()
{
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); 
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); 
});