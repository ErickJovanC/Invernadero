<?php

namespace App\Http\Controllers;

use App\Models\Estados;
use App\Models\Municipios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnrutadorController extends Controller
{
    public function index(){

        $user = Auth::user();
        
        if($user->nivelRegistro == 1){
            $estados = Estados::all(['id', 'estado']);
            $municipios = Municipios::all(['id', 'municipio']);
            // $ruta = redirect('/phuerta')->with(['estados' => $estados]);
            // $ruta = redirect(route('huerta.view', compact('estados')))/* ->with(['estados' => $estados]) */;
            $ruta = view('primerRegistro/huerta', compact('estados', 'municipios'));
        }
        elseif($user->nivelRegistro == 2){
            $huertas = Auth::user()->huertas;
            $secciones = Auth::user()->secciones;
            $ruta = view('primerRegistro/seccion', compact('huertas', 'secciones'));
        }
        elseif($user->nivelRegistro == 3){
            $empleados = Auth::user()->empleados;
            $mensaje = 'Registre al menos a un Empleado y despues presione "Finalizar Registro"';
            $ruta = view('primerRegistro/empleados', compact('empleados', 'mensaje'));
        }
        elseif($user->nivelRegistro == 4 || $user->nivelRegistro == 0){
            $ruta = redirect(route('registroCompleto'));
        }
        else{
            $ruta = view('main/index');
        }
        return $ruta;
    }
}
