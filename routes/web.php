<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\BlogContentsController;
use App\Http\Controllers\AuthController;

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

Route::redirect('/', 'portfolio');

// ポートフォリオページ
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');

// 認証関連
Route::controller(AuthController::class)->group(function () {
    // ログインページ
    Route::get('/login', 'showLoginForm')->name('login');
    // ログイン処理
    Route::post('/login', 'login');
    // ログアウト処理
    Route::post('/logout', 'logout')->name('logout');
});

// ブログ関連
Route::prefix('/blog')->group(function () {
    // ブログ一覧ページ
    Route::get('/', [BlogContentsController::class, 'index'])->name('blog_index');
    // ブログ投稿処理
    Route::post('/store', [BlogContentsController::class, 'store'])->name('blog_store');
    // ブログ投稿ページ
    Route::get('/create', [BlogContentsController::class, 'create'])->name('blog_create');
});
