<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\LopMonHocController;
use App\Http\Controllers\Admin\SinhVienController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin/users/login',[LoginController::class, 'index'])->name('login');

Route::post('/admin/users/login/store',[LoginController::class, 'store']);

//Route::get('/admin/main',[MainController::class, 'index']) -> name('admin');
Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {

        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::get('main', [MainController::class, 'index']);

        Route::prefix('lopmh')->group(function () {
            Route::get('add', [LopMonHocController::class, 'create']);
            Route::post('add', [LopMonHocController::class, 'store']);
            Route::get('list', [LopMonHocController::class, 'index']);
            Route::get('edit/{lop}', [LopMonHocController::class, 'show']);
            Route::post('edit/{lop}', [LopMonHocController::class, 'update']);
            Route::DELETE('/delete',[LopMonHocController::class,'delete']);
        });

        Route::prefix('sinhvien')->group(function () {
            Route::get('add', [SinhVienController::class, 'create']);
            Route::post('add', [SinhVienController::class, 'store']);
            Route::get('list', [SinhVienController::class, 'index']);
            Route::get('edit/{sv}', [SinhVienController::class, 'show']);
            Route::post('edit/{sv}', [SinhVienController::class, 'update']);
            Route::DELETE('/delete',[SinhVienController::class,'delete']);
        });
    });

    
    
});