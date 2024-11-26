<?php

use App\Http\Controllers\Admin\BookTourController;
use App\Models\Admins\Categoty_tour;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\TourController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Admin\CouponsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\LocationController;

use App\Http\Controllers\Client\TourController as ClientTourController;


use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StatisticalController;
use App\Http\Controllers\Client\AuthClientController;
use App\Http\Controllers\Client\BookingController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Auth;

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


    // client dang ky/ dang nhap/quen mat khau/ login gg
    Route::get('/dang-nhap', [AuthClientController::class, 'DangNhap'])->name('dang-nhap');
    Route::post('/post-dang-nhap', [AuthClientController::class, 'postDangNhap'])->name('post-dang-nhap');
    Route::get('/dang-ky', [AuthClientController::class, 'DangKy'])->name('dang-ky');
    Route::post('/post-dang-ky', [AuthClientController::class, 'postDangKy'])->name('post-dang-ky');
    Route::get('/auth/google', [AuthClientController::class, 'redirectToGoogle'])->name('auth.google');
    Route::get('/auth/google/callback', [AuthClientController::class, 'handleGoogleCallback']);
    Route::post('/logouts', [AuthClientController::class, 'logouts'])->name('logouts');

    Route::get('reset-mat-khau/{token}', [AuthClientController::class, 'showResetPasswordForm'])->name('reset-mat-khau');
    Route::post('reset-mat-khau/{token}', [AuthClientController::class, 'resetPassword'])->name('reset-mat-khau.xac-nhan');

    Route::post('quen-mat-khau', [AuthClientController::class, 'sendResetMK'])->name('password.request');
    Route::get('reset-mat-khau/{token}', [AuthClientController::class, 'showResetForm'])->name('password.reset');
    Route::post('reset-mat-khau', [AuthClientController::class, 'reset'])->name('password.update');


    Route::resource('tour', ClientTourController::class)->names([

        'show' => 'client.tour.show',


    ]);



    // Route::get('/pre-booking', function () {
    //     return view('client.tour.booking');
    // })->name('pre-booking');
    Route::get('/pre-booking/{id}', [ClientTourController::class, 'pre_booking'])->name('tour.pre-booking');
    Route::get('/confirm/{id}', [BookingController::class, 'showBookingInfo'])->name('tour.confirm');

    Route::post('/booking', [BookingController::class, 'store'])->name('tour.booking');




    Route::post('/payment/store', [PaymentController::class, 'storePayment'])->name('payment.store');
    Route::post('/payment/vnpay', [PaymentController::class, 'vnpay_payment'])->name('payment.vnpay');
    Route::get('payment/vnpay-return', [PaymentController::class, 'vnpayReturn'])->name('payment.vnpayReturn');

    Route::get('/payment/success/{payment_id}', [PaymentController::class, 'success'])->name('payment.success');
    Route::get('/payment/cancel/{vnp_TxnRef}', [PaymentController::class, 'vnpayCancel'])->name('payment.vnpay.cancel');


    Route::get('payment/failed', [PaymentController::class, 'failure'])->name('payment.failed');

    Route::get('/', [HomeController::class, 'index'])->name('home');



    // Route::get('/dang-nhap', function () {
    //     return view('client.auth.login');
    // });

    // Route::get('/dang-ky', function () {
    //     return view('client.auth.register');
    // });
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

    Route::get('/chi-tiet-tour/{id}', [HomeController::class, 'detailTour'])->name('detail');

    Route::get('/chi-tiet-cam-nang', function () {
        return view('client.pages.detailHandbook');
    });

    Route::get('/tim-kiem', [ClientTourController::class, 'searchTour'])->name('tour.search');

    Route::resource('favorites', FavoriteController::class);
});

// admin routes
Route::group(['prefix' => 'admin'], function () {
    Route::get('/home', [StatisticalController::class,'index'])->name('home-admin');

    Route::resource('user', UserController::class);
    Route::resource('dontour', BookTourController::class);
    Route::resource('faqs', FaqController::class);
    Route::resource('notifications', NotificationController::class);
    Route::resource('category_tour', Categoty_tour::class);
    Route::resource('tour', TourController::class);
    Route::resource('coupons', CouponsController::class);
    Route::resource('location', LocationController::class);
    Route::resource('category', CategoryController::class);
});

// Route::get('/dang-nhap', function () {
//     return view('client.auth.login');
// });

// Route::get('/dang-ky', function () {
//     return view('client.auth.register');
// });


// Route::get('/dang-ky', function () {
//     return view('client.auth.register');
// });


