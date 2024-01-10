<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


// FrontEnd Controller
Route::get('/',[HomeController::class,'index'])->name('home');

// Admin Controller
Route::get('/admin-login',[AdminController::class,'index'])->name('login');
Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard');
Route::post('/admin-dashboard',[AdminController::class,'show_dashboard'])->name('admin-dashboard');
