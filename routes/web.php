<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', \App\Http\Livewire\Front\Home\Index::class)->name('home');
Route::get('/{slug}', \App\Http\Livewire\Front\Sites\Show::class)->name('site');

// Admin routes
Route::middleware(['auth:sanctum', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Categories
    Route::resource('/categories', CategoryController::class);
    // Sites
    Route::get('/sites', \App\Http\Livewire\Admin\Sites\Index::class)->name('sites.index');
    Route::get('/sites/create', \App\Http\Livewire\Admin\Sites\Create::class)->name('sites.create');
    Route::get('/sites/{id}', \App\Http\Livewire\Admin\Sites\Edit::class)->name('sites.edit');
    // Users
    Route::resource('/users', UserController::class);
});
