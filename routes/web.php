<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeccionController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\PreparacionSueloController;
use App\Http\Controllers\RegistroPersonalController;
use App\Http\Controllers\RegistroPropiedadController;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('registroPersonal', RegistroPersonalController::class);
Route::resource('registroPropiedad', RegistroPropiedadController::class);
Route::resource('seccion', SeccionController::class);
Route::resource('empleado', EmpleadoController::class);
Route::resource('preparacionSuelo', PreparacionSueloController::class);
Route::resource('historial', HistorialController::class);

Route::view('/main', '/main/index')->name('main')->middleware('auth');
     
Route::view('/calidadPlanta/', '/calidadPlanta/index')->name('calidad');    
Route::view('/controlPreventivo/', 'controlPreventivo/index')->name('prevencion');    
Route::view('/registroSiembra/', 'registroSiembra/index')->name('siembra');
Route::view('/aplicacionFertilizante/', 'aplicacionFertilizante/index')->name('fertilizante');
Route::view('/calibracionEquipo/', 'calibracionEquipo/index')->name('calibracion');
Route::view('/aplicacionFertilizanteOrganico/', 'aplicacionFertilizanteOrganico/index')->name('fertilizanteOrganico');
Route::view('/registroRiego/', 'registroRiego/index')->name('registroRiego');
Route::view('/limpiezaCanales/', 'limpiezaCanales/index')->name('limpiezaCanales');
// Route::view('/historial/', 'srhigo/historialActividades')->name('historial');