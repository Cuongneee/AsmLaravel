<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CommentAdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ShoeAdminController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ShoeController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Auth;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


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



// Admin routes group with middleware
Route::prefix('/admin')->middleware(['auth.admin'])->group(function () {
    Route::get('/', action: [DashboardController::class, 'dashboard'])->name('dashboard');

    // CRUD brands
    Route::resource('brands', BrandController::class);

    Route::put('/hide/{brand}', [BrandController::class, 'hide'])->name('brands.hide');
    Route::put('/restore/{brand}', [BrandController::class, 'restore'])->name('brands.restore');

    // CRUD Shoes
    Route::resource('shoes', ShoeAdminController::class);

    // CRUD Users
    Route::resource('users', UserAdminController::class);
    Route::put('/users/{user}/activate', [UserAdminController::class, 'userActivate'])->name('userActivate');
    Route::put('/users/{user}/deactivate', [UserAdminController::class, 'userDeactivate'])->name('userDeactivate');

    // CRUD Comments
    Route::resource('comments', CommentAdminController::class);
    Route::put('/comments/hide/{comment}', [CommentAdminController::class, 'hide'])->name('comments.hide');
    Route::put('/comments/restore/{comment}', [CommentAdminController::class, 'restore'])->name('comments.restore');


});



Auth::routes();
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('showLoginForm');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/unSession', function () {
    session()->forget('user');

});

Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/profile/{user}', [UserController::class, 'profile'])->name('profile');
Route::put('/users/update/{user}', [UserController::class, 'updateProfile'])->name('updateProfile');

Route::get('/password/{user}', [UserController::class, 'formChangePass'])->name('formChangePass');
Route::put('/users/updatePassword/{user}', [UserController::class, 'updatePassword'])->name('updatePassword');

// SendMail
Route::get('/users/forgot-password', [UserController::class, 'forgotPassword'])->name('forgotPassword');
Route::post('/users/forgot-password', [UserController::class, 'postForgotPassword']);
Route::get('/users/get-password/{user}/{token}', [UserController::class, 'getPassword'])->name('getPassword');
Route::post('/users/get-password/{user}/{token}', [UserController::class, 'postPassword']);


Route::post('/comment/store/{id}', [CommentController::class, 'storeComment'])->name('storeComment');

// Cart
Route::post('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('addToCart');
Route::get('/cart', [CartController::class, 'showCart'])->name('showCart');
Route::post('/cart/update/{id}', [CartController::class, 'updateCart'])->name('updateCart');
Route::post('/cart/remove/{id}', [CartController::class, 'removeCart'])->name('removeFromCart');

Route::get('/check-out', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'processCheckout'])->name('processCheckout');





