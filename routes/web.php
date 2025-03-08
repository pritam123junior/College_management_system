<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\ClassController;

//admin

Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified'])->group(function () {

    Route::get('dashboard', function () {
        return view('admin.page.dashboard');
    })->name('dashboard');

//class
  
Route::prefix('class')->name('class.')->group(function () {
    Route::get('index', [ClassController::class, 'index'])->name('index');
    Route::get('add', [ClassController::class, 'add'])->name('add');
    Route::post('store', [ClassController::class, 'store'])->name('store');

    Route::get('edit/{id}', [ClassController::class, 'edit'])->name('edit'); // Fix: Added {id}
    Route::put('update/{id}', [ClassController::class, 'update'])->name('update'); // Fix: Added {id}
    Route::delete('delete/{id}', [ClassController::class, 'delete'])->name('delete'); // Fix: Added {id}

    });
});



Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
