<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginAdminController;
use App\Http\Controllers\Admin\ProductAjaxController;
use App\Http\Controllers\Admin\CourierAjaxController;
use App\Http\Controllers\Admin\CategoryAjaxController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\CartController;


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

//User
Route::get('/', function () {
    return view('auth/login');
})->name('landing');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware('auth')->group(function(){
    Route::resource('product', ProductController::class);
    Route::get('cart',[CartController::class, 'index']);
    Route::post('cart/{id}',[CartController::class, 'create']);
    
});




//Login ADMIN
Route::get('/admin', [LoginAdminController::class, 'loginAdmin'])->name('loginadmin');
Route::post('actionlogin', [LoginAdminController::class, 'action'])->name('actionlogin');

//Admin
Route::resource('ajaxcourier', CourierAjaxController::class);
Route::resource('ajaxcategory', CategoryAjaxController::class);
Route::resource('ajaxproduct', ProductAjaxController::class);
Route::prefix('/admin')->name('admin.')->group(function() {
    Route::middleware('auth:admin')->group( function () {
        Route::get('logoutAdmin', [LoginAdminController::class, 'logoutAdmin'])->name('logoutadmin');
        Route::get('/dashboard', function () {return view('admin.pages.dashboard');})->name('dashboard');
        Route::get('/courier', function () {return view('admin.pages.courier');})->name('courier');
        Route::get('/category', function () {return view('admin.pages.category');})->name('category');
        Route::get('/product', [AdminController::class, 'product'])->name('product');
        Route::get('/user', [AdminController::class, 'user'])->name('user');
    });
});
