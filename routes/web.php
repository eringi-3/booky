<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
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

Route::get('/', function () {
    return view('welcome');
});

// ログイン画面
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('showRegisterForm');

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login');

Route::middleware(['auth'])->group(function () {
    // 本の登録画面
    Route::get('/books/create', [BooksController::class, 'create'])->name('books.create');
    Route::post('/books', [BooksController::class, 'store'])->name('books.store');

    // 一覧画面
    Route::get('/books', [BooksController::class, 'index'])->name('books.index');
    Route::get('/books/{book}/edit', [BooksController::class, 'edit'])->name('books.edit');

    Route::delete('/books/{book}', [BooksController::class, 'destroy'])->name('books.destroy');
    Route::put('/books/{book}', [BooksController::class, 'update'])->name('books.update');

    Route::get('/create', [BooksController::class, 'create'])->name('book.create');
});
