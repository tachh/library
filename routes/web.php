<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BookMemberController;

// Homepage
Route::get('/', function () {
    return view('welcome');
});

// Book routes
Route::resource('books', BookController::class);

// Author routes
Route::resource('authors', AuthorController::class);

// Category routes
Route::resource('categories', CategoryController::class);

// Publisher routes
Route::resource('publishers', PublisherController::class);

// Member routes
Route::resource('members', MemberController::class);

// Book-Member relationship routes
Route::prefix('books/{book}')->group(function () {
    Route::get('members/create', [BookMemberController::class, 'create'])->name('book_members.create');
    Route::post('members', [BookMemberController::class, 'store'])->name('book_members.store');
    Route::get('members/{member}/edit', [BookMemberController::class, 'edit'])->name('book_members.edit');
    Route::put('members/{member}', [BookMemberController::class, 'update'])->name('book_members.update');
    Route::delete('members/{member}', [BookMemberController::class, 'destroy'])->name('book_members.destroy');
});




Route::middleware('guest')
    ->group(function () {
        Route::get('login', [LoginController::class, 'create'])->name('login');
        Route::post('login', [LoginController::class, 'store']);
    });

Route::middleware('auth')
    ->group(function () {
        Route::post('logout', [LoginController::class, 'destroy'])->name('logout');
    });

Route::middleware('auth')
    ->group(function () {
        Route::controller(BookController::class)
            ->group(function () {
                Route::get('', 'index')->name('home');
            });
    });
