<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthController;
use App\Models\Karyawan;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/password/reset', [AuthController::class, 'showResetPasswordForm'])->name('password.request');
Route::post('/password/email', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reset/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/password/reset', [AuthController::class, 'reset']);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('Dashboard');

//Project
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('projects.show');
Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
Route::put('/projects/{id}', [ProjectController::class, 'update'])->name('projects.update');
Route::delete('/projects/{id}', [ProjectController::class, 'destroy'])->name('projects.destroy');

//Karyawan

Route::get('karyawans', [KaryawanController::class, 'index'])->name('karyawans.index');
Route::get('karyawans/create', [KaryawanController::class, 'create'])->name('karyawans.create');
Route::post('karyawans/store', [KaryawanController::class, 'store'])->name('karyawans.store');
Route::get('karyawans/{karyawan}', [KaryawanController::class, 'show'])->name('karyawans.show');
Route::get('karyawans/{karyawan}/edit', [KaryawanController::class, 'edit'])->name('karyawans.edit');
Route::put('karyawans/{karyawan}/update', [KaryawanController::class, 'update'])->name('karyawans.update');
Route::get('karyawans/{karyawan}/delete', [KaryawanController::class, 'destroy'])->name('karyawans.destroy');


//Task
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');