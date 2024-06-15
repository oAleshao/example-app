<?php

use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\GenresController;
use App\Http\Controllers\Admin\ReviewsController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Models\Review;

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

Route::get('/', [MainController::class, 'index'])->name('Home');
Route::get('/contacts', [MainController::class, 'contacts'])->name('contacts');
Route::post('/contacts', [MainController::class, 'sendEmail'])->name('contacts.send');
Route::get('/book/{book}', [MainController::class, 'book'])->name('book');
Route::get('/genre/{genre:slug}', [MainController::class, 'genre'])->name('genre');

Route::middleware(['auth', 'is.admin'])->prefix('admin')->group(function () {
    Route::resource('/genres', GenresController::class);
    Route::resource('/reviews', ReviewsController::class)->name('index', 'admin.reviews');
    Route::resource('/books', BookController::class);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
