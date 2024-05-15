<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\DocenteController;

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

// Rutas para Persona
//Route::resource('personas', PersonaController::class);
Route::get('/personas', [PersonaController::class, 'index'])->name('personas.index');
Route::get('/personas/create', [PersonaController::class, 'create'])->name('personas.create');
Route::post('/personas', [PersonaController::class, 'store'])->name('personas.store');
Route::get('/personas/{persona}', [PersonaController::class, 'show'])->name('personas.show');
Route::get('/personas/{persona}/edit', [PersonaController::class, 'edit'])->name('personas.edit');
Route::put('/personas/{persona}', [PersonaController::class, 'update'])->name('personas.update');
Route::delete('/personas/{persona}', [PersonaController::class, 'destroy'])->name('personas.destroy');

// Rutas para Estudiante
Route::resource('estudiantes', EstudianteController::class);

// Rutas para Docente
Route::resource('docentes', DocenteController::class);
