<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SuperAdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;


// FrontEnd Controller
Route::get('/',[HomeController::class,'index'])->name('home');

// Admin Controller
Route::get('/admin-login',[AdminController::class,'index'])->name('login');
Route::post('/admin-dashboard',[AdminController::class,'show_dashboard'])->name('admin-dashboard');

Route::get('/dashboard',[SuperAdminController::class,'dashboard'])->name('dashboard');
Route::get('/logout',[SuperAdminController::class,'logout'])->name('logout');



// Category Controller
Route::resource('/categories/', CategoryController::class);
