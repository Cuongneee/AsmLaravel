<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ShoeAdminController;
use App\Http\Controllers\ShoeController;
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

// Client
Route::get('/', function () {
    return view('client.index');
});


Route::get('/about', function () {
    return view('client.about');
});

Route::get('/contact', function () {
    return view('client.contact');
});

// Lấy sản phẩm
Route::get('/shop', [ShoeController::class, 'index'])->name('client.shop');

// Chi tiết sản phẩm
Route::get('/shop-single/{id}', [ShoeController::class, 'show'])->name('client.shop-single');

// Load theo Brand
Route::get('/brand/{id}', [ShoeController::class, 'listBrand'])->name('client.shop');

Route::get('/', [ShoeController::class, 'topView'])->name('client.index');

// Tìm kiếm
Route::post('/search', [ShoeController::class, 'searchShoe'])->name('client.search');

// Giá cao nhất
Route::get('/highPrice', [ShoeController::class, 'highPrice'])->name('client.highPrice');

// Giá thấp nhất
Route::get('/lowPrice', [ShoeController::class, 'lowPrice'])->name('client.lowPrice');



// Admin routes group
Route::prefix('/admin')->group(function () {
    Route::get('/', [DashboardController::class, 'dashboard']);

    // CRUD brands
    Route::resource('brands', BrandController::class);

    Route::put('/hide/{brand}', [BrandController::class, 'hide'])->name('brands.hide');
    Route::put('/restore/{brand}', [BrandController::class, 'restore'])->name('brands.restore');


    Route::resource('shoes', ShoeAdminController::class);

});

