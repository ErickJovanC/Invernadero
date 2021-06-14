@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            @isset($mesanje){
                {{ $mensaje }}
            }
            @endisset
        </div>
        <h1 class="col-12">Registros Varios</h1>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-2">
            <a href="{{ route('registroPersonal.index') }}"
                class="btn btn-success btn-menu">
                Registro Personal
            </a>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-2">
            <a href="{{ route('registroPropiedad.create') }}"
                class="btn btn-success btn-menu">
                Registrar Huerta
            </a>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-2">
            <a href="{{ route('seccion.create') }}"
                class="btn btn-success btn-menu">
                Registrar Sección
            </a>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-2">
            <a href="{{ route('empleado.create') }}"
                class="btn btn-success btn-menu">
                Registrar Empleado
            </a>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-2">
            <a href="{{ route('cliente.create') }}"
                class="btn btn-success btn-menu">
                Clientes (Destinatarios)
            </a>
        </div>

        <h1 class="col-12 mt-5">Preparación, Siembra y Cosecha</h1>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-2">
            <a href="{{ route('calidadPlanta.create') }}"
                class="btn btn-primary btn-menu">
                Recepción de Plantas
            </a>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-2">
            <a href="{{ route('preparacionSuelo.create') }}"
                class="btn btn-primary btn-menu">
                Pepración de suelo
            </a>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-2">
            <a href="{{ route('registroSiembra.create') }}"
                class="btn btn-primary btn-menu">
                Registro de Siembra
            </a>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-2">
            <a href="{{ route('cosecha.create') }}"
                class="btn btn-primary btn-menu">
                Registro de Cosecha
            </a>
        </div>

        <h1 class="col-12 mt-5">Fertilización y Riego</h1>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-2">
            <a href="{{ route('fertilizante.create') }}"
                class="btn btn-warning btn-menu">
                Agregar Fertilizante
            </a>
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-2">
            <a href="{{ route('aplicacionFertilizante.create') }}"
                class="btn btn-warning btn-menu">
                Aplicación de Fertilizante
            </a>
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-2">
            <a href="{{ route('aplicacionFertilizanteOrganico.create') }}"
                class="btn btn-warning btn-menu">
                Aplicación de Fertilizante Organico
            </a>
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-2">
            <a href="{{ route('registroRiego.create') }}"
                class="btn btn-warning btn-menu">
                Registro de Riego
            </a>
        </div>

        <h1 class="col-12 mt-5">Plagas y Enfermedades</h1>

        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-2">
            <a href="{{ route('controlPreventivo.create') }}"
                class="btn btn-danger">
                Control preventivo de plagas en la planta (Previo a plantar)
            </a>
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-2">
            <a href="{{ route('plagas.create') }}"
                class="btn btn-danger">
                Control Preventivo de Plagas en plantas y arboles
            </a>
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-2">
            <a href="{{ route('identificacionPlagas.create') }}"
                class="btn btn-danger btn-menu">
                Identificacion de Plagas
            </a>
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-2">
            <a href="{{ route('aplicacionPlaguicida.create') }}"
                class="btn btn-danger btn-menu">
                Aplicación de Plaguicida
            </a>
        </div>

        <h1 class="col-12 mt-5">Mantenimiento y Capacitación</h1>

        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-2">
            <a href="{{ route('calibracionEquipo.create') }}"
                class="btn btn-secondary btn-menu">
                Calibración de Equipo de Aplicación
            </a>
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-2">
            <a href="{{ route('limpiezaCanales.create') }}"
                class="btn btn-secondary btn-menu">
                Limpieza de canales
            </a>
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-2">
            <a href="{{ route('capacitacionPersonal.create') }}"
                class="btn btn-secondary btn-menu">
                Capacitación del Personal
            </a>
        </div>

        <h1 class="col-12 mt-5">Reportes</h1>

        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-2">
            <a href="{{ route('historial.index') }}"
                class="btn btn-info btn-menu">
                Historial de Actividades
            </a>
        </div>

    </div>
@endsection