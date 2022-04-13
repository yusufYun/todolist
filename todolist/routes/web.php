<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TDLController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [TDLController::class, 'todolist']);
Route::get('/deltask/{id}', [TDLController::class, 'deltask']);
Route::get('/registration', [TDLController::class, 'registration']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/tasks/{id}',[TDLController::class, 'tasks']);
Route::get('/admin', [AdminController::class, 'adminPanel'])->middleware('admin');
Route::get('/admin/delete_user/{id}', [AdminController::class, 'deleteUser'])->middleware('admin');
Route::get('/admin/block/{id}', [AdminController::class, 'block'])->middleware('admin');
Route::get('/admin/unblock/{id}', [AdminController::class, 'unblock'])->middleware('admin');
Route::get('/admin/user_info/{id}', [AdminController::class, 'userInfo'])->middleware('admin');

Route::post('/add_task', [TDLController::class, 'addtask']);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/registration', [LoginController::class, 'registration']);
Route::post('/change_state/{id}',[TDLController::class,'changeState']);

