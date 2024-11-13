<?php


use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
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


// client routes
Route::group([], function () {
    Route::get('/', function () {
        return view('client.home');
    });


    Route::get('/lien-he', function () {
        return view('client.pages.contact');
    });
});

// admin routes
Route::get('/admins', function () {
    return view('admins.dashboard');
});
Route::prefix('admins')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admins.dashboard');
});
Route::group(['prefix' => 'admins'], function () {
    Route::get('/admins', function () {
        return view('admins.dashboard');
    })->name('home-admin');
    Route::resource('user', UserController::class);
    Route::resource('faqs', FaqController::class);
    Route::resource('notifications', NotificationController::class);
    Route::resource('user', UserController::class);
    Route::resource('tour', TourController::class);
    Route::resource('coupons', CouponsController::class);
    Route::resource('location', LocationController::class);
    Route::resource('category', CategoryController::class);
});



Route::get('/dang-nhap', function () {
    return view('client.auth.login');
});

Route::get('/dang-ky', function () {
    return view('client.auth.register');
});
Route::get('/dich-vu', function () {
    return view('client.pages.service');
});
Route::get('/gioi-thieu', function () {
    return view('client.pages.introduce');
});
Route::get('/cam-nang', function () {
    return view('client.pages.handbook');
});
Route::get('/tour-trong-nuoc', function () {
    return view('client.pages.domesticTour');
});
Route::get('/chi-tiet-tour', function () {
    return view('client.pages.detailTour');
});
Route::get('/chi-tiet-cam-nang', function () {
    return view('client.pages.detailHandbook');
});