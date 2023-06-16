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

Route::get('diary', [DiaryController::class, 'index'])->name('diary.index');
Route::get('diary/create', [DiaryController::class, 'create'])->name('diary.create');
Route::post('diary', [DiaryController::class, 'store'])->name('diary.store');
Route::get('diary/{id}', [DiaryController::class, 'show'])->name('diary.show');
Route::get('diary/{id}/edit', [DiaryController::class, 'edit'])->name('diary.edit');
Route::put('diary/{id}', [DiaryController::class, 'update'])->name('diary.update');
Route::delete('diary/{id}', [DiaryController::class, 'destroy'])->name('diary.destroy');


Auth::routes();
