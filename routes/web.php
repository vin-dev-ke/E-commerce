<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\CategoryController;
use App\Http\controllers\ProductController;
use App\Http\Controllers\User\UserLoginController;
use App\Http\Controllers\User\UserRegistrationController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminRegistrationController;
use App\Http\Controllers\Admin\AdminDashboardController;


Route::get('/', function () {
    return view('layout');
});

Route::resource('/category', CategoryController::class);
Route::resource('/product', ProductController::class);   

 
// Authentication Routes

// User Authentication Routes
Route::get('/login', [UserLoginController::class, 'index'])->name('login')->middleware('clear_cookies');;
Route::post('/check', [UserLoginController::class, 'check'])->name('check');
Route::get('/register', [UserRegistrationController::class, 'create'])->name('register');
Route::post('/register', [UserRegistrationController::class, 'store'])->name('user.register');
//middleware implementation
Route::middleware(['auth', 'user'])->group(function () {
    
 Route::get('/user/dashboard', [UserDashboardController::class, 'dashboard'])->name('user.dashboard');
 Route::get('/records', [RecordViewController::class, 'index'])->name('record.index');
 Route::post('/logout', [UserLoginController::class, 'logout'])->name('user.logout')->middleware('clear_cookies');
});
// Admin Authentication Routes
Route::get('/admin/login', [AdminLoginController::class, 'index'])->name('admin.login')->middleware('clear_cookies');;
Route::post('/admin/check', [AdminLoginController::class, 'admincheck'])->name('admin.check');
Route::get('/admin/register', [AdminRegistrationController::class, 'create'])->name('admin.register');
Route::post('/admin/register', [AdminRegistrationController::class, 'store'])->name('admin.store');
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout')->middleware('clear_cookies');
});