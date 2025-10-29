<?php

use App\Http\Controllers\categoryController;
use App\Http\Controllers\frontController;
use App\Http\Controllers\UserController;
use App\Models\category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/index', function () {
    $nama = 'John Doe';
    $jurusan = 'Teknik Informatika';
    $asal = 'Switzerland';
    return view('index' , compact('nama', 'jurusan', 'asal'));
});

Route::get('/table', function () {
    return view('table');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'iniAdmin'])->group(function() {
    // Route Per controller
    Route::controller(frontController::class)->group(function() {
        Route::get('/dashboard', 'indexFront')->name('dashboard.admin');
    });

    Route::controller(categoryController::class)->group(function() {   
    Route::get('/category', 'indexCategory')->name('index.category');  
    Route::post('/create-category', 'createCategory')->name('create.category');
    Route::put('/update-category', 'updateCategory')->name('update.category');
    Route::delete('/delete-category', 'deleteCategory')->name('delete.category');
    });

    Route::controller(UserController::class)->group(function() {
        Route::get('/users', 'indexUser')->name('user.admin');
        Route::post('/users-create', 'createUser')->name('user.create');
    });
});
