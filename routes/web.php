<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiaryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

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
Route::post('/diary/csv-import', [DiaryController::class, 'csvImport'])->name('diary_csv.import');

Route::get('diary', [DiaryController::class, 'index'])->name('diary.index');
Route::get('diary/create', [DiaryController::class, 'create'])->middleware('auth')->name('diary.create');
Route::post('diary', [DiaryController::class, 'store'])->middleware('admin.auth')->name('diary.store');
Route::get('diary/{id}', [DiaryController::class, 'show'])->name('diary.show');
Route::get('diary/{id}/edit', [DiaryController::class, 'edit'])->middleware('admin.auth')->name('diary.edit');
Route::put('diary/{id}', [DiaryController::class, 'update'])->middleware('auth')->name('diary.update');
Route::delete('diary/{id}', [DiaryController::class, 'destroy'])->middleware('admin.auth')->name('diary.destroy');
Route::get('search', [DiaryController::class, 'index'])->name('diary.search');

// User関係
Route::get('/user/csv-export', [UserController::class, 'csvExport'])->name('user_csv.export');
Route::post('/user/csv-import', [UserController::class, 'csvImport'])->name('user_csv.import');
Route::get('profile', [UserController::class, 'profile'])->middleware('auth')->name('user.profile');

// ダッシュボード
Route::get('dashboard/user', [DashboardController::class, 'user_index'])->name('dashboard.user_index');
Route::get('dashboard/diary', [DashboardController::class, 'diary_index'])->name('dashboard.diary_index');

