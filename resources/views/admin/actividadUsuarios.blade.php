@extends('layouts.app')
@section('content')
<a href="{{ route('admin.index') }}" class="btn btn-primary">Administración</a>
<div class="row">
    <h1 class="titulos mb-5 col-12 text-center">Historial de Actividades de {{ $usuario }}</h1>

    <div class="col-12 my-3">
        <ul>
            <li>
                <a href="#siembra">Preparación, Siembra y Cosecha</a>
            </li>
            <li>
                <a href="#fertilizacion">Fertilización y Riego</a>
            </li>
            <li>
                <a href="#plagas">Plagas y Enfermedades</a>
            </li>
            <li>
                <a href="#mantenimiento">Mantenimiento y Capacitación</a>
            </li>
        </ul>
    </div>

    <div id="siembra" class="titulos col-12 mt-5">Preparación, Siembra y Cosecha</div>
    {{-- Recepción de Plantas --}}
    <h2 class="h1 col-6">Recepción de Plantas</h2>
    <table class="table table-striped mb-5">
        <thead>
            <tr>
                <th scope="col">Fecha</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Variedad</th>
                <th scope="col">Lote Asignado</th>
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

    {{-- Preparación del suelo --}}
    <h2 class="h1 mt-5">Preparación de suelo</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Fecha de inicio</th>
                <th scope="col">Huerta y Sección</th>
                <th scope="col">Labor realizada</th>
                <th scope="col">Costo de operción</th>
                <th scope="col">Ver Detalle</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($preparacionSuelo as $preparacion)
            <tr>
                <td>{{ $preparacion->fechaInicio }}</td>
                <td>
                    {{ $preparacion->seccion->propiedad->nombreHuerta ." - ". $preparacion->seccion->nombreSeccion }}
                </td>
                <td>{{ $preparacion->labor }}
                <td>{{ $preparacion->costoOperacion }}</td>
                </td>
                <td><a href="#" data-toggle="modal" data-target="#preparacion{{ $preparacion->id }}">Ver detalle</a></td>
            </tr>
            
            <!-- Modal -->
            <div class="modal fade" id="preparacion{{ $preparacion->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <b>{{ $preparacion->updated_at }}</b>
                        </div>
                        <div>
                            Huerta:
                            <b>{{ $preparacion->huerta->nombreHuerta }}</b>
                        </div>
                        <div>
                            Sección: 
                            <b>{{ $preparacion->seccion->nombreSeccion }}</b>
                        </div>
                        <div>
                            Labor Realziada:
                            <b>{{ $preparacion->labor }}</b>
                        </div>
                        <div>
                            Fecha de Inicio:
                            <b>{{ $preparacion->fechaInicio }}</b>
                        </div>
                        <div>
                            Fecha de culminación:
                            <b>{{ $preparacion->fechaFin }}</b>
                        </div>
                        <div>
                            Horas de Maquinaria:
                            <b>{{ $preparacion->horasMaquinaria }}</b>
                        </div>
                        <div>
                            Costo por hora:
                            <b>{{ $preparacion->costoHora }}</b>
                        </div>
                        <div>
                            Costo de Operación
                            <b>${{ $preparacion->costoOperacion }}</b>
                        </div>
                        <div>
                            Metodo o herramienta usada:
                            <b>{{ $preparacion->metodoUtilizado }}</b>
                        </div>
                        <div>
                            Responsable:
                            <b>
                                {{
                                    $preparacion->Empleado->nombreEmpleado .' '.
                                    $preparacion->Empleado->apellidoEmpleado .' ('.
                                    $preparacion->Empleado->sobrenombreEmpleado .')'
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

    {{-- Registro de Siembra --}}
    <h2 class="h1 mt-5">Registro de Siembra</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Fecha</th>
                <th scope="col">Huerta y Sección</th>
                <th scope="col">Lote sembrado</th>
                <th scope="col">Cantidad de Plantas</th>
                <th scope="col">Ver Detalle</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($registroSiembra as $siembra)
            <tr>
                <td>{{ $siembra->fecha }}</td>
                <td>{{ $siembra->seccion->propiedad->nombreHuerta ." - ". 
                        $siembra->seccion->nombreSeccion }}</td>
                <td>{{ $siembra->lote->lote }}</td>
                <td>{{ $siembra->cantidadPlantas }}
                </td>
                <td><a href="#" data-toggle="modal" data-target="#siembra{{ $siembra->id }}">Ver detalle</a></td>
            </tr>
            
            <!-- Modal -->
            <div class="modal fade" id="siembra{{ $siembra->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            Fecha de siembra:
                            <b>{{ $siembra->fecha }}</b>
                        </div>
                        <div>
                            Huerta:
                            <b>{{ $siembra->huerta->nombreHuerta }}</b>
                        </div>
                        <div>
                            Sección: 
                            <b>{{ $siembra->seccion->nombreSeccion }}</b>
                        </div>
                        <div>
                            Lote sembrado:
                            <b>{{ $siembra->lote->lote }}</b>
                        </div>
                        <div>
                            Cantidad de Plantas:
                            <b>{{ $siembra->cantidadPlantas }}</b>
                        </div>
                        <div>
                            Distancia entre Plantas:
                            <b>{{ $siembra->distanciaPlanta }}</b>
                        </div>
                        <div>
                            Distancia entre Vesanas:
                            <b>{{ $siembra->distanciaVesana }}</b>
                        </div>
                        <div>
                            Tipo de Riego:
                            <b>{{ $siembra->riego }}</b>
                        </div>
                        <div>
                            Responsable:
                            <b>
                                {{
                                    $siembra->Empleado->nombreEmpleado .' '.
                                    $siembra->Empleado->apellidoEmpleado .' ('.
                                    $siembra->Empleado->sobrenombreEmpleado .')'
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
    {{-- Fin Registro de Siembra --}}

    {{-- Registro de Cosecha --}}
    <h2 class="h1 mt-5">Registro de Cosecha</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Fecha</th>
                <th scope="col">Huerta y Sección</th>
                <th scope="col">Kilos</th>
                <th scope="col">Destinatario</th>
                <th scope="col">Ver Detalle</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($registroCosecha as $cosecha)
            <tr>
                <td>{{ $cosecha->fecha }}</td>
                <td>{{ $cosecha->huerta->nombreHuerta ." - ". 
                        $cosecha->seccion->nombreSeccion }}</td>
                <td>{{ $cosecha->kilos }}</td>
                <td>{{ $cosecha->cliente->nombre .' '. $cosecha->cliente->apellido .' ('. $cosecha->cliente->empresa .')' }}</td>
                <td><a href="#" data-toggle="modal" data-target="#cosecha{{ $cosecha->id }}">Ver detalle</a></td>
            </tr>
            
            <!-- Modal -->
            <div class="modal fade" id="cosecha{{ $cosecha->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            Fecha de cosecha:
                            <b>{{ $cosecha->fecha }}</b>
                        </div>
                        <div>
                            Huerta:
                            <b>{{ $cosecha->huerta->nombreHuerta }}</b>
                        </div>
                        <div>
                            Sección: 
                            <b>{{ $cosecha->seccion->nombreSeccion }}</b>
                        </div>
                        <div>
                            Kilos:
                            <b>{{ $cosecha->kilos}}</b>
                        </div>
                        <div>
                            Merma:
                            <b>{{ $cosecha->merma }}</b>
                        </div>
                        <div>
                            Hora Inicio:
                            <b>{{ $cosecha->horaInicio }}</b>
                        </div>
                        <div>
                            Hora Fin:
                            <b>{{ $cosecha->horaFin }}</b>
                        </div>
                        <div>
                            Temperatura de la Fruta:
                            <b>{{ $cosecha->tempFruta }}</b>
                        </div>
                        <div>
                            Temperatura del Suelo:
                            <b>{{ $cosecha->tempSuelo }}°C</b>
                        </div>
                        <div>
                            Taras:
                            <b>{{ $cosecha->taras }}°C</b>
                        </div>
                        <div>
                            Capacidad de las taras:
                            <b>{{ $cosecha->capacidadTara }}</b>
                        </div>
                        <div>
                            Cliente (Destinatario):
                            <b>{{ $cosecha->cliente->nombre .' '. $cosecha->cliente->apellido .' ('. $cosecha->cliente->empresa .')' }}</b>
                        </div>
                        <div>
                            Responsable:
                            <b>
                                {{
                                    $cosecha->Empleado->nombreEmpleado .' '.
                                    $cosecha->Empleado->apellidoEmpleado .' ('.
                                    $cosecha->Empleado->sobrenombreEmpleado .')'
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
    {{-- Fin Registro de Cosecha --}}
</div>
@endsection