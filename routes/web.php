<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CosechaController;
use App\Http\Controllers\SeccionController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\FertilizanteController;
use App\Http\Controllers\CalidadPlantaController;
use App\Http\Controllers\RegistroRiegoController;
use App\Http\Controllers\LimpiezaCanalesController;
use App\Http\Controllers\RegistroSiembraController;
use App\Http\Controllers\PreparacionSueloController;
use App\Http\Controllers\RegistroPersonalController;
use App\Http\Controllers\CalibracionEquipoController;
use App\Http\Controllers\ControlPreventivoController;
use App\Http\Controllers\RegistroPropiedadController;
use App\Http\Controllers\AplicacionPlaguicidaController;
use App\Http\Controllers\CapacitacionPersonalController;
use App\Http\Controllers\IdentificacionPlagasController;
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
    return redirect(route('main'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('registroPersonal', RegistroPersonalController::class);
Route::resource('registroPropiedad', RegistroPropiedadController::class);
Route::resource('seccion', SeccionController::class)->middleware('auth');
Route::resource('empleado', EmpleadoController::class)->middleware('auth');
Route::resource('preparacionSuelo', PreparacionSueloController::class)->middleware('auth');
Route::resource('historial', HistorialController::class)->middleware('auth');
Route::resource('calidadPlanta', CalidadPlantaController::class)->middleware('auth');
Route::resource('controlPreventivo', ControlPreventivoController::class)->middleware('auth');
Route::resource('registroSiembra', RegistroSiembraController::class)->middleware('auth');
Route::resource('fertilizante', FertilizanteController::class)->middleware('auth');
Route::resource('aplicacionFertilizante', AplicacionFertilizanteController::class)->middleware('auth');
Route::resource('calibracionEquipo', CalibracionEquipoController::class)->middleware('auth');
Route::resource('aplicacionFertilizanteOrganico', AplicacionFertilizanteOrganicoController::class)->middleware('auth');
Route::resource('registroRiego', RegistroRiegoController::class)->middleware('auth');
Route::resource('limpiezaCanales', LimpiezaCanalesController::class)->middleware('auth');
Route::resource('plagas', ControlPreventivoPlagaController::class)->middleware('auth');
Route::resource('identificacionPlagas', IdentificacionPlagasController::class)->middleware('auth');
Route::resource('aplicacionPlaguicida', AplicacionPlaguicidaController::class)->middleware('auth');
Route::resource('capacitacionPersonal', CapacitacionPersonalController::class)->middleware('auth');
Route::resource('cosecha', CosechaController::class)->middleware('auth');
Route::resource('cliente', ClienteController::class)->middleware('auth');

Route::get('/srhigo/sinActivar', function() {
    return view('srhigo.sinActivar');
});

Route::view('main', '/main/index')->name('main')->middleware('auth');