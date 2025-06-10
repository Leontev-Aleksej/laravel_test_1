<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ReportController::class, 'index'])->name('home');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/apply', [ReportController::class, 'showApplyForm'])->name('apply.form');
    Route::post('/apply', [ReportController::class, 'apply'])->name('apply');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin/reports/{report}/approve', [AdminController::class, 'approve'])->name('admin.approve');
    Route::post('/admin/reports/{report}/reject', [AdminController::class, 'reject'])->name('admin.reject');
});
