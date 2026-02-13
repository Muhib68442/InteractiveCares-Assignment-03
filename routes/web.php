<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Middleware\SessionAuth;

Route::get('/', function () {
    return redirect()->route('login');
});

// REGISTER 
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');

// LOGIN
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');

// REQUIRE LOGIN ROUTES
Route::group(['middleware' => [SessionAuth::class]], function () {

    // GENERAL
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    // PROFILE 
    Route::get('/edit-profile', function() { return view('edit-profile'); })->name('profile.edit');
    Route::get('/change-password', function() { return view('change-password'); })->name('password.change');

    // BOOK 
    Route::resource('books', BookController::class);  
    
    // AUTHOR
    Route::resource('authors', AuthorController::class);

    // CATEGORY
    Route::resource('categories', CategoryController::class);

    // PROFILE & PASSWORD MANAGEMENT 
    Route::get('/edit-profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/edit-profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/change-password', [ProfileController::class, 'changePassword'])->name('password.change');
    Route::post('/change-password', [ProfileController::class, 'changePasswordPost'])->name('password.change.post');

});