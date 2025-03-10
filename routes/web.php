<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherClassController;
use App\Http\Controllers\TeacherContentController;
use App\Http\Middleware\AdminAuthCheck;
use App\Http\Middleware\TeacherAuthCheck;
use App\Http\Middleware\StudentAuthCheck;

//admin

Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified'])->group(function () {

    Route::get('dashboard', function () {
        return view('admin.page.dashboard');
    })->name('dashboard');

//class
  
/* Route::prefix('class')->name('class.')->group(function () {
    Route::get('index', [ClassController::class, 'index'])->name('index');
    Route::get('add', [ClassController::class, 'add'])->name('add');
    Route::post('store', [ClassController::class, 'store'])->name('store');

    Route::get('edit/{id}', [ClassController::class, 'edit'])->name('edit'); // Fix: Added {id}
    Route::put('update/{id}', [ClassController::class, 'update'])->name('update'); // Fix: Added {id}
    Route::delete('delete/{id}', [ClassController::class, 'delete'])->name('delete'); // Fix: Added {id}

    }); */



})->middleware(AdminAuthCheck::class);


//teacher

Route::prefix('teacher')->name('teacher.')->middleware(['auth', 'verified'])->group(function () {

    Route::get('dashboard', function () {
        return view('teacher.page.dashboard');
    })->name('dashboard');

    //content
  
    Route::prefix('class')->name('class.')->group(function () {
        Route::get('index', [TeacherClassController::class, 'index'])->name('index');
        Route::get('add-content', [TeacherClassController::class, 'addContent'])->name('content.add');
        Route::post('store-content', [TeacherClassController::class, 'storeContent'])->name('content.store');
        Route::get('edit-content/{id}', [TeacherClassController::class, 'editContent'])->name('content.edit'); 
        Route::put('update-content/{id}', [TeacherClassController::class, 'updateContent'])->name('content.update'); 
        Route::delete('delete-content/{id}', [TeacherClassController::class, 'deleteContent'])->name('content.delete'); 

    });

    Route::prefix('content')->name('content.')->group(function () {
        Route::get('list/{id}', [TeacherContentController::class, 'index'])->name('index');
        Route::get('add/{id}', [TeacherContentController::class, 'add'])->name('add');
        Route::post('store/{id}', [TeacherContentController::class, 'store'])->name('store');
        Route::delete('delete/{id}', [TeacherContentController::class, 'delete'])->name('delete'); 

    });



})->middleware(TeacherAuthCheck::class);



Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
