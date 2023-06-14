<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiaryController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('index', [DiaryController::class, 'index']);
Route::get('add', [DiaryController::class, 'add']);
Route::post('add', [DiaryController::class, 'create']);
Route::get('edit/{id}', [DiaryController::class, 'edit']);
Route::post('edit/{id}', [DiaryController::class, 'update']);

