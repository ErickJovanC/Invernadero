@extends('layouts.app')
@section('content')
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
<div class="row">
    <h1 class="titulo mb-5 col-12 text-center">Historial de Actividades</h1>

    {{-- Recepción de Plantas --}}
    <h2 class="h1">Recepción de Plantas</h2>
    <table class="table table-striped mb-5">
        <thead>
            <tr>
                <th scope="col">Fecha</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Variedad</th>
                {{-- <th scope="col">Actividad</th> --}}
                <th scope="col">Lote Asiganado</th>
                <th scope="col">Ver Detalle</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($calidadPlanta as $recepcion)
            <tr>
                <td>{{ $recepcion->fechaRecepcion }}</td>
                <td>{{ $recepcion->cantidadPlantas }}</td>
                <td>{{ $recepcion->variedadPlanta }}</td>
                <td>{{
                    $recepcion->lote}}
                </td>
                <td><a href="#" data-toggle="modal" data-target="#recepcion{{ $recepcion->id }}">Ver detalle</a></td>
            </tr>
            
            <!-- Modal -->
            <div class="modal fade" id="recepcion{{ $recepcion->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detalles</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div>
                            Fecha de corte:
                            <b>{{ $recepcion->fechaCorte }}</b>
                        </div>
                        <div>
                            Fecha de Recepción:
                            <b>{{ $recepcion->fechaRecepcion }}</b>
                        </div>
                        <div>
                            Origen de la planta: 
                            <b>{{ $recepcion->origenPlanta }}</b>
                        </div>
                        <div>
                            Cantidad de Plantas:
                            <b>{{ $recepcion->cantidadPlantas }}</b>
                        </div>
                        <div>
                            Plantadas:
                            <b>{{ $recepcion->plantadas }}</b>
                        </div>
                        <div>
                            Por Plantar:
                            <b>{{ $recepcion->porPlantar }}</b>
                        </div>
                        <div>
                            Variedad:
                            <b>{{ $recepcion->variedadPlanta}}</b>
                        </div>
                        <div>
                            Lote asiganado:
                            <b>{{ $recepcion->lote }}</b>
                        </div>
                        <div>
                            Recistencia a Plagas:
                            <b>{{ $recepcion->resistenciaPlagas }}</b>
                        </div>
                        <div>
                            Tolerancia a Plagas:
                            <b>{{ $recepcion->toleranciaPlagas }}</b>
                        </div>
                        <div>
                            Certificado
                            <b>{{ $recepcion->certificado }}</b>
                        </div>
                        <div>
                            Responsable:
                            <b>
                                {{
                                    $recepcion->Empleado->nombreEmpleado .' '.
                                    $recepcion->Empleado->apellidoEmpleado .' ('.
                                    $recepcion->Empleado->sobrenombreEmpleado .')'
                                }}
                            </b>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
                    </div>
                </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
    {{-- Fin Recepción de Plantas --}}

    {{-- Control Preventivo de Plagas Previo a plantar --}}
    <h2 class="h1 mt-5">Control Preventivo de Plagas Previo a plantar</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Fecha</th>
                <th scope="col">Lote</th>
                <th scope="col">Cantidad de Plantas</th>
                {{-- <th scope="col">Actividad</th> --}}
                <th scope="col">Acción Preventiva</th>
                <th scope="col">Ver Detalle</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($controlPreventivoPlanta as $control)
            <tr>
                <td>{{ $control->fechaAccion }}</td>
                <td>{{ $control->lote->lote }}</td>
                <td>{{ $control->cantidadPlantas }}</td>
                <td>{{ $control->accionPreventiva }}</td>
                </td>
                <td><a href="#" data-toggle="modal" data-target="#control{{ $control->id }}">Ver detalle</a></td>
            </tr>
            
            <!-- Modal -->
            <div class="modal fade" id="control{{ $control->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detalles</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div>
                            Fecha:
                            <b>{{ $control->fechaAccion }}</b>
                        </div>
                        <div>
                            Lote:
                            <b>{{ $control->lote->lote }}</b>
                        </div>
                        <div>
                            Plagas a prevenir: 
                            <b>{{ $control->plagasPrevenir }}</b>
                        </div>
                        <div>
                            Acción Preventiva:
                            <b>{{ $control->accionPreventiva }}</b>
                        </div>
                        <div>
                            Cantidad de plantas tratadas:
                            <b>{{ $control->cantidadPlantas }}</b>
                        </div>
                        <div>
                            Costo:
                            <b>{{ $control->costo }}</b>
                        </div>
                        <div>
                            Responsable:
                            <b>
                                {{
                                    $control->empleado->nombreEmpleado .' '.
                                    $control->empleado->apellidoEmpleado .' ('.
                                    $control->empleado->sobrenombreEmpleado .')'
                                }}
                            </b>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
                    </div>
                </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
    {{-- Fin Control Preventivo de Plagas Previo a plantar --}}

    {{-- Preparación del suelo --}}
    <h2 class="h1 mt-5">Preparación de suelo</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Fecha y Hora</th>
                <th scope="col">Huerta</th>
                <th scope="col">Sección</th>
                {{-- <th scope="col">Actividad</th> --}}
                <th scope="col">Responsable</th>
                <th scope="col">Ver Detalle</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($preparacionSuelo as $actividad)
            <tr>
                <td>{{ $actividad['updated_at'] }}</td>
                <td>{{ $actividad->huerta->nombreHuerta }}</td>
                <td>{{ $actividad->seccion->nombreSeccion }}</td>
                {{-- <td>Preparación de suelo</td> --}}
                <td>{{ 
                    $actividad->empleado->nombreEmpleado .' '.
                    $actividad->empleado->apellidoEmpleado .' ('.
                    $actividad->empleado->sobrenombreEmpleado .')'}}
                </td>
                <td><a href="#" data-toggle="modal" data-target="#preparacion{{ $actividad->id }}">Ver detalle</a></td>
            </tr>
            
            <!-- Modal -->
            <div class="modal fade" id="preparacion{{ $actividad->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detalles</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div>
                            Fecha de registro:
                            <b>{{ $actividad->updated_at }}</b>
                        </div>
                        <div>
                            Huerta:
                            <b>{{ $actividad->huerta->nombreHuerta }}</b>
                        </div>
                        <div>
                            Sección: 
                            <b>{{ $actividad->seccion->nombreSeccion }}</b>
                        </div>
                        <div>
                            Labor Realziada:
                            <b>{{ $actividad->labor }}</b>
                        </div>
                        <div>
                            Fecha de Inicio:
                            <b>{{ $actividad->fechaInicio }}</b>
                        </div>
                        <div>
                            Fecha de culminación:
                            <b>{{ $actividad->fechaFin }}</b>
                        </div>
                        <div>
                            Horas de Maquinaria:
                            <b>{{ $actividad->horasMaquinaria }}</b>
                        </div>
                        <div>
                            Costo por hora:
                            <b>{{ $actividad->costoHora }}</b>
                        </div>
                        <div>
                            Costo de Operación
                            <b>${{ $actividad->costoOperacion }}</b>
                        </div>
                        <div>
                            Metodo o herramienta usada:
                            <b>{{ $actividad->metodoUtilizado }}</b>
                        </div>
                        <div>
                            Responsable:
                            <b>
                                {{
                                    $actividad->Empleado->nombreEmpleado .' '.
                                    $actividad->Empleado->apellidoEmpleado .' ('.
                                    $actividad->Empleado->sobrenombreEmpleado .')'
                                }}
                            </b>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
                    </div>
                </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
    {{-- Fin Preparación del suelo --}}


</div>
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
@endsection