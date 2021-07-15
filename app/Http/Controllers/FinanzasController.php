<?php

namespace App\Http\Controllers;

use App\Models\AplicacionFertilizante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinanzasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gastos = Auth::user()->registroGastos;
        $id = Auth::user()->id;
        // $fertilizantes = Auth::user()->aplicacionFertilizante;
        $fertilizantes = AplicacionFertilizante::where('user_id', $id )->orderBy('fertilizante_id', 'ASC')->get();
        // foreach($fertilizantes as $fertilizante){
        //     dump($fertilizante->fertilizante_id);
        // }
        // dd('id: '. $id);
        return view('srhigo.reporteFinanciero', compact('gastos', 'fertilizantes'));
    }
}