<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\Export\AuthorExportController;
use App\Http\Controllers\Export\BookExportController;
use App\Http\Controllers\Export\UserExportController;
use App\Http\Controllers\UserController;
use App\Models\Author;
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

// Регистрация пользователей
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Аутентификация пользователей
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
    $authors = Author::query()->with('books')->get();

    return view('main', compact('authors'));
})->name('main');

Route::middleware('auth')->middleware('role:admin')->group(function (){
    Route::group(['prefix' => '/books'], function () {
        Route::get('/create', [BookController::class, 'create'])->name('books.create');
        Route::post('/', [BookController::class, 'store'])->name('books.store');
        Route::get('/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
        Route::post('/{book}', [BookController::class, 'update'])->name('books.update');
        Route::get('/{book}/delete', [BookController::class, 'destroy'])->name('books.destroy');
        Route::get('/export/csv', [BookExportController::class, 'csv'])->name('books.export.csv');
        Route::get('/export/xls', [BookExportController::class, 'xls'])->name('books.export.xls');
        Route::get('/export/pdf', [BookExportController::class, 'pdf'])->name('books.export.pdf');
        Route::get('/', [BookController::class, 'index'])->name('books.index');
        Route::get('/{book}', [BookController::class, 'show'])->name('books.show');
    });
    Route::group(['prefix' => '/authors'], function () {
        Route::get('/create', [AuthorController::class, 'create'])->name('authors.create');
        Route::post('/', [AuthorController::class, 'store'])->name('authors.store');
        Route::get('/{author}/edit', [AuthorController::class, 'edit'])->name('authors.edit');
        Route::post('/{author}', [AuthorController::class, 'update'])->name('authors.update');
        Route::get('/{author}/delete', [AuthorController::class, 'destroy'])->name('authors.destroy');
        Route::get('/export/csv', [AuthorExportController::class, 'csv'])->name('authors.export.csv');
        Route::get('/export/xls', [AuthorExportController::class, 'xls'])->name('authors.export.xls');
        Route::get('/export/pdf', [AuthorExportController::class, 'pdf'])->name('authors.export.pdf');
        Route::get('/', [AuthorController::class, 'index'])->name('authors.index');
        Route::get('/{author}', [AuthorController::class, 'show'])->name('authors.show');
    });
    Route::group(['prefix' => '/users'], function () {
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::post('/{user}', [UserController::class, 'update'])->name('users.update');
        Route::get('/{user}/delete', [UserController::class, 'destroy'])->name('users.destroy');
        Route::get('/export/csv', [UserExportController::class, 'csv'])->name('users.export.csv');
        Route::get('/export/xls', [UserExportController::class, 'xls'])->name('users.export.xls');
        Route::get('/export/pdf', [UserExportController::class, 'pdf'])->name('users.export.pdf');
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/{user}', [UserController::class, 'show'])->name('users.show');
    });
});
