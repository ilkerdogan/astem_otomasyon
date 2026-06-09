<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryAdminController;
use App\Http\Controllers\Admin\ProductAdminController;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Route;

// ─── Production: Subdomain routing ───────────────────────────────────────────

// Public site — session middleware exclude (LiteSpeed Cache uyumu)
Route::domain('astemotomasyon.com')
    ->withoutMiddleware(StartSession::class)
    ->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('home');
        Route::redirect('/kategoriler', '/#kategoriler', 301)->name('categories.index');
        Route::get('/kategoriler/{slug}', [CategoryController::class, 'show'])->name('categories.show');
        Route::get('/arama', [ProductController::class, 'search'])->name('products.search');
        Route::get('/iletisim', [ContactController::class, 'index'])->name('contact');
    });

// Admin panel — session aktif
Route::domain('admin.astemotomasyon.com')
    ->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('admin.login');
        Route::post('/login', [AuthController::class, 'login'])->name('admin.login.post');
        Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');

        Route::middleware('admin')->group(function () {
            Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
            Route::resource('kategoriler', CategoryAdminController::class, [
                'parameters' => ['kategoriler' => 'category'],
            ])->names('admin.categories');
            Route::resource('urunler', ProductAdminController::class, [
                'parameters' => ['urunler' => 'urunler'],
            ])->names('admin.products');
        });
    });

// ─── Local development fallback (php artisan serve) ──────────────────────────
if (app()->environment('local')) {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::redirect('/kategoriler', '/#kategoriler', 301)->name('categories.index');
    Route::get('/kategoriler/{slug}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('/arama', [ProductController::class, 'search'])->name('products.search');
    Route::get('/iletisim', [ContactController::class, 'index'])->name('contact');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login.post');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

        Route::middleware('admin')->group(function () {
            Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
            Route::resource('kategoriler', CategoryAdminController::class, [
                'parameters' => ['kategoriler' => 'category'],
            ])->names('categories');
            Route::resource('urunler', ProductAdminController::class, [
                'parameters' => ['urunler' => 'urunler'],
            ])->names('products');
        });
    });
}

// ─── SEO Sitemaps & Robots ───────────────────────────────────────────────────
Route::get('/sitemap.xml', [SitemapController::class, 'index']);
Route::get('/robots.txt', function () {
    return response()->file(public_path('robots.txt'));
});
