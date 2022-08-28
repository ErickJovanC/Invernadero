@extends('layouts.app')
@section('content')
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
<div class="row">
    <h1 class="titulos mb-5 col-12 text-center">Reporte Financiero</h1>
    {{-- <div class="alert alert-warning text-center col-12">Aun falta poder seleccionar el rango de fechas</div> --}}

    <form action="{{ route('finanzas.index') }}" method="get" class="col-12">
        @csrf
        <div class="row align-items-end">
            {{-- Fecha Inicial --}}
            <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 mb-5">
                <label for="fechaI">Fecha Inicial</label>
                <input type="date" 
                    name="fechaI" 
                    id="fechaI"
                    {{-- max="{{ $fechaIActual }}" --}}
                    value="{{ isset($_GET['fechaI']) ? $_GET['fechaI'] : '' }}"
                    class="form-control 
                        @error('fechaI') is-invalid @enderror" 
                />
                @error('fechaI')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin Fecha Inicial --}}

            {{-- Fecha Final --}}
            <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 mb-5">
                <label for="fechaF">Fecha Final</label>
                <input type="date" 
                    name="fechaF" 
                    id="fechaF"
                    {{-- max="{{ $fechaFActual }}" --}}
                    value="{{ isset($_GET['fechaF']) ? $_GET['fechaF'] : '' }}"
                    class="form-control 
                        @error('fechaF') is-invalid @enderror" 
                />
                @error('fechaF')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin Fecha Final --}}

            <div class="form-group pb-4">
                <input type="submit" value="Consultar Reporte" class="btn btn-primary px-5">
            </div>
        </div>
    </form>

    <div class="col-12">
        <table class="table mb-5 table-responsive-md table-sm">
            <thead class="thead-dark">
                <tr class="table-active">
                    <td scope="row" class="text-right">Productor:</td>
                    <td colspan="5"><b>{{ $user->nombre }}</b></td>
                    {{-- <td></td> --}}
                    {{-- <td scope="row" class="text-right">Mes:</td> --}}
                    {{-- <td><b>Junio</b></td> --}}
                    {{-- <td scope="row" class="text-right">Año:</td> --}}
                    {{-- <td><b>2021</b></td> --}}
                </tr>
                <tr class="text-center">
                    <th scope="col">Concepto</th>
                    <th scope="col">No. de Aplicaciones </th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Unidad</th>
                    <th scope="col">Costo Unitario (Promedio)</th>
                    <th scope="col">Costo Total</th>
                    {{-- <th scope="col">Fecha</th> --}}
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row" colspan="6">Fertilización</th>
                    <th></th>
                </tr>
                {{-- Sección de Fertilización  --}}
                @foreach ($fertilizers as $fertilizer)
                    <tr>
                        <td>{{ $fertilizer['name'] }}</td>
                        <td class="text-center">{{ $fertilizer['count'] }}</td>
                        <td class="text-center">{{ $fertilizer['units'] }}</td>
                        <td class="text-center">KG/LT</td>
                        <td class="text-center">{{ $fertilizer['averagePrice'] }}</td>
                        <td class="text-center">{{ $fertilizer['totalPrice'] }}</td>
                    </tr>
                @endforeach
                {{-- Fin sección Fertilización --}}

                {{-- Sección de Plaguicida  --}}
                <tr>
                    <th scope="row">Plaguicidas</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    {{-- <th>0</th> --}}
                </tr>
            @php 
                $cont = 1;
                $id[0] = 0;
                $totalPlaguicida = 0;
            @endphp
            @foreach ($plaguicidas as $plaguicida)
                @php 
                    $id[$cont] = $plaguicida->plaguicida_id;
                    if ($id[$cont] != $id[$cont-1] ){
                        $nombre[$cont] = $plaguicida->plaguicida->nombreComercial;
                        $unidades[$cont] = $plaguicida->dosisAplicada;
                        $unidadesTotales[$cont] = $unidades[$cont];
                        $precio[$cont] = $plaguicida->costo;
                        $total[$cont] = $unidades[$cont] * $precio[$cont];
                        $totalAcumulado[$cont] = $unidades[$cont] * $precio[$cont];
                        $repeticion[$cont] = 1;
                    }
                    else{
                        $cont--;
                        $unidades[$cont] = $plaguicida->unidades;
                        $unidadesTotales[$cont] += $unidades[$cont];
                        $precio[$cont] = $plaguicida->precio;
                        $total[$cont] = $unidades[$cont] * $precio[$cont];
                        $totalAcumulado[$cont] += $unidades[$cont] * $precio[$cont];
                        $repeticion[$cont]++;
                    }

                    $promedio[$cont] = round($totalAcumulado[$cont] / $unidadesTotales[$cont], 2);
                    $cont++;
                @endphp
            @endforeach
                
            @for($x=1 ; $x<=$cont-1 ; $x++)
                @php $totalPlaguicida += $totalAcumulado[$x]; @endphp
                <tr>
                    <td>{{ $nombre[$x] }}</td>
                    <td class="text-center">{{ $repeticion[$x] }}</td>
                    <td>{{ $unidadesTotales[$x] }}</td>
                    <td>KG/LT</td>
                    <td>{{ $promedio[$x] }}</td>
                    <td>{{ $totalAcumulado[$x] }}</td>
                    {{-- <td></td> --}}
                </tr>
            @endfor

            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="text-right">Total:</td>
                <th>${{ $totalPlaguicida }}</th>
            </tr>
            {{-- Fin sección Plaguicida --}}

            <tr>
                <th scope="row">Labores Culturales</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                {{-- <th>0.00</th> --}}
            </tr>
            {{-- Actividades Culturales --}}

                @php 
                    $cont = 1;
                    $activity[0] = 'Vacio';
                    $totalLabores = 0;
                @endphp
                @foreach($actividadesCulturales as $actividadC)
                @php 
                    $activity[$cont] = $actividadC->actividad;
                    if ( strcmp($activity[$cont], $activity[$cont-1])!==0 ){
                        $nombre[$cont] = $actividadC->actividad;
                        $costo[$cont] = $actividadC->costo;
                        $totalLabores += $actividadC->costo;
                        $unidades[$cont] = 1;
                        
                    }
                    else {
                        $cont--;
                        $costo[$cont] += $actividadC->costo;
                        $totalLabores += $actividadC->costo;
                        $unidades[$cont]++;
                    }
                    $cont++;
                    @endphp
                @endforeach

                @for($x=1 ; $x<=$cont-1 ; $x++)
                <tr>
                    <td>{{ $nombre[$x] }}</td>
                    <td class="text-center">{{ $unidades[$x] }}</td>
                    <td></td>
                    <td>Sección</td>
                    <td></td>
                    <td>{{ $costo[$x] }}</td>
                    {{-- <td></td> --}}
                </tr>
                @endfor
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="text-right">Total:</td>
                    <th>{{ $totalLabores }}</th>
                </tr>
                {{-- Fin Actividades Culturales --}}

                {{-- Practicas Agricolas --}}
                <tr>
                    <th scope="row">Practicas Agricolas</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    {{-- <td></td> --}}
                </tr>
                @php $totalPracticasA =0; @endphp
                @foreach($gastosDiversos as $gasto)
                <tr>
                    <td>{{ $gasto['gasto'] }}</td>
                    <td></td> 
                    <td></td>
                    <td></td>
                    <td></td>
                    @php $totalPracticasA += $gasto['costo']; @endphp
                    <td>{{ $gasto['costo'] }}</td>
                </tr>
                @endforeach

                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="text-right">Total:</td>
                    <th>{{ $totalPracticasA }}</th>
                    {{-- <td></td> --}}
                </tr>

                {{-- Otros Gastos --}}
                <tr>
                    <th scope="row">Otros Gastos</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    {{-- <td></td> --}}
                </tr>
                @php $totalGastos = 0; @endphp
                @foreach ($gastos as $gasto)
                    <tr>
                        <td>{{ $gasto->concepto->concepto }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>{{ $gasto->costo }}</td>
                        @php $totalGastos += $gasto->costo; @endphp
                    </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="text-right">Total:</td>
                    <th>{{ $totalGastos }}</th>
                    {{-- <td></td> --}}
                </tr>

                <tr>
                    <th>Costo Total</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    @php $totalEgresos = /* $totalFertilizante+ */$totalPlaguicida+$totalLabores+$totalPracticasA+$totalGastos; @endphp
                    <th>${{ $totalEgresos }}</th>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- Tabla de Rentabilidad --}}
    <div class="col-12 col-md-6 mt-5">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="row" colspan="2">Analisis de Rentabilidad</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row">Rendimiento (Toneladas)</td>
                    <td>{{ $cosechas[0]}}</td> 
                </tr>
                <tr>
                    <td scope="row">Precio por Tonelada</td>
                    <td>{{ $cosechas[1] }}</td>
                </tr>
                <tr>
                    <td scope="row">Costo por Tonelada</td>
                    @php 
                        if($cosechas[0] == 0){
                            $cosechas[0] = 1;
                        }
                        $costoTonelada = round( $totalEgresos / $cosechas[0], 2 );
                    @endphp
                    <td>{{ $costoTonelada }}</td>
                </tr>
                <tr>
                    <td>Total Ingresos</td>
                    <td>{{ $cosechas[2] }}</td>
                </tr>
                <tr>
                    <td>Total Gastos</td>
                    <td>{{ $totalEgresos }}</td>
                </tr>
                <tr>
                    <td scope="row">Utilidad</td>
                    @php $utilidad = $cosechas[2] - $totalEgresos; @endphp
                    <td>{{ $utilidad }}</td>
                </tr>
                <tr>
                    <td scope="row">Benefio / Costo</td>
                    @php 
                        if( $totalEgresos == 0  ){
                            $totalEgresos = 1;
                        }
                        $beneficio = round( 100/$totalEgresos * $utilidad, 2 ); 
                    @endphp
                    <td>{{ $beneficio }}%</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection