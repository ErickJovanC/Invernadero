<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroPropiedadController;
use App\Http\Controllers\RegistroPersonalController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('registroPropiedad', RegistroPropiedadController::class);
Route::resource('registroPersonal', RegistroPersonalController::class);

Route::view('/main', '/main/index')->name('main');
Route::view('/preparacionSuelo/', '/preparacionSuelo/index')->name('suelo');    
Route::view('/calidadPlanta/', '/calidadPlanta/index')->name('calidad');    
Route::view('/controlPreventivo/', 'controlPreventivo/index')->name('prevencion');    