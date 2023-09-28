<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    return view('home');
});
Route::get('/login', function () {
    return view('login');
}); */

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'signin'])->name('signin');
Route::get('/registro', [AuthController::class, 'register'])->name('register');
Route::post('/registro', [AuthController::class, 'saveUser'])->name('saveUser');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/tasks', [TaskController::class, 'index'])->name('task.view');
    Route::get('/task/new', [TaskController::class, 'create'])->name('task.create');
    Route::post('task/new', [TaskController::class, 'save'])->name('task.save');
    Route::get('/task/edit', [TaskController::class, 'edit'])->name('task.edit');
    Route::post('task/edit', [TaskController::class, 'update'])->name('task.update');
    Route::get('/task/delete', [TaskController::class, 'delete'])->name('task.delete');
});
