<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\CategoryController;

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

    Route::prefix('user')->group(function () {
        Route::get('/{id}', [HomeController::class, 'userShow'])->name('home.user_show');
        Route::patch('/', [HomeController::class, 'userUpdate'])->name('home.user_update');
    });

    Route::prefix('ticket')->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('home.index');
        Route::get('/{id}', [HomeController::class, 'show'])->name('home.show');
        Route::post('/', [HomeController::class, 'store'])->name('home.store');
        Route::patch('/', [HomeController::class, 'update'])->name('home.update');
        Route::delete('/{id}', [HomeController::class, 'delete'])->name('home.delete');

        Route::prefix('s/all')->group(function () {
            Route::get('/', [HomeController::class, 'all'])->name('home.all');
            Route::patch('/', [HomeController::class, 'allUpdate'])->name('home.all_update');
            Route::get('/{id}', [HomeController::class, 'allShow'])->name('home.all_show');
        });
    });

    Route::prefix('admin')->middleware('admin')->group(function () {
        Route::prefix('user')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
            Route::get('/{id}', [UserController::class, 'show'])->name('admin.user.show');
            Route::post('/', [UserController::class, 'store'])->name('admin.user.store');
            Route::patch('/', [UserController::class, 'update'])->name('admin.user.update');
            Route::delete('/{id}', [UserController::class, 'delete'])->name('admin.user.delete');
        });

        Route::prefix('ticket')->group(function () {
            Route::get('/', [TicketController::class, 'index'])->name('admin.ticket.index');
            Route::get('/{id}', [TicketController::class, 'show'])->name('admin.ticket.show');
            Route::post('/', [TicketController::class, 'store'])->name('admin.ticket.store');
            Route::patch('/', [TicketController::class, 'update'])->name('admin.ticket.update');
            Route::delete('/{id}', [TicketController::class, 'delete'])->name('admin.ticket.delete');
        });

        Route::prefix('role')->group(function () {
            Route::get('/', [RoleController::class, 'index'])->name('admin.role.index');
            Route::get('/{id}', [RoleController::class, 'show'])->name('admin.role.show');
            Route::post('/', [RoleController::class, 'store'])->name('admin.role.store');
            Route::patch('/', [RoleController::class, 'update'])->name('admin.role.update');
            Route::delete('/{id}', [RoleController::class, 'delete'])->name('admin.role.delete');
        });

        Route::prefix('category')->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('admin.category.index');
            Route::get('/{id}', [CategoryController::class, 'show'])->name('admin.category.show');
            Route::post('/', [CategoryController::class, 'store'])->name('admin.category.store');
            Route::patch('/', [CategoryController::class, 'update'])->name('admin.category.update');
            Route::delete('/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');
        });

        Route::prefix('status')->group(function () {
            Route::get('/', [StatusController::class, 'index'])->name('admin.status.index');
            Route::get('/{id}', [StatusController::class, 'show'])->name('admin.status.show');
            Route::post('/', [StatusController::class, 'store'])->name('admin.status.store');
            Route::patch('/', [StatusController::class, 'update'])->name('admin.status.update');
            Route::delete('/{id}', [StatusController::class, 'delete'])->name('admin.status.delete');
        });

    });

    Route::fallback(function () {
        return redirect('/ticket');
    });
});
