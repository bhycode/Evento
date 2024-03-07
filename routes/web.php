<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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



Route::get('/signup', [RegisterController::class, 'showRegistrationForm'])->name('signup');
Route::post('/signup', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/', [HomeController::class, 'index'])->name('home');



Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::delete('/soft-delete/{id}', [AdminController::class, 'softDelete'])->name('soft-delete');

    Route::get('/event-categories', [AdminController::class, 'eventCategoriesIndex'])->name('event-categories.index');
    Route::get('/event-categories/create', [AdminController::class, 'eventCategoriesCreate'])->name('event-categories.create');
    Route::post('/event-categories/store', [AdminController::class, 'eventCategoriesStore'])->name('event-categories.store');
    Route::get('/event-categories/{eventCategory}/edit', [AdminController::class, 'eventCategoriesEdit'])->name('event-categories.edit');
    Route::put('/event-categories/{eventCategory}/update', [AdminController::class, 'eventCategoriesUpdate'])->name('event-categories.update');
    Route::delete('/event-categories/{eventCategory}/destroy', [AdminController::class, 'eventCategoriesDestroy'])->name('event-categories.destroy');
});
