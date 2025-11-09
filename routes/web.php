<?php

use App\Http\Controllers\categoryController;
use App\Http\Controllers\ComplainsController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\frontController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\User\ComplainsController as UserComplainsController;
use App\Http\Controllers\UserController;
use App\Models\category;
use App\Models\Response;
use App\Models\User;
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
        Route::put('/users-update/{id}', 'updateUser')->name('user.update');
        Route::delete('/users-delete', 'deleteUser')->name('user.delete');
    });

    Route::controller(ComplainsController::class)->group(function () {
        Route::get('/complains', 'indexComplains')->name('index.complains');
        Route::get('/update/status/{id}', 'updateStatus')->name('update.complains');
    });

    Route::controller(ResponseController::class)->group(function () {
        Route::get('/Response', 'indexResponse')->name('index.Response');
        Route::get('/Response/form/{complain_id}', 'formResponse')->name('form.Response');
        Route::get('/Response/create', 'createRespone')->name('create.Response');
        Route::get('/Response/update', 'updateRespone')->name('update.Response');
        Route::get('/Response/delete', 'deleteRespone')->name('delete.Response');
    });

});

// Route untuk  akses User
Route::prefix('user')->middleware(['auth', 'iniUser'])->group(function() {
    Route::controller(DashboardUserController::class)->group(function() {
        Route::get('/dashboard-user', 'indexUser')->name('dashboard.user');
    });

    Route::controller(UserComplainsController::class)->group(function() {
        Route::get('/pengaduan-my', 'tableUser')->name('pengaduan.my');
        Route::get('/form-aduan', 'formAduan')->name('form.aduan');
        Route::post('/form-aduan/store', 'storeAduan')->name('store.aduan');
        Route::delete('/form-aduan/delete', 'deleteAduan')->name('delete.aduan');
        });
});
