<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\TitleSuggestionController;

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

// ログアウト
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

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

    Route::get('/title_suggestion', [TitleSuggestionController::class, 'getSuggestions'])->name('title_suggestion.getSuggestions');

    // タイトル登録
    Route::get('/title_suggestion/create',[TitleSuggestionController::class,'create'])->name('title_suggestion.create');
    Route::post('/title_suggestion', [TitleSuggestionController::class, 'store'])->name('title_suggestion.store');

    Route::get('/title_suggestion', [TitleSuggestionController::class, 'index'])->name('title_suggestion.index');

    Route::delete('/title_suggestion/{title_suggestion}', [TitleSuggestionController::class, 'destroy'])->name('title_suggestion.destroy');

});

