<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginAdminController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Login ADMIN
Route::get('/admin', [LoginAdminController::class, 'loginAdmin'])->name('loginadmin');
Route::post('actionlogin', [LoginAdminController::class, 'action'])->name('actionlogin');

Route::get('/dashboard', function () {
    return view('welcome');
})->name ('dashboard');
