<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\UserController;


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
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
});
//Route Location
Route::resource('locations', LocationController::class);
Route::get('admin/locations', [LocationController::class, 'index'])->name('location.index');
Route::get('/admin/locations/{id}', [LocationController::class, 'show'])->name('location.show'); //hiển thị
Route::get('/admin/locations/create', [LocationController::class, 'create'])->name('location.create'); //tạo mới
Route::post('/admin/locations', [LocationController::class, 'store'])->name('location.store'); //lưu
Route::get('/admin/locations/{id}/edit', [LocationController::class, 'edit'])->name('location.edit'); //chỉnh sửa
Route::put('/admin/locations/{id}', [LocationController::class, 'update'])->name('location.update'); //cập nhật
Route::delete('admin/locations/{id}', [LocationController::class, 'destroy'])->name('location.delete'); //xóa

//Route ARTICLE
Route::prefix('admin/articles')->group(function () {
    Route::get('/', [ArticleController::class, 'index'])->name('article.index'); // Danh sách bài viết
    Route::get('/create', [ArticleController::class, 'create'])->name('article.create');
    // Route::post('/store', [ArticleController::class, 'store'])->name('article.store'); // Lưu 
    Route::get('/{id}', [ArticleController::class, 'show'])->name('article.show'); // Hiển thị 
    Route::get('/{id}/edit', [ArticleController::class, 'edit'])->name('article.edit'); // Chỉnh sửa 
    Route::put('/{id}', [ArticleController::class, 'update'])->name('article.update'); // Cập nhật 
    Route::delete('/{id}', [ArticleController::class, 'destroy'])->name('article.destroy'); // Xóa bài viết
});
Route::post('/admin/articles/store', [ArticleController::class, 'store'])->name('article.store');

//Route Category
// Route::get('/admin/categories', [CategoryController::class, 'index'])->name('category.index');
Route::prefix('admin/categories')->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::get('/', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/', [CategoryController::class, 'store'])->name('category.store');
    // Route::get('/{id}', [CategoryController::class, 'show'])->name('category.show');
    // Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    // Route::put('/{category}', [CategoryController::class, 'update'])->name('category.update');
    // Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
});
Route::put('/admin/category/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
Route::get('/admin/category/{id}/edit', [CategoryController::class, 'edit'])->name('admin.category.edit'); //chỉnh sửa
Route::get('/admin/category/{id}', [CategoryController::class, 'show'])->name('admin.category.show'); // Để hiển thị thông tin category
Route::put('/admin/category/{id}', [CategoryController::class, 'update'])->name('admin.category.update'); // Để cập nhật
Route::delete('/admin/category/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');


Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
});


Route::get('/client', function () {
    return view('client.home');
});
