<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeccionController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\CalidadPlantaController;
use App\Http\Controllers\RegistroRiegoController;
use App\Http\Controllers\LimpiezaCanalesController;
use App\Http\Controllers\RegistroSiembraController;
use App\Http\Controllers\PreparacionSueloController;
use App\Http\Controllers\RegistroPersonalController;
use App\Http\Controllers\CalibracionEquipoController;
use App\Http\Controllers\ControlPreventivoController;
use App\Http\Controllers\RegistroPropiedadController;
use App\Http\Controllers\AplicacionFertilizanteController;
use App\Http\Controllers\ControlPreventivoPlagaController;
use App\Http\Controllers\AplicacionFertilizanteOrganicoController;

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
Route::resource('aplicacionFertilizanteOrganico', AplicacionFertilizanteOrganicoController::class);
Route::resource('registroRiego', RegistroRiegoController::class);
Route::resource('limpiezaCanales', LimpiezaCanalesController::class);
Route::resource('plagas', ControlPreventivoPlagaController::class);

Route::view('/main', '/main/index')->name('main')->middleware('auth');

// Route::view('/historial/', 'srhigo/historialActividades')->name('historial');