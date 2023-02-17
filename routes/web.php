<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the Rouhome.showteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::prefix('ticket')->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('home.index');
        Route::post('/', [HomeController::class, 'store'])->name('home.store');
        Route::delete('/{id}', [HomeController::class, 'delete'])->name('home.delete');
        Route::patch('/', [HomeController::class, 'update'])->name('home.update');
        Route::get('/{id}', [HomeController::class, 'show'])->name('home.show');

        Route::get('s/all', [HomeController::class, 'all'])->name('home.all');
        Route::get('s/all/{id}', [HomeController::class, 'allShow'])->name('home.all_show');
        Route::patch('s/all', [HomeController::class, 'allUpdate'])->name('home.all_update');

    });

    Route::prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    });


    Route::fallback(function () {
        return redirect('/ticket');
    });
});
