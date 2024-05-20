<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PromocionesController;
use App\Http\Controllers\ReservacionesController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/about', function () {
    return view('about');
})->name('about');

// Rutas para 
//Route::resource('personas', PersonaController::class);
Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create');
Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');
Route::get('/clientes/{cliente}', [ClienteController::class, 'show'])->name('clientes.show');
Route::get('/clientes/{cliente}/edit', [ClienteController::class, 'edit'])->name('clientes.edit');
Route::put('/clientes/{cliente}', [ClienteController::class, 'update'])->name('clientes.update');
Route::delete('/clientes/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');

//Rutas para Reservacion
Route::get('/reservaciones', [ReservacionesController::class, 'index'])->name('reservaciones.index');
Route::get('/reservaciones/create', [ReservacionesController::class, 'create'])->name('reservaciones.create');
Route::post('/reservaciones', [ReservacionesController::class, 'store'])->name('reservaciones.store');
Route::get('/reservaciones/{reservacion}', [ReservacionesController::class, 'show'])->name('reservaciones.show');
Route::get('/reservaciones/{reservacion}/edit', [ReservacionesController::class, 'edit'])->name('reservaciones.edit');
Route::put('/reservaciones/{reservacion}', [ReservacionesController::class, 'update'])->name('reservaciones.update');
Route::delete('/reservaciones/{reservacion}', [ReservacionesController::class, 'destroy'])->name('reservaciones.destroy');

// Rutas para Promocion
Route::get('/promociones', [PromocionesController::class, 'index'])->name('promociones.index');
Route::get('/promociones/create', [PromocionesController::class, 'create'])->name('promociones.create');
Route::post('/promociones', [PromocionesController::class, 'store'])->name('promociones.store');
Route::get('/promociones/{promocion}', [PromocionesController::class, 'show'])->name('promociones.show');
Route::get('/promociones/{promocion}/edit', [PromocionesController::class, 'edit'])->name('promociones.edit');
Route::put('/promociones/{promocion}', [PromocionesController::class, 'update'])->name('promociones.update');
Route::delete('/promociones/{promocion}', [PromocionesController::class, 'destroy'])->name('promociones.destroy');
