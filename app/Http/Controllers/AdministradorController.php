<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cosecha;
use App\Models\Seccion;
use App\Models\CortePlanta;
use Illuminate\Http\Request;
use App\Models\CalidadPlanta;
use App\Models\RegistroRiego;
use App\Models\LimpiezaCanales;
use App\Models\RegistroSiembra;
use App\Models\PreparacionSuelo;
use App\Models\CalibracionEquipo;
use App\Models\ControlPreventivo;
use App\Models\RegistroPropiedad;
use App\Models\AplicacionPlaguicida;
use App\Models\CapacitacionPersonal;
use App\Models\IdentificacionPlagas;
use App\Models\AplicacionFertilizante;
use App\Models\ControlPreventivoPlaga;
use App\Models\AplicacionFertilizanteOrganico;

class AdministradorController extends Controller
{
    public function __construct()
    {
        $this->middleware('EsAdmin');
    }

    public function index(){
        // $usuarios = User::where('nivelRegistro', '=', 5);
        $usuarios = User::all();
        $usuariosActivar = User::where('nivelRegistro', 4);
        // dd($usuarios->all());
        return view('admin.admin', compact('usuarios', 'usuariosActivar'));
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
        $fertilizanteOrganico = AplicacionFertilizanteOrganico::where("user_id", $id)->get();
        $registroRiego = RegistroRiego::where("user_id", $id)->get();

        $controlPreventivoPlanta = ControlPreventivo::where("user_id", $id)->get();
        $controlPreventivoArbol = ControlPreventivoPlaga::where("user_id", $id)->get();
        $identificacionPlagas = IdentificacionPlagas::where("user_id", $id)->get();
        $aplicacionPlaguicida = AplicacionPlaguicida::where("user_id", $id)->get();

        $calibracionEquipo = CalibracionEquipo::where("user_id", $id)->get();
        $limpiezaCanales = LimpiezaCanales::where("user_id", $id)->get();
        $cortePlantas = CortePlanta::where("user_id", $id)->get();
        $capacitacionPersonal = CapacitacionPersonal::where("user_id", $id)->get();
        
        return view('admin.actividadUsuarios', compact('usuario', 'calidadPlanta', 'preparacionSuelo', 'registroSiembra', 'registroCosecha', 'aplicacionFertilizante', 'fertilizanteOrganico', 'registroRiego', 'controlPreventivoPlanta', 'controlPreventivoArbol', 'identificacionPlagas', 'aplicacionPlaguicida', 'calibracionEquipo', 'limpiezaCanales', 'cortePlantas', 'capacitacionPersonal'));
    }

    public function verRegistro($id){
        $usuario = User::where('id', $id)->first();
        $huerta = RegistroPropiedad::where('user_id', $id)->first();

        return view('admin.verRegistro', compact('usuario', 'huerta'));
    }

    public function activarUsuario($id){
        User::where('id', $id)->update([
            'nivelRegistro' => 5,
        ]);

        return redirect(route('admin.index'));
    }

    public function rechazarUsuario($id){
        User::where('id', $id)->update([
            'nivelRegistro' => 0,
        ]);

        return redirect(route('admin.index'));
    }
}
