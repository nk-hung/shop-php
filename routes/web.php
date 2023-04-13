<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\User\LoginController;
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

Route::get('/admin/users/login', [LoginController::class, 'login'])->name('login');

Route::post('/admin/users/login/store', [LoginController::class, 'store']);

Route::middleware(['auth'])->group(function () {
  // Admin
  Route::prefix('admin')->group(function () {
    Route::get('/', [MainController::class, 'index'])->name('admin');
    Route::get('/main', [MainController::class, 'index']);

    // Menus
    Route::prefix('menus')->group(function () {
      Route::get('/add', [MenuController::class, 'create']);
      Route::post('/add', [MenuController::class, 'store']);
      Route::get('/list', [MenuController::class, 'getList']);
    });
  });
});
