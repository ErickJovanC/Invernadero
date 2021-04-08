@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-2">
            <a href="{{ route('registroPersonal.index') }}"
                class="btn btn-success">
                1- Registro Personal
            </a>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-2">
            <a href="{{ route('registroPropiedad.create') }}"
                class="btn btn-success">
                2- Registrar Huerta
            </a>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-2">
            <a href="{{ route('seccion.create') }}"
                class="btn btn-success">
                3- Registrar Sección
            </a>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-2">
            <a href="{{ route('empleado.create') }}"
                class="btn btn-success">
                4- Registrar Empleado
            </a>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-2">
            <a href="{{ route('preparacionSuelo.create') }}"
                class="btn btn-success">
                5- Pepración de suelo
            </a>
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-2">
            <a href="{{ route('calidadPlanta.create') }}"
                class="btn btn-success">
                6- Calidad de la Planta
            </a>
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-2">
            <a href="{{ route('controlPreventivo.create') }}"
                class="btn btn-success">
                7- Control preventivo de plagas
            </a>
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-2">
            <a href="{{ route('registroSiembra.create') }}"
                class="btn btn-success">
                8- Registro de siembra
            </a>
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-2">
            <a href="{{ route('aplicacionFertilizante.create') }}"
                class="btn btn-success">
                9- Aplicación de Fertilizante
            </a>
        </div>
    
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-2">
            <a href="{{ route('calibracionEquipo.create') }}"
                class="btn btn-success">
                10- Calibración de Equipo de Aplicación
            </a>
        </div>

        {{-- 
        <a href="aplicacionFertilizanteOrganico/" class="btn btn-success">Aplicación de Fertilizante Organico</a>
        <a href="registroRiego/" class="btn btn-success">Registro Riego</a>
        <a href="limpiezaCanales/" class="btn btn-success">Limpieza de Canales</a> --}}
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-2">
            <a href="{{ route('historial.index') }}"
                class="btn btn-success">
                Historial de Actividades
            </a>
        </div>
    </div>
@endsection