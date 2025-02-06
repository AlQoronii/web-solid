<?php

use App\Http\Controllers\Api\ApiArticles;
use App\Http\Controllers\Api\ApiBook;
use App\Http\Controllers\Api\ApiCategories;
use App\Http\Controllers\Api\ApiLoans;
use App\Http\Controllers\Api\ApiUsers;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// articles



Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {

    Route::post('books', [BookController::class, 'store']);
    Route::post('books/{id}', [BookController::class, 'update']);
    Route::delete('books/{id}', [BookController::class, 'destroy']);

    Route::post('articles', [ArticleController::class, 'store']);
    Route::post('articles/{id}', [ArticleController::class, 'update']);
    Route::delete('articles/{id}', [ArticleController::class, 'destroy']);

    Route::post('categories', [CategoryController::class, 'store']);
    Route::put('categories/{id}', [CategoryController::class, 'update']);
    Route::delete('categories/{id}', [CategoryController::class, 'destroy']);

    Route::post('users', [UserController::class, 'store']);
    Route::post('users/{id}', [UserController::class, 'update']);
    Route::delete('users/{id}', [UserController::class, 'destroy']);

    Route::get('loans', [LoanController::class, 'index']);
    Route::get('loans/{id}', [LoanController::class, 'show']);
    Route::post('loans', [LoanController::class, 'store']);
    Route::post('loans/{id}', [LoanController::class, 'update']);
    Route::delete('loans/{id}', [LoanController::class, 'destroy']);
});

// users
Route::middleware(['auth:sanctum'])->group(function () {
    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('dashboard', [DashboardController::class, 'data'])->name('dashboard.data');

    Route::get('articles', [ArticleController::class, 'index']);
    Route::get('articles/{id}', [ArticleController::class, 'show']);

    Route::get('books', [BookController::class, 'index']);
    Route::get('books/{id}', [BookController::class, 'show']);

    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('categories/{id}', [CategoryController::class, 'show']);

    Route::get('users', [UserController::class, 'index']);
    Route::get('users/{id}', [UserController::class, 'show']);


    Route::get('apiArticles', [ApiArticles::class, 'index']);
    Route::get('apiArticles/{id}', [ApiArticles::class, 'show']);
    Route::get(('apiLoans'), [ApiLoans::class, 'index']);
    Route::get('apiLoans/{id}', [ApiLoans::class, 'show']);
    Route::get('roles', [RoleController::class, 'index']);
    Route::get('apiUsers', [ApiUsers::class, 'loadAllUsers']);
    Route::get('apiUsers/{id}', [ApiUsers::class, 'show']);
    Route::get('apiBooks', [ApiBook::class, 'index']);
    Route::get('apiBooks/{id}', [ApiBook::class, 'show']);
    Route::get('apiCategories', [ApiCategories::class, 'index']);
    Route::get('apiCategories/{id}', [ApiCategories::class, 'show']);
    
});


Route::post('login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);