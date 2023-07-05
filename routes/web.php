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
Route::controller(DiaryController::class)->middleware('auth')->group(function() {
    Route::get('diary/create', 'create')->name('diary.create');
    Route::post('diary', 'store')->name('diary.store');
    Route::get('diary/{id}/edit', 'edit')->name('diary.edit');
    Route::put('diary/{id}', 'update')->name('diary.update');
    Route::delete('diary/{id}', 'destroy')->name('diary.destroy');
});

Route::get('diary', [DiaryController::class, 'index'])->name('diary.index');
Route::get('diary/{id}', [DiaryController::class, 'show'])->name('diary.show');
Route::get('search', [DiaryController::class, 'index'])->name('diary.search');

// User関係
Route::controller(UserController::class)->middleware('auth')->group(function() {
    Route::get('profile', 'profile')->name('user.profile');
    Route::get('profile/{id}/edit', 'edit')->name('user.edit');
    Route::put('profile/{id}', 'update')->name('user.update');
});

// 管理者のみアクセス可能
Route::middleware('admin')->group(function() {
    // ダッシュボード
    Route::get('dashboard/user', [DashboardController::class, 'user_index'])->name('dashboard.user_index');
    Route::get('dashboard/diary', [DashboardController::class, 'diary_index'])->name('dashboard.diary_index');
    // CSVのインポート・エクスポート
    Route::get('/diary/csv-export', [DiaryController::class, 'csvExport'])->name('diary_csv.export');
    Route::post('/diary/csv-import', [DiaryController::class, 'csvImport'])->name('diary_csv.import');
    Route::get('/user/csv-export', [UserController::class, 'csvExport'])->name('user_csv.export');
    Route::post('/user/csv-import', [UserController::class, 'csvImport'])->name('user_csv.import');
});