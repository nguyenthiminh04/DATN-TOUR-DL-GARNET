<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\TourController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CouponsController;
use App\Http\Controllers\Admin\LocationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/admin2', function () {
    return view('admin.dashboard');
});

Route::resource('user', UserController::class);
Route::resource('tour', TourController::class);
Route::resource('coupons', CouponsController::class);
Route::resource('location', LocationController::class);
Route::resource('category', CategoryController::class);



Route::get('/', function () {
    return view('client.home');
});
