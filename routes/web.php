<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;


// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [TodoController::class, 'index']);
Route::post('/todos', [TodoController::class, 'store']);
Route::delete('/todos/{index}', [TodoController::class, 'destroy']);
Route::post('/todos/change/{index}', [TodoController::class, 'change']);
