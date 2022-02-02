<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\SitemapController;

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
Route::get('/blog', \App\Http\Livewire\Front\Blog\Index::class)->name('blog');
Route::get('/blog/{slug}', \App\Http\Livewire\Front\Articles\Show::class)->name('article');
Route::get('/{slug}', \App\Http\Livewire\Front\Pages\Show::class)->name('page');

// Admin routes
Route::middleware(['auth:sanctum', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    // Blog
    Route::get('/blog', \App\Http\Livewire\Admin\Blog\Index::class)->name('blog.index');
    Route::get('/blog/articles/create', \App\Http\Livewire\Admin\Articles\Create::class)->name('blog.articles.create');
    Route::get('/blog/articles/{id}', \App\Http\Livewire\Admin\Articles\Edit::class)->name('blog.articles.edit');

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Categories
    Route::resource('/categories', CategoryController::class);

    // Pages
    Route::get('/pages', \App\Http\Livewire\Admin\Pages\Index::class)->name('pages.index');
    Route::get('/pages/create', \App\Http\Livewire\Admin\Pages\Create::class)->name('pages.create');
    Route::get('/pages/{id}', \App\Http\Livewire\Admin\Pages\Edit::class)->name('pages.edit');

    // Settings
    Route::get('/settings', \App\Http\Livewire\Admin\Settings\Show::class)->name('settings.show');

    // Sites
    Route::get('/sites', \App\Http\Livewire\Admin\Sites\Index::class)->name('sites.index');
    Route::get('/sites/create', \App\Http\Livewire\Admin\Sites\Create::class)->name('sites.create');
    Route::get('/sites/{id}', \App\Http\Livewire\Admin\Sites\Edit::class)->name('sites.edit');

    // Sitemap force trigger re-crawl (this is also done daily by command)
    Route::get('/sitemap', [SitemapController::class, 'generate'])->name('sitemap');

    // Users
    Route::resource('/users', UserController::class);

    Route::post('/images', [ImageController::class, 'store'])->name('images.store');
});
