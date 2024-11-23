<?php


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
use App\Models\Admins\Tour;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Client\BookingController;
use App\Http\Controllers\PaymentController;

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


    // Route::get('/', function () {
    //     $listtour = Tour::orderBYDesc('id')->get();

    //     return view('client.home',compact('listtour'));
    // });

    Route::resource('tour', ClientTourController::class)->names([
        
        'show' => 'client.tour.show',
        
    ]);

    Route::get('/pre-booking', function () {
        return view('client.tour.booking');
    })->name('pre-booking');

    Route::get('/confirm/{id}', [ClientTourController::class, 'confirm'])->name('tour.confirm');

    Route::post('/booking', [BookingController::class, 'store'])->name('tour.booking');
    Route::post('/payment/store', [PaymentController::class, 'storePayment'])->name('payment.store');
    Route::get('/payment/success/{bookingId}', [PaymentController::class, 'success'])->name('payment.success');

   


    Route::get('/', [HomeController::class, 'index']);



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

    Route::get('/chi-tiet-tour', function () {
        return view('client.pages.detailTour');
    });
    Route::get('/chi-tiet-cam-nang', function () {
        return view('client.pages.detailHandbook');
    });

});

// admin routes
Route::group(['prefix' => 'admin'], function () {
    Route::get('/home', function () {
        return view('admin.dashboard');
    })->name('home-admin');
    Route::resource('user', UserController::class);
    Route::resource('faqs', FaqController::class);
    Route::resource('notifications', NotificationController::class);
    Route::resource('category_tour', Categoty_tour::class);
    Route::resource('tour', TourController::class);
    Route::resource('coupons', CouponsController::class);
    Route::resource('location', LocationController::class);
    Route::resource('category', CategoryController::class);
});

// client dang ky/ dang nhap/quen mat khau/ login gg
Route::get('/dang-nhap', [AuthController::class, 'DangNhap'])->name('dang-nhap');
Route::post('/post-dang-nhap', [AuthController::class, 'postDangNhap'])->name('post-dang-nhap');
Route::get('/dang-ky', [AuthController::class, 'DangKy'])->name('dang-ky');
Route::post('/post-dang-ky', [AuthController::class, 'postDangKy'])->name('post-dang-ky');
Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);
Route::post('/logouts', [AuthController::class, 'logouts'])->name('logouts');



// Route::get('/dang-nhap', function () {
//     return view('client.auth.login');
// });

// Route::get('/dang-ky', function () {
//     return view('client.auth.register');
// });

