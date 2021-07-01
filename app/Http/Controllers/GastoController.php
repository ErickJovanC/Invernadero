<?php

namespace App\Http\Controllers;

use App\Models\Gasto;
use Illuminate\Http\Request;
use App\Models\ConceptoGasto;
use Illuminate\Support\Facades\Auth;

class GastoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fechaActual = date('Y-m-d');
        $conceptos = ConceptoGasto::all();
        return view('srhigo.registroGastos')
            ->with([
                'fechaActual' => $fechaActual,
                'conceptos' => $conceptos,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Request()->validate([
            'fecha' => 'required',
            'concepto' => 'required',
            'costo' =>'required | integer',
        ]);

        Auth::user()->registroGastos()->create([
            'fecha' => $data['fecha'],
            'concepto_id' => $data['concepto'],
            'costo' => $data['costo'],
            'comentario' => $request['comentario'],
        ]);

        // Obtención del concepto de gasto
        // $conceptoId = (int)$data['concepto'];
        // $conceptos = ConceptoGasto::where("id", $conceptoId)->get();
        // foreach ($conceptos as $conceptoItem){
            //     $concepto = $conceptoItem->concepto;
            // }
            
        // Obtención del concepto de gasto
        $conceptoId = (int)$data['concepto'];
        $conceptos = ConceptoGasto::all();
        foreach ($conceptos as $conceptoItem){
            if($conceptoItem->id == $conceptoId){
                $concepto = $conceptoItem->concepto;
                continue;
            }
        }
        
        $fechaActual = date('Y-m-d');
        return redirect('gasto/create')
            ->with([
                'mensaje' => 'El Gasto por concepto de <b>'. $concepto .'</b>, se ha registrado correctamente.<br>Si desea puede registrar otro gasto.',
                'fechaActual' => $fechaActual,
                'conceptos' => $conceptos,
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function show(Gasto $gasto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function edit(Gasto $gasto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gasto $gasto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gasto $gasto)
    {
        //
    }
}
