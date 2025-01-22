<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\StorageFileController;
use App\Http\Controllers\UserController;
use App\Livewire\ArticlesTable;
use App\Models\Book;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index']);



Route::resource('articles', ArticleController::class);

Route::resource('books', BookController::class);

Route::resource('categories', CategoryController::class);

Route::resource('users', UserController::class);

Route::resource('loans', LoanController::class);

Route::get('/login', [AuthController::class, 'create'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::get('public/book/{filename}', [StorageFileController::class, 'StorageBook'])->name('book.file');

// filepath: /d:/Project/web-solid/routes/web.php
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class)->names([
        'index' => 'users.index',
        'create' => 'users.create',
        'store' => 'users.store',
        'show' => 'users.show',
        'edit' => 'users.edit',
        'update' => 'users.update',
        'destroy' => 'users.destroy',
        'profile' => 'profile.show',
    ]);
    Route::resource('books', BookController::class)->names([
        'index' => 'books.index',
        'create' => 'books.create',
        'store' => 'books.store',
        'show' => 'books.show',
        'edit' => 'books.edit',
        'update' => 'books.update',
        'destroy' => 'books.destroy',
    ]);
    Route::resource('categories', CategoryController::class)->names([
        'index' => 'categories.index',
        'create' => 'categories.create',
        'store' => 'categories.store',
        'show' => 'categories.show',
        'edit' => 'categories.edit',
        'update' => 'categories.update',
        'destroy' => 'categories.destroy',
    ]);
    Route::resource('loans', LoanController::class)->names([
        'index' => 'loans.index',
        'create' => 'loans.create',
        'store' => 'loans.store',
        'show' => 'loans.show',
        'edit' => 'loans.edit',
        'update' => 'loans.update',
        'destroy' => 'loans.destroy',
    ]);
    Route::resource('articles', ArticleController::class)->names([
        'index' => 'articles.index',
        'create' => 'articles.create',
        'store' => 'articles.store',
        'show' => 'articles.show',
        'edit' => 'articles.edit',
        'update' => 'articles.update',
        'destroy' => 'articles.destroy',
    ]);


    
});

