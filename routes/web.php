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
        $listtour = Tour::orderBYDesc('id')->get();

        return view('client.home',compact('listtour'));
    });
    Route::resource('tour', ClientTourController::class)->names([
        // 'index' => 'client.tour.index',
        // 'create' => 'client.tour.create',
        // 'store' => 'client.tour.store',
        'show' => 'client.tour.show',
        // 'edit' => 'client.tour.edit',
        // 'update' => 'client.tour.update',
        // 'destroy' => 'client.tour.destroy',
    ]);

    Route::get('/booking', function () {
        return view('client.tour.booking');
    });
    Route::get('/confirm', function () {
        return view('client.tour.confirm');
    });

    

    

    Route::get('/', [HomeController::class, 'index']);



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




Route::get('/dang-nhap', function () {
    return view('client.auth.login');
});

Route::get('/dang-ky', function () {
    return view('client.auth.register');
});

