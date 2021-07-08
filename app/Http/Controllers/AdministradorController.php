<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cosecha;
use Illuminate\Http\Request;
use App\Models\CalidadPlanta;
use App\Models\RegistroRiego;
use App\Models\RegistroSiembra;
use App\Models\PreparacionSuelo;
use App\Models\ControlPreventivo;
use App\Models\AplicacionFertilizante;
use App\Models\AplicacionFertilizanteOrganico;

class AdministradorController extends Controller
{
    public function __construct()
    {
        $this->middleware('EsAdmin');
    }

    public function index(){
        $usuarios = User::all();
        return view('admin.admin', compact('usuarios'));
    }

    public function verActividades($id){
        $usuarios = User::where("id", $id)->get();
        foreach($usuarios as $usuarioItem){
            $usuario = $usuarioItem->nombre .' '. $usuarioItem->apellidoP;
        }

        $calidadPlanta = CalidadPlanta::where("user_id", $id)->get();
        $preparacionSuelo = PreparacionSuelo::where("user_id", $id)->get();
        $registroSiembra = RegistroSiembra::where("user_id", $id)->get();
        $registroCosecha = Cosecha::where("user_id", $id)->get();

        $aplicacionFertilizante = AplicacionFertilizante::where("user_id", $id)->get();
        $aplicacionFertilizanteOrganico = AplicacionFertilizanteOrganico::where("user_id", $id)->get();
        $registroRiego = RegistroRiego::where("user_id", $id)->get();

        $controlPreventivo = ControlPreventivo::where("user_id", $id)->get();
        
        return view('admin.actividadUsuarios', compact('usuario', 'calidadPlanta', 'preparacionSuelo', 'registroSiembra', 'registroCosecha', 'aplicacionFertilizante', 'aplicacionFertilizanteOrganico', 'registroRiego', 'controlPreventivo'));
    }
}
