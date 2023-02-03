<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Animal;

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

Route::get('/', [AnimalController::class, 'index']);

Route::get('/Animals/create', [AnimalController::class, 'create'])->middleware('auth');

Route::post('/Animals', [AnimalController::class, 'store'])->middleware('auth');

Route::get('/Animals/{Animal}/edit', [AnimalController::class, 'edit'])->middleware('auth');

Route::put('/Animals/{Animal}', [AnimalController::class, 'update'])->middleware('auth');

Route::delete('/Animals/{Animal}', [AnimalController::class, 'destroy'])->middleware('auth');

Route::get('/Animals/manage', [AnimalController::class, 'manage'])->middleware('auth');

Route::get('/Animals/{Animal}', [AnimalController::class, 'show']);

Route::get('/register', [UserController::class, 'create'])->middleware('guest');

Route::post('/users', [UserController::class, 'store']);

Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

Route::post('/users/authenticate', [UserController::class, 'authenticate']);