@extends('layouts.app')
@section('content')
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
<div class="row">
    <h1 class="titulos mb-5 col-12 text-center">Reporte Financiero</h1>
    <div class="col-12">
        <table class="table mb-5 table-responsive-md table-sm">
            <thead class="thead-dark">
                <tr class="table-active">
                    <td scope="row">Productor:</td>
                    <td><b>Gustavo Hernandez Ruiz</b></td>
                    <td></td>
                    <td scope="row">Mes:</td>
                    <td><b>Junio</b></td>
                    <td scope="row">Año:</td>
                    <td><b>2021</b></td>
                </tr>
                <tr>
                    <th scope="col">Concepto</th>
                    <th scope="col">Unidades</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Unidad</th>
                    <th scope="col">Costo Unitario</th>
                    <th scope="col">Costo Total</th>
                    <th scope="col">Fecha</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Preparación de Terreno</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <th>0.00</th>
                </tr>
                <tr>
                    <td>Barrecho</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Nivelación</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">Fertilización</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <th>47,040</th>
                </tr>
                <tr>
                    <td>Fosfato diamónico 18-46</td>
                    <td>1</td>
                    <td>250</td>
                    <td>KG</td>
                    <td>10.40</td>
                    <td>2600</td>
                    <td>2021-06-31</td>
                </tr>
                <tr>
                    <td>Sulfato de amonio</td>
                    <td>1</td>
                    <td>250</td>
                    <td>KG</td>
                    <td>10.40</td>
                    <td>2600</td>
                    <td>2021-06-31</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">Labores Culturales</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <th>29,700</th>
                </tr>
                <tr>
                    <td>Pinchado para crecimiento</td>
                    <td>1</td>
                    <td>1</td>
                    <td>HA</td>
                    <td>2500</td>
                    <td>2500</td>
                    <td>2021-06-31</td>
                </tr>
                <tr>
                    <td>Eliminacion de llemas axilares</td>
                    <td>1</td>
                    <td>1</td>
                    <td>HA</td>
                    <td>2500</td>
                    <td>2500</td>
                    <td>2021-06-31</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">Riegos</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <th>6,000</th>
                </tr>
                <tr>
                    <td>Riego Lijero</td>
                    <td>1</td>
                    <td>4</td>
                    <td>JOR</td>
                    <td>500</td>
                    <td>2000</td>
                    <td>2021-06-28</td>
                </tr>
                <tr>
                    <td>Riego Lijero</td>
                    <td>1</td>
                    <td>4</td>
                    <td>JOR</td>
                    <td>500</td>
                    <td>2000</td>
                    <td>2021-06-28</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">Control de Plagas y Maleza</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <th>1,863</th>
                </tr>
                <tr>
                    <td>Hidroxido Cuprico</td>
                    <td>1</td>
                    <td>1</td>
                    <td>HA</td>
                    <td>2500</td>
                    <td>2500</td>
                    <td>2021-06-31</td>
                </tr>
                <tr>
                    <td>Carbendazim</td>
                    <td>1</td>
                    <td>1</td>
                    <td>HA</td>
                    <td>2500</td>
                    <td>2500</td>
                    <td>2021-06-31</td>
                </tr>
                <tr>
                    <th scope="row">Cosecha</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <th>1,863</th>
                </tr>
                <tr>
                    <td>Hidroxido Cuprico</td>
                    <td>1</td>
                    <td>1</td>
                    <td>HA</td>
                    <td>2500</td>
                    <td>2500</td>
                    <td>2021-06-31</td>
                </tr>
                <tr>
                    <td>Carbendazim</td>
                    <td>1</td>
                    <td>1</td>
                    <td>HA</td>
                    <td>2500</td>
                    <td>2500</td>
                    <td>2021-06-31</td>
                </tr>
                <tr>
                    <th scope="row">Diversos</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <th></th>
                </tr>
                @foreach ($gastos as $gasto)
                    <tr>        
                        <td>{{ $gasto->concepto->concepto }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>{{ $gasto->costo }}</td>
                    </tr>
                @endforeach
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
                    <td scope="row">Rendimiento</td>
                    <td>6.00</td> 
                </tr>
                <tr>
                    <td scope="row">Precio por Tonelada</td>
                    <td>50,000</td>
                </tr>
                <tr>
                    <th scope="row" colspan="2">Total Ingresos</th>
                </tr>
                <tr>
                    <td scope="row">Utilidad</td>
                    <td>188,407</td>
                </tr>
                <tr>
                    <td scope="row">Benefio / Costo</td>
                    <td>169%</td>
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
                    <td scope="row">Rendimiento</td>
                    <td>6.00</td>
                </tr>
                <tr>
                    <td scope="row">Precio por Tonelada</td>
                    <td>50,000</td>
                </tr>
                <tr>
                    <th scope="row" colspan="2">Total Ingresos</th>
                </tr>
                <tr>
                    <td scope="row">Utilidad</td>
                    <td>188,407</td>
                </tr>
                <tr>
                    <td scope="row">Benefio / Costo</td>
                    <td>169%</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection