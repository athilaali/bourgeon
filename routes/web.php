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

Route::get('/refer/{token}', [App\Http\Controllers\HomeController::class, 'refer_accept']);
Route::post('/coupon_apply', [App\Http\Controllers\HomeController::class, 'coupon_apply']);
Route::get('/email', [App\Http\Controllers\HomeController::class, 'email']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/refer', [App\Http\Controllers\HomeController::class, 'refer']);