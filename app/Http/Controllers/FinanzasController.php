<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cosecha;
use App\Models\CortePlanta;
use Illuminate\Http\Request;
use App\Models\CalidadPlanta;
use App\Models\RegistroRiego;
use App\Models\LimpiezaCanales;
use App\Models\RegistroSiembra;
use App\Models\PreparacionSuelo;
use App\Models\ControlPreventivo;
use App\Models\ActividadesCulturale;
use App\Models\AplicacionPlaguicida;
use App\Models\CapacitacionPersonal;
use Illuminate\Support\Facades\Auth;
use App\Models\AplicacionFertilizante;
use App\Models\ControlPreventivoPlaga;

class FinanzasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $fechaInicial = '2021-07-01';
        $fechaFinal = date('Y-m-d');
        if (!empty($request['fechaI'])) {
            $fechaInicial = $request['fechaI'];
        } 

        if (!empty($request['fechaF'])) {
            $fechaFinal = $request['fechaF'];
        }
        $id = Auth::user()->id;

        // if (!empty($_GET['user'])) {
        //     $id = $_GET['user'];
        // }

        $gastosDiversos = [];

        $gastos = Auth::user()->registroGastos;
        $fertilizantes = AplicacionFertilizante::where('user_id', $id)->whereBetween('fechaAplicacion', [$fechaInicial, $fechaFinal])->orderBy('fertilizante_id', 'ASC')->get();
        $plaguicidas = AplicacionPlaguicida::where('user_id', $id)->whereBetween('fecha', [$fechaInicial, $fechaFinal])->orderBy('plaguicida_id', 'ASC')->get();
        $actividadesCulturales = ActividadesCulturale::where('user_id', $id)->orderBy('actividad', 'ASC')->get();

        // Recepción de Planta
        $cont = 0;
        $recepcionPlanta = CalidadPlanta::where('user_id', $id)->get('costo');
        $costo = 0;
        $costoPracticasA = 0;
        foreach ($recepcionPlanta as $calidad) {
            $costo += $calidad->costo;
            $costoPracticasA += $calidad->costo;
        }
        if ($costo > 0) {
            $gastosDiversos[$cont] = array(
                'gasto' => 'Recepcion de planta',
                'costo' => $costo,
            );
            $cont++;
        }

        // Preparación de suelo
        $preparacion = PreparacionSuelo::where('user_id', $id)->get('costoOperacion');
        $costo = 0;
        foreach ($preparacion as $suelo) {
            $costo += $suelo->costoOperacion;
            $costoPracticasA += $suelo->costoOperacion;
        }
        if ($costo > 0) {
            $gastosDiversos[$cont] = array(
                'gasto' => 'Preparacion de Suelo',
                'costo' => $costo,
            );
            $cont++;
        }

        // Siembra
        $siembra = RegistroSiembra::where('user_id', $id)->get('costo');
        $costo = 0;
        foreach ($siembra as $suelo) {
            $costo += $suelo->costo;
            $costoPracticasA += $suelo->costo;
        }
        if ($costo > 0) {
            $gastosDiversos[$cont] = array(
                'gasto' => 'Siembra',
                'costo' => $costo,
            );
            $cont++;
        }

        // Cosecha
        $cosecha = Cosecha::where('user_id', $id)->get('costo');
        $costo = 0;
        foreach ($cosecha as $cosechaItem) {
            $costo += $cosechaItem->costo;
            $costoPracticasA += $cosechaItem->costo;
        }
        if ($costo > 0) {
            $gastosDiversos[$cont] = array(
                'gasto' => 'Cosecha',
                'costo' => $costo,
            );
            $cont++;
        }

        // Riego
        $riego = RegistroRiego::where('user_id', $id)->get('costo');
        $costo = 0;
        foreach ($riego as $riegoItem) {
            $costo += $riegoItem->costo;
            $costoPracticasA += $riegoItem->costo;
        }
        if ($costo > 0) {
            $gastosDiversos[$cont] = array(
                'gasto' => 'Riego',
                'costo' => $costo,
            );
            $cont++;
        }

        // controlPreventivo de lotes
        $controlPreventivo = ControlPreventivo::where('user_id', $id)->get('costo');
        $costo = 0;
        foreach ($controlPreventivo as $control) {
            $costo += $control->costo;
            $costoPracticasA += $control->costo;
        }
        if ($costo > 0) {
            $gastosDiversos[$cont] = array(
                'gasto' => 'Control Preventivo en Lote de Plantas',
                'costo' => $costo,
            );
            $cont++;
        }

        // controlPreventivo en plantas y arboles
        $controlPreventivoPlanta = ControlPreventivoPlaga::where('user_id', $id)->get('costo');
        $costo = 0;
        foreach ($controlPreventivo as $controlP) {
            $costo += $controlP->costo;
            $costoPracticasA += $controlP->costo;
        }
        if ($costo > 0) {
            $gastosDiversos[$cont] = array(
                'gasto' => 'Control Preventivo en Arboles',
                'costo' => $costo,
            );
            $cont++;
        }

        // Aplicación Plaguicida
        $AplicacionPlaguicida = AplicacionPlaguicida::where('user_id', $id)->get('costo');
        $costo = 0;
        foreach ($AplicacionPlaguicida as $plaguicida) {
            $costo += $plaguicida->costo;
            $costoPracticasA += $plaguicida->costo;
        }
        if ($costo > 0) {
            $gastosDiversos[$cont] = array(
                'gasto' => 'Gasto derivado por la aplicación de Plaguicidas',
                'costo' => $costo,
            );
            $cont++;
        }

        // Limpieza de Canales
        $LimpiezaCanales = LimpiezaCanales::where('user_id', $id)->get('costo');
        $costo = 0;
        foreach ($LimpiezaCanales as $canales) {
            $costo += $canales->costo;
            $costoPracticasA += $canales->costo;
        }
        if ($costo > 0) {
            $gastosDiversos[$cont] = array(
                'gasto' => 'Limpieza de Canales',
                'costo' => $costo,
            );
            $cont++;
        }

        // Control de Podas
        $CortePlanta = CortePlanta::where('user_id', $id)->get('costo');
        $costo = 0;
        foreach ($CortePlanta as $corte) {
            $costo += $corte->costo;
            $costoPracticasA += $corte->costo;
        }
        if ($costo > 0) {
            $gastosDiversos[$cont] = array(
                'gasto' => 'Podas',
                'costo' => $costo,
            );
            $cont++;
        }

        // Capacitación de personal
        $CapacitacionPersonal = CapacitacionPersonal::where('user_id', $id)->get('costo');
        $costo = 0;
        foreach ($CapacitacionPersonal as $capacitacion) {
            $costo += $capacitacion->costo;
            $costoPracticasA += $capacitacion->costo;
        }
        if ($costo > 0) {
            $gastosDiversos[$cont] = array(
                'gasto' => 'Capacitación de personal',
                'costo' => $costo,
            );
            $cont++;
        }

        $cosechas = Cosecha::where('user_id', $id)/* ->orderBy('fertilizante_id', 'ASC') */->get();
        $kilos = 0;
        $precio = 0;
        $precioTonelada = 0;
        foreach ($cosechas as $cosecha) {
            $kilos += $cosecha->kilos;
            $precio += $cosecha->precioVenta;
        }
        $toneladas = round($kilos / 1000, 2);
        if($toneladas != 0) {
            $precioTonelada = round($precio / $toneladas, 2);
        }
        $precio = round($precio, 2);
        $cosechas = [$toneladas, $precioTonelada, $precio];

        $user = User::where('id', $id)->first();
        // dd($user);

        return view('srhigo.reporteFinanciero', compact('gastos', 'fertilizantes', 'plaguicidas', 'actividadesCulturales', 'gastosDiversos', 'costoPracticasA', 'cosechas', 'user'));
    }
}
