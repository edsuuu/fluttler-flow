<?php

use App\Http\Controllers\Api\FlutterApiGet;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

//Route::get('/flutter', [FlutterApiGet::class, 'index']);

Route::get('/user', [UserController::class, 'index']);
Route::get('/user/{id}', [UserController::class, 'show']);

Route::resource('/persons', PersonController::class);
//Route::resource('/users', UserController::class);

Route::view('/login', 'login.form')->name('login');
Route::post('/auth', [LoginController::class, 'auth'])->name('login.auth');
Route::get('/logout', [LoginController::class, 'loggout'])->name('login.logout');

Route::get('/create', [LoginController::class, 'create'])->name('login.create');

Route::post('/users', [UserController::class, 'store'])->name('users.store');


Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard')->middleware('auth');
