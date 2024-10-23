<?php


use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Middleware\MustBeAdmin;

Route::get('/', function () {
    return view('home');
});

Route::get('/blogs', [BlogController::class, 'homeBlog']);
Route::get('/blog/{blog:slug}', [BlogController::class, 'show'])->where('blog', '[A-z\d\-_]+');


//Admin || Dashboard
Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('can:admin');

Route::resource('/dashboard/blog', BlogController::class)->middleware('can:admin');
Route::resource('/dashboard/category', CategoryController::class)->middleware('mustBeAdmin');


// Admin
Route::middleware('auth')->group(function () {
    Route::post('/blog/{blog:slug}/comment', [CommentController::class, 'store']);
    Route::post('/blog/{blog:slug}/subscribe', [BlogController::class, 'subscriptionHandler']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

// Guest
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'store']);
    Route::post('/login', [AuthController::class, 'postLogin']);
});
