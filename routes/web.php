<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('dashboard');
})->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware('auth:karyawan');

// Authentication 
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/password/reset', [AuthController::class, 'showResetPasswordForm'])->name('password.request');
Route::get('/password/reset/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/password/reset', [AuthController::class, 'reset']);

// Project 
Route::middleware(['auth:karyawan'])->group(function () {
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('projects.show');
    Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/projects/{id}', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{id}', [ProjectController::class, 'destroy'])->name('projects.destroy');
});

// Karyawan 
Route::middleware(['auth:karyawan'])->group(function () {
    Route::get('karyawans', [KaryawanController::class, 'index'])->name('karyawans.index');
    Route::get('karyawans/create', [KaryawanController::class, 'create'])->name('karyawans.create');
    Route::post('karyawans/store', [KaryawanController::class, 'store'])->name('karyawans.store');
    Route::get('/karyawans/{id}/edit', [KaryawanController::class, 'edit'])->name('karyawans.edit');
    Route::put('/karyawans/update/{id}', [KaryawanController::class, 'update'])->name('karyawans.update');
    Route::get('karyawans/{id}/destroy', [KaryawanController::class, 'destroy'])->name('karyawans.destroy');
    Route::get('karyawans/{id}/show', [KaryawanController::class, 'show'])->name('karyawans.show');
    Route::get('/karyawans/{id}/detail', [KaryawanController::class, 'detail'])->name('karyawans.detail');
});

// Task 
Route::middleware(['auth:karyawan'])->group(function () {
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('/tasks/{id}', [TaskController::class, 'show'])->name('tasks.show');
    Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
});

Route::middleware(['auth:karyawan'])->group(function () {
    Route::get('admins/settings', [AdminController::class, 'settings'])->name('admins.settings');
    Route::get('admins/taskuser', [AdminController::class, 'taskuser'])->name('admins.taskuser');
    Route::get('admins/create', [AdminController::class, 'create'])->name('admins.create');
    Route::post('admins', [AdminController::class, 'store'])->name('admins.store');
    Route::get('admins/{id}', [AdminController::class, 'show'])->name('admins.show');
    Route::get('admins/{id}/edit', [AdminController::class, 'edit'])->name('admins.edit');
    Route::put('admins/{id}', [AdminController::class, 'update'])->name('admins.update');
    Route::delete('admins/{id}', [AdminController::class, 'destroy'])->name('admins.destroy');
});
