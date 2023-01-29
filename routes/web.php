<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomAuthController;
use Illuminate\Support\Facades\Route;


Route::get('/registration', [CustomAuthController::class, 'registration']);//->middleware('alreadyLoggedIn');
Route::get('/', [CustomAuthController::class, 'login'])->name('login');//middleware('alreadyLoggedIn')->
Route::post('/register-user', [CustomAuthController::class, 'registerUser'])->name('register-user');//->middleware('alreadyLoggedIn');
Route::post('/login-user', [CustomAuthController::class, 'loginUser'])->middleware('alreadyLoggedIn')->name('login-user');
Route::get('/user', [CustomAuthController::class, 'user'])->middleware('isLoggedIn');
Route::get('/logout', [CustomAuthController::class, 'logout'])->middleware('isLoggedIn');
Route::get('/admin', [CustomAuthController::class, 'admin'])->name('admin');//->middleware('admin');
Route::get('/poweruser', [CustomAuthController::class, 'powerUser'])->name('poweruser');//->middleware('poweuser');

Route::get('user.create', [AdminController::class, 'create'])->name('user.create');
Route::post('/user.store', [AdminController::class, 'store'])->name('users.store');
Route::delete('/deleteuser/{id}', [AdminController::class, 'destroy'])->name('deleteuser');//->middleware('admin');

Route::get('/edituser/{id}', [AdminController::class, 'edit'])->name('edituser');
Route::put('/users.update/{id}', [AdminController::class, 'update'])->name('users.update');

Route::get('/edituser/role/{id}', [AdminController::class, 'editRole'])->name('edituser/role');//->middleware('poweuser');
Route::put('/users.update/role/{id}', [AdminController::class, 'updateRole'])->name('users.update/role');//->middleware('poweuser');