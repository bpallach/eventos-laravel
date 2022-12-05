<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventTypeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
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

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'create')->name('login');
    Route::post('/login', 'store')->name('submitLogin');
    Route::get('/logout', 'destroy')->name('logout');
});  

Route::middleware('auth')->group(function () {

    Route::controller(EventController::class)->group(function () {
        Route::get('/', 'index')->name('home');
        Route::get('/evento/{id}', 'show')->name('event');
    });
    
    Route::middleware('auth.admin')->group(function () {

        Route::get('/admin', [DashboardController::class, 'index'])->name('admin');

        Route::controller(EventTypeController::class)->group(function () {
            Route::get('/admin/tipo-evento/nuevo','create')->name('addTypeEvent');
            Route::post('/admin/tipo-evento/nuevo','store')->name('submitAddTypeEvent');
            Route::get('/admin/tipo-evento/eliminar/{id}','destroy')->name('deleteTypeEvent');
        });

        Route::controller(EventController::class)->group(function () {
            Route::get('/admin/evento/nuevo', 'create')->name('addEvent');
            Route::post('/admin/evento/nuevo', 'store')->name('submitAddEvent');
            Route::get('/admin/evento/editar/{id}', 'edit')->name('editEvent');
            Route::patch('/admin/evento/editado/{id}', 'update')->name('submitEditEvent');
            Route::get('/admin/evento/eliminar/{id}', 'destroy')->name('deleteEvent');
        });    

    });
});


