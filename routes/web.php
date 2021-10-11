<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

//感想文一覧画面
Route::get('/show', [App\Http\Controllers\HomeController::class, 'show'])->name('show');

//感想文登録表示画面
Route::get('/', [App\Http\Controllers\HomeController::class, 'create'])->name('create');

//感想文登録画面
Route::post('/show/store', [App\Http\Controllers\HomeController::class, 'store'])->name('store');

//感想文一覧画面
Route::get('/show/{id}', [App\Http\Controllers\HomeController::class, 'detail'])->name('detail');

//編集画面
Route::get('/edit/{id}', [App\Http\Controllers\HomeController::class, 'edit'])->name('edit');
Route::post('/update', [App\Http\Controllers\HomeController::class, 'update'])->name('update');

//感想を削除する
Route::post('/delete/{id}', [App\Http\Controllers\HomeController::class, 'delete'])->name('delete');