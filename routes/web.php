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
    Route::get('/class', [SchoolClassController::class, 'create'])->name('class');
    // Route::resource('classes', SchoolClassController::class);
    Route::post('/store-class', [SchoolClassController::class, 'store'])->name('store-class');
    Route::get('/edit/{id}', [SchoolClassController::class, 'edit'])->name('edit');
    Route::put('/class/update/{id}', [SchoolClassController::class, 'update'])->name('class.update');
    Route::delete('/class/delete/{id}', [SchoolClassController::class, 'destroy'])->name('class.delete');

        /*sections*/
    Route::get('/section', [SectionController::class, 'create'])->name('section');
    Route::post('/section', [SectionController::class, 'store'])->name('store-section');
    Route::get('/section/edit/{id}', [SectionController::class, 'edit'])->name('edit-section');
    Route::put('/section/update/{id}',[SectionController::class, 'update'])->name('section.update');
    Route::delete('/section/delete/{id}',[SectionController::class, 'destroy'])->name('section.delete');


    /*session*/
    Route::get('/session-year',[SessionYearController::class, 'create'])->name('session-year');
    Route::post('/session-year',[SessionYearController::class, 'store'])->name('session-year');

/* add- student*/
    Route::get('/students', [StudentController::class, 'list'])->name('students.list');

    Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');

    Route::post('/students', [StudentController::class, 'store'])->name('students.store');

    

    /* Profile (Breeze default) */
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

// index()   → list
// create()  → form
// store()   → insert
// edit()    → edit form
// update()  → update
// destroy() → delete
/*
|--------------------------------------------------------------------------
| Breeze Auth Routes
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';