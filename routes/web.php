<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LibraryController;

Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('register', [RegisterController::class, 'RegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::prefix('games')->group(function () {
    Route::get('/', [GameController::class, 'index'])->name('games.index');
    Route::get('/create', [GameController::class, 'create'])->name('games.create');
    Route::post('/', [GameController::class, 'store'])->name('games.store');
    Route::get('/{game}', [GameController::class, 'show'])->name('games.show');
    Route::get('/{game}/edit', [GameController::class, 'edit'])->name('games.edit');
    Route::put('/{game}', [GameController::class, 'update'])->name('games.update');
    Route::delete('/{game}', [GameController::class, 'destroy'])->name('games.destroy');
});

Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index');
    Route::get('/novedad', [UserController::class, 'novedad'])->name('users.novedad');
    Route::post('/', [UserController::class, 'store'])->name('users.store');
    Route::get('/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/{user}', [UserController::class, 'destroy'])->name('users.destroy');

});

Route::get('/profile', [UserController::class, 'showProfile'])->name('profile');
Route::get('/chat', [UserController::class, 'chat'])->name('chat');
Route::post('/chat', [UserController::class, 'sendMessage'])->name('send.message');
Route::get('/biblioteca', [LibraryController::class, 'index'])->name('biblioteca');
Route::get('/biblioteca/{game}', [LibraryController::class, 'addToLibrary'])->name('biblioteca.add');
Route::delete('/biblioteca/{id}', [LibraryController::class, 'destroy'])->name('biblioteca.destroy');

