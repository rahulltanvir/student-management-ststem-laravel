<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SchoolClassController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SessionYearController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Authenticated Routes (Breeze handles auth)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    /* Dashboard */
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    /* Class Module */
    Route::get('/class', [SchoolClassController::class, 'create'])
        ->name('class');

    Route::post('/store-class', [SchoolClassController::class, 'store'])
        ->name('store-class');
        /*sections*/
    Route::get('/section', [SectionController::class, 'create'])->name('section');
    Route::post('/section', [SectionController::class, 'store'])->name('store-section');

    /*session*/
    Route::get('/session-year',[SessionYearController::class, 'create'])->name('session-year');
    Route::post('/session-year',[SessionYearController::class, 'store'])->name('session-year');

/* add- student*/
    Route::get('/add-student',[StudentController::class, 'create'])->name('add-student');
    Route::get('/all-student',[StudentController::class, 'list'])->name('all-student');

    

    /* Profile (Breeze default) */
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Breeze Auth Routes
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';