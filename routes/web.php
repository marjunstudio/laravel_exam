<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiaryController;
use App\Http\Controllers\UserController;

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
    return view('home.static');
})->middleware('guest');;



// Diary関係
// Laravel Excel用
Route::get('/diary/csv-export', [DiaryController::class, 'csvExport'])->name('diary_csv.export');

Route::get('diary', [DiaryController::class, 'index'])->name('diary.index');
Route::get('diary/create', [DiaryController::class, 'create'])->middleware('auth')->name('diary.create');
Route::post('diary', [DiaryController::class, 'store'])->middleware('auth')->name('diary.store');
Route::get('diary/{id}', [DiaryController::class, 'show'])->name('diary.show');
Route::get('diary/{id}/edit', [DiaryController::class, 'edit'])->middleware('auth')->name('diary.edit');
Route::put('diary/{id}', [DiaryController::class, 'update'])->middleware('auth')->name('diary.update');
Route::delete('diary/{id}', [DiaryController::class, 'destroy'])->middleware('auth')->name('diary.destroy');
Route::get('search', [DiaryController::class, 'index'])->name('diary.search');

// User関係
Route::get('profile', [UserController::class, 'profile'])->middleware('auth')->name('user.profile');
