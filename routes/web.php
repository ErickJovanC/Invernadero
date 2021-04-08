<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeccionController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\CalidadPlantaController;
use App\Http\Controllers\RegistroSiembraController;
use App\Http\Controllers\PreparacionSueloController;
use App\Http\Controllers\RegistroPersonalController;
use App\Http\Controllers\CalibracionEquipoController;
use App\Http\Controllers\ControlPreventivoController;
use App\Http\Controllers\RegistroPropiedadController;
use App\Http\Controllers\AplicacionFertilizanteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
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
Route::resource('calidadPlanta', CalidadPlantaController::class);
Route::resource('controlPreventivo', ControlPreventivoController::class);
Route::resource('registroSiembra', RegistroSiembraController::class);
Route::resource('aplicacionFertilizante', AplicacionFertilizanteController::class);
Route::resource('calibracionEquipo', CalibracionEquipoController::class);

Route::view('/main', '/main/index')->name('main')->middleware('auth');

Route::view('/aplicacionFertilizanteOrganico/', 'aplicacionFertilizanteOrganico/index')->name('fertilizanteOrganico');
Route::view('/registroRiego/', 'registroRiego/index')->name('registroRiego');
Route::view('/limpiezaCanales/', 'limpiezaCanales/index')->name('limpiezaCanales');
// Route::view('/historial/', 'srhigo/historialActividades')->name('historial');