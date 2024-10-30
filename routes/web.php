<?php

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
Route::get('/dangnhap', function () {
    return view('admin.dashboard');
});

Route::get('/admin', function () {
    return view('admin.dashboard');
});


Route::get('/', function () {
    return view('client.home');
});

Route::get('/lien-he', function () {
    return view('client.pages.contact');
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