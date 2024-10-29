<?php

use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

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

// client routes
Route::group([],function () {
    Route::get('/', function () {
        return view('client.home');
    });
});

// admin routes
Route::group(['prefix' => 'admin'], function () {
    Route::get('/home', function () {
        return view('admin.dashboard');
    })->name('home-admin');
    Route::resource('user', UserController::class);
    Route::resource('faqs', FaqController::class);
});

Route::get('/dangnhap', function () {
    return view('admin.dashboard');
});
