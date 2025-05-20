<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    // Route::get('student', [\App\Http\Controllers\studentController::class, 'index'])->name('student.index');
    // Route::get('student.create', [\App\Http\Controllers\studentController::class, 'create'])->name('student.create');
    Route::get('student.edit', [\App\Http\Controllers\studentController::class, 'edit'])->name('student.edit');
    // Route::get('student.delete', [\App\Http\Controllers\studentController::class, 'delete'])->name('student.delete');

    // Route::get('student', [App\Http\Controllers\studentController::class, 'index']);
    // Route::post('student', [App\Http\Controllers\studentController::class, 'index']);
    Route::get('student', [\App\Http\Controllers\studentController::class, 'index'])->name('student.index');
    Route::get('student/create', [App\Http\Controllers\studentController::class, 'create'])->name('student.create');
    Route::post('student', [App\Http\Controllers\studentController::class, 'store'])->name('student.store');
    // Route::get('student/{id}/edit', [App\Http\Controllers\studentController::class, 'edit'])->name('student.edit');
    // Route::put('student/{id}/edit', [App\Http\Controllers\studentController::class, 'update'])->name('student.update');
    Route::get('student/{id}/delete', [App\Http\Controllers\studentController::class, 'destroy'])->name('student.delete');


    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});
