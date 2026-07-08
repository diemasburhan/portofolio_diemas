<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

// Public Routes
Route::get('/', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::post('/contact', [PortfolioController::class, 'contact'])->name('portfolio.contact');

// Auth Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes (Auth-protected)
Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function() {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/projects/{id}/edit', [AdminController::class, 'edit'])->name('admin.projects.edit');
    Route::post('/projects/{id}', [AdminController::class, 'update'])->name('admin.projects.update');
});
