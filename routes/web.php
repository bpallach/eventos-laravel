<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventTypeController;
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

Route::get('/', [EventController::class, 'index'])->name('home');

Route::get('/evento/{id}', [EventController::class, 'show'])->name('event');

Route::get('/admin/tipo-evento/nuevo', [EventTypeController::class, 'create'])->name('addTypeEvent');
Route::post('/admin/tipo-evento/nuevo', [EventTypeController::class, 'store'])->name('submitAddTypeEvent');
Route::get('/admin/tipo-evento/eliminar/{id}', [EventTypeController::class, 'destroy'])->name('deleteTypeEvent');

Route::get('/admin/evento/nuevo', [EventController::class, 'create'])->name('addEvent');
Route::post('/admin/evento/nuevo', [EventController::class, 'store'])->name('submitAddEvent');
Route::get('/admin/evento/editar/{id}', [EventController::class, 'edit'])->name('editEvent');
Route::patch('/admin/evento/editado/{id}', [EventController::class, 'update'])->name('submitEditEvent');
Route::get('/admin/evento/eliminar/{id}', [EventController::class, 'destroy'])->name('deleteEvent');


Route::get('/admin', [DashboardController::class, 'index'])->name('admin');


