<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserBookController;
use App\Http\Controllers\BorrowBookController;
use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    return view('welcome');
});

Route::post('/return/{transaction_id}', [BorrowBookController::class, 'return'])->name('books.return');


// Rute untuk pengguna biasa
Route::middleware(['auth'])->group(function () {
    Route::get('/books', [UserBookController::class, 'index'])->name('books.index');
    Route::get('/books/{id}', [UserBookController::class, 'show'])->name('books.show');
    Route::post('/borrow/{book_id}', [BorrowBookController::class, 'store'])->name('books.borrow');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Rute untuk profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rute untuk admin
Route::middleware(['auth', 'admin'])->group(function () {
    // Dashboard admin
    Route::get('admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');

    Route::prefix('admin')->group(function () {
        // Manajemen pengguna
        Route::get('/users', [UserController::class, 'index'])->name('admin.user.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('admin.user.create');
        Route::post('/users', [UserController::class, 'store'])->name('admin.user.store');
        Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::put('/users/{id}', [UserController::class, 'update'])->name('admin.user.update');
        Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('admin.user.destroy');

        // Manajemen buku
        Route::prefix('books')->group(function () {
            Route::get('/create', [BookController::class, 'create'])->name('admin.books.create');
            Route::post('/', [BookController::class, 'store'])->name('admin.books.store');
            Route::get('/', [BookController::class, 'index'])->name('admin.books.index');
            Route::get('/{id}/edit', [BookController::class, 'edit'])->name('admin.books.edit');
            Route::put('/{id}', [BookController::class, 'update'])->name('admin.books.update');
            Route::delete('/{id}', [BookController::class, 'destroy'])->name('admin.books.destroy');


        });
    });
});

require __DIR__ . '/auth.php';
