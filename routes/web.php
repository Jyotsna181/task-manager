<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('tasks') -> middleware(['auth'])-> group(function(){
    Route::get('/index',[App\Http\Controllers\TaskController::class, 'index']);
    Route::get('/alltask',[App\Http\Controllers\TaskController::class, 'show']);
    Route::get('create-task',[App\Http\Controllers\TaskController::class, 'create']);
    Route::post('add-task',[App\Http\Controllers\TaskController::class, 'store']);
    Route::get('edit-task/{task_id}',[App\Http\Controllers\TaskController::class, 'edit']);
    Route::put('update-task/{task_id}',[App\Http\Controllers\TaskController::class, 'update']);
    Route::get('delete-task/{task_id}',[App\Http\Controllers\TaskController::class, 'delete']);
    Route::get('delete-task/{task_id}',[App\Http\Controllers\TaskController::class, 'delete']);
    Route::get('user',[App\Http\Controllers\UserController::class, 'edit']);
    Route::put('update-user/{user_id}',[App\Http\Controllers\UserController::class, 'update']);
});


