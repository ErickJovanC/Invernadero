@extends('layouts.app')
@section('content')
    <a href="{{ route('registroPersonal.index') }}" 
        class="btn btn-success">
        Registro Personal
    </a>

    <a href="{{ route('registroPropiedad.create') }}" 
        class="btn btn-success">
        Registrar Huerta
    </a>

    <a href="{{ route('seccion.create') }}" 
        class="btn btn-success">
        Registrar Sección
    </a>

    <a href="{{ route('empleado.create') }}" 
        class="btn btn-success">
        Registrar Empleado
    </a>

    <a href="preparacionSuelo/" class="btn btn-success">Preparación del suelo</a>
    <a href="calidadPlanta/" class="btn btn-success">Calidad Planta</a>
    <a href="controlPreventivo/" class="btn btn-success">Control Preventivo</a>
    <a href="registroSiembra/" class="btn btn-success">Registro Siembra</a>
    <a href="aplicacionFertilizante/" class="btn btn-success">Aplicación de Fertilizante</a>
    <a href="calibracionEquipo/" class="btn btn-success">Calibración de equipo de aplicación</a>
    <a href="aplicacionFertilizanteOrganico/" class="btn btn-success">Aplicación de Fertilizante Organico</a>
    <a href="registroRiego/" class="btn btn-success">Registro Riego</a>
    <a href="limpiezaCanales/" class="btn btn-success">Limpieza de Canales</a>
@endsection