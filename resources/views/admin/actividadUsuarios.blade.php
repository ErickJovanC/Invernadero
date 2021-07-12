@extends('layouts.app')
@section('content')
<a href="{{ route('admin.index') }}" class="btn btn-primary">Administración</a>
<div class="row">
    <h1 class="titulos mb-5 col-12 text-center mt-5">Historial de Actividades de {{ $usuario }}</h1>

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

    <div id="fertilizacion" class="titulos col-12 mt-5">Fertilización y Riego</div>
    {{-- Aplicación de Fertilizante --}}
    <h2 class="h1 mt-5">Aplicación de fertilizantes</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Fecha</th>
                <th scope="col">Huerta y Sección</th>
                <th scope="col">Fertilizante</th>
                <th scope="col">Kilos por hectarea</th>
                <th scope="col">Ver Detalle</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($aplicacionFertilizante as $fertilizante)
            <tr>
                <td>{{ $fertilizante->fechaAplicacion }}</td>
                <td>{{ $fertilizante->huerta->nombreHuerta ." - ". 
                        $fertilizante->seccion->nombreSeccion }}</td>
                <td>{{ $fertilizante->fertilizante->nombreFertilizante }}</td>
                <td>{{ $fertilizante->kilosHectarea }}
                </td>
                <td><a href="#" data-toggle="modal" data-target="#fertilizante{{ $fertilizante->id }}">Ver detalle</a></td>
            </tr>
            
            <!-- Modal -->
            <div class="modal fade" id="fertilizante{{ $fertilizante->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            Fecha de apicación:
                            <b>{{ $fertilizante->fechaAplicacion }}</b>
                        </div>
                        <div>
                            Huerta:
                            <b>{{ $fertilizante->huerta->nombreHuerta }}</b>
                        </div>
                        <div>
                            Sección: 
                            <b>{{ $fertilizante->seccion->nombreSeccion }}</b>
                        </div>
                        <div>
                            Fertilizante:
                            <b>{{ $fertilizante->fertilizante->nombreFertilizante }}</b>
                        </div>
                        <div>
                            Kilos por hectarea:
                            <b>{{ $fertilizante->kilosHectarea }}</b>
                        </div>
                        <div>
                            Metodo de Aplicación:
                            <b>{{ $fertilizante->metodoAplicacion }}</b>
                        </div>
                        <div>
                            Responsable:
                            <b>
                                {{
                                    $fertilizante->Empleado->nombreEmpleado .' '.
                                    $fertilizante->Empleado->apellidoEmpleado .' ('.
                                    $fertilizante->Empleado->sobrenombreEmpleado .')'
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
    {{-- Fin Aplicación de Fertilizante --}}

    {{-- Aplicación de Fertilizante Organico --}}
    <h2 class="h1 mt-5">Aplicación de fertilizante Organico</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Fecha</th>
                <th scope="col">Huerta y Sección</th>
                <th scope="col">Tipo de Fertilizante</th>
                <th scope="col">Cantidad Aplicada</th>
                <th scope="col">Ver Detalle</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fertilizanteOrganico as $organico)
            <tr>
                <td>{{ $organico->fecha }}</td>
                <td>{{ $organico->huerta->nombreHuerta ." - ". 
                        $organico->seccion->nombreSeccion }}</td>
                <td>{{ $organico->tipoFertilizante }}
                <td>{{ $organico->cantidadAplicada ." KG"}}</td>
                </td>
                <td><a href="#" data-toggle="modal" data-target="#organico{{ $organico->id }}">Ver detalle</a></td>
            </tr>
            
            <!-- Modal -->
            <div class="modal fade" id="organico{{ $organico->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            Fecha de apicación:
                            <b>{{ $organico->fecha }}</b>
                        </div>
                        <div>
                            Huerta:
                            <b>{{ $organico->huerta->nombreHuerta }}</b>
                        </div>
                        <div>
                            Sección: 
                            <b>{{ $organico->seccion->nombreSeccion }}</b>
                        </div>
                        <div>
                            Tipo de Fertilizante:
                            <b>{{ $organico->tipoFertilizante }}</b>
                        </div>
                        <div>
                            Cantidad Aplicada:
                            <b>{{ $organico->cantidadAplicada ." KG" }}</b>
                        </div>
                        <div>
                            Superficie:
                            <b>{{ $organico->superficie }}</b>
                        </div>
                        <div>
                            Responsable:
                            <b>
                                {{
                                    $organico->Empleado->nombreEmpleado .' '.
                                    $organico->Empleado->apellidoEmpleado .' ('.
                                    $organico->Empleado->sobrenombreEmpleado .')'
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
    {{-- Fin Aplicación de Fertilizante Organico --}}

    {{-- Registro de Riego --}}
    <h2 class="h1 mt-5">Registro de Riego</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Fecha</th>
                <th scope="col">Huerta y Sección</th>
                <th scope="col">Metodo de Reigo</th>
                <th scope="col">Horas de riego</th>
                <th scope="col">Ver Detalle</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($registroRiego as $riego)
            <tr>
                <td>{{ $riego->fecha }}</td>
                <td>{{ $riego->huerta->nombreHuerta ." - ". 
                        $riego->seccion->nombreSeccion }}</td>
                <td>{{ $riego->metodoRiego }}
                <td>{{ $riego->horas }}</td>
                </td>
                <td><a href="#" data-toggle="modal" data-target="#riego{{ $riego->id }}">Ver detalle</a></td>
            </tr>
            
            <!-- Modal -->
            <div class="modal fade" id="riego{{ $riego->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <b>{{ $riego->fecha }}</b>
                        </div>
                        <div>
                            Huerta:
                            <b>{{ $riego->huerta->nombreHuerta }}</b>
                        </div>
                        <div>
                            Sección: 
                            <b>{{ $riego->seccion->nombreSeccion }}</b>
                        </div>
                        <div>
                            Metodo de Riego:
                            <b>{{ $riego->metodoRiego }}</b>
                        </div>
                        <div>
                            Hora de Inicio:
                            <b>{{ $riego->horaInicio }}</b>
                        </div>
                        <div>
                            Hora Fin:
                            <b>{{ $riego->horaFin }}</b>
                        </div>
                        <div>
                            Horas totales:
                            <b>{{ $riego->horas }}</b>
                        </div>
                        <div>
                            Litros por Hora:
                            <b>{{ $riego->litrosHora }}</b>
                        </div>
                        {{-- <div>
                            Consumo de Energia:
                            <b>{{ $riego->consumoEnergia }}</b>
                        </div> --}}
                        <div>
                            Responsable:
                            <b>
                                {{
                                    $riego->Empleado->nombreEmpleado .' '.
                                    $riego->Empleado->apellidoEmpleado .' ('.
                                    $riego->Empleado->sobrenombreEmpleado .')'
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
    {{-- Fin Registro de Riego --}}

    <div id="plagas" class="titulos col-12 mt-5">Plagas y Enfermedades</div>
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

    {{-- Identificación de Plagas --}}
    <h2 class="h1 mt-5">Identificación de Plagas</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Fecha</th>
                <th scope="col">Huerta y Sección</th>
                <th scope="col">Periodo de Monitoreo</th>
                <th scope="col">Plaga detectada</th>
                <th scope="col">Ver Detalle</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($identificacionPlagas as $plaga)
            <tr>
                <td>{{ $plaga->fecha }}</td>
                <td>{{ $plaga->huerta->nombreHuerta 
                    ." - ". $plaga->seccion->nombreSeccion }}</td>
                <td>{{ $plaga->periodoMonitoreo }}
                <td>{{ $plaga->plaga->nombrePlaga }}</td>
                </td>
                <td><a href="#" data-toggle="modal" data-target="#plaga{{ $plaga->id }}">Ver detalle</a></td>
            </tr>
            
            <!-- Modal -->
            <div class="modal fade" id="plaga{{ $plaga->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <b>{{ $plaga->fecha }}</b>
                        </div>
                        <div>
                            Huerta y Sección:
                            <b>{{ $plaga->huerta->nombreHuerta ." - ". $plaga->seccion->nombreSeccion }}</b>
                        </div>
                        <div>
                            Periodo de Monitoreo 
                            <b>{{ $plaga->periodoMonitoreo }}</b>
                        </div>
                        <div>
                            Plaga:
                            <b>{{ $plaga->plaga->nombrePlaga }}</b>
                        </div>
                        <div>
                            Unidad de Muestreo:
                            <b>{{ $plaga->unidadMuestreo }}</b>
                        </div>
                        <div>
                            Cantidad Encontrada:
                            <b>{{ $plaga->cantidadEncontrada }}</b>
                        </div>
                        <div>
                            Daño Provocado:
                            <b>{{ $plaga->danioPlaga }}</b>
                        </div>
                        <div>
                            Foto:
                            {{-- @dump($plaga->foto) --}}
                            @if($plaga->foto != null)
                                <a href="{{ asset('storage').'/'. $plaga->foto }}" target="_blank"><img src="{{ asset('storage').'/'. $plaga->foto }}" alt="Foto" width="300"></a>
                            @else
                                (Sin foto)
                            @endif
                        </div>
                        <div>
                            Responsable:
                            <b>
                                {{
                                    $plaga->Empleado->nombreEmpleado .' '.
                                    $plaga->Empleado->apellidoEmpleado .' ('.
                                    $plaga->Empleado->sobrenombreEmpleado .')'
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
    {{-- Fin Identificación de Plagas --}}

    {{-- Aplicación de Plaguicida --}}
    <h2 class="h1 mt-5">Aplicación de Plaguicida</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Fecha</th>
                <th scope="col">Huerta y Sección</th>
                <th scope="col">Tipo de Plaguicida</th>
                <th scope="col">Ingrediente Activo</th>
                <th scope="col">Ver Detalle</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($aplicacionPlaguicida as $plaguicida)
            <tr>
                <td>{{ $plaguicida->fecha }}</td>
                <td>{{ $plaguicida->huerta->nombreHuerta 
                    ." - ". $plaguicida->seccion->nombreSeccion }}</td>
                <td>{{ $plaguicida->plaguicida->tipo }}
                <td>{{ $plaguicida->plaguicida->ingredienteActivo }}</td>
                </td>
                <td><a href="#" data-toggle="modal" data-target="#plaguicida{{ $plaguicida->id }}">Ver detalle</a></td>
            </tr>
            
            <!-- Modal -->
            <div class="modal fade" id="plaguicida{{ $plaguicida->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <b>{{ $plaguicida->fecha }}</b>
                        </div>
                        <div>
                            Huerta y Sección:
                            <b>{{ $plaguicida->huerta->nombreHuerta ." - ". $plaguicida->seccion->nombreSeccion }}</b>
                        </div>
                        <div>
                            Plaga a tratar
                            <b>{{ $plaguicida->plaga->nombrePlaga }}</b>
                        </div>
                        <div>
                            Tipo de Plaguicida: 
                            <b>{{ $plaguicida->plaguicida->tipo }}</b>
                        </div>
                        <div>
                            Nombre Comercial:
                            <b>{{ $plaguicida->plaguicida->nombreComercial }}</b>
                        </div>
                        <div>
                            Ingrediente Activo:
                            <b>{{ $plaguicida->plaguicida->ingredienteActivo }}</b>
                        </div>
                        <div>
                            Color de la Banda:
                            <b>{{ $plaguicida->plaguicida->colorBanda }}</b>
                        </div>
                        <div>
                            Dosis Aplicada:
                            <b>{{ $plaguicida->dosisAplicada }} litros</b>
                        </div>
                        <div>
                            Agua utilizada:
                            <b>{{ $plaguicida->agua }} litros</b>
                        </div>
                        <div>
                            Condición Metereológica:
                            <b>{{ $plaguicida->clima }}</b>
                        </div>
                        <div>
                            Equipo de Protección:
                            <b>{{ $plaguicida->equipo }}</b>
                        </div>
                        <div>
                            Tiempo:
                            <b>{{ $plaguicida->horas .":". $plaguicida->minutos.":00" }}</b>
                        </div>
                        <div>
                            Responsable:
                            <b>
                                {{
                                    $plaguicida->Empleado->nombreEmpleado .' '.
                                    $plaguicida->Empleado->apellidoEmpleado .' ('.
                                    $plaguicida->Empleado->sobrenombreEmpleado .')'
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
    {{-- Fin Aplicación de Plaguicida --}}

    <div id="mantenimiento" class="titulos col-12 mt-5">Mantenimiento y Capacitación</div>
    {{-- Calibración de Equipo --}}
    <h2 class="h1 mt-5">Calibración de Equipo</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Fecha</th>
                <th scope="col">Equipo Calibrado</th>
                <th scope="col">Gasto Equipo</th>
                <th scope="col">Gasto Manzana</th>
                <th scope="col">Ver Detalle</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($calibracionEquipo as $calibracion)
            <tr>
                <td>{{ $calibracion->fecha }}</td>
                <td>{{ $calibracion->equipo }}</td>
                <td>{{ $calibracion->gastoEquipo }}</td>
                <td>{{ $calibracion->gastoManzana }}
                </td>
                <td><a href="#" data-toggle="modal" data-target="#calibracion{{ $calibracion->id }}">Ver detalle</a></td>
            </tr>
            
            <!-- Modal -->
            <div class="modal fade" id="calibracion{{ $calibracion->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            Fecha de apicación:
                            <b>{{ $calibracion->fecha }}</b>
                        </div>
                        <div>
                            Equipo Calibrado:
                            <b>{{ $calibracion->equipo }}</b>
                        </div>
                        <div>
                            Produucto Apicado:
                            <b>{{ $calibracion->producto }}</b>
                        </div>
                        <div>
                            Tamaño del recipiente:
                            <b>{{ $calibracion->equipo == 'Manual 15l' ? '15 litros' : '25 litros' }}</b>
                        </div>
                        <div>Gasto del equipo:
                            <b>${{ $calibracion->gastoEquipo }}</b>
                        </div>
                        <div>Área Cubierta:
                            <b>{{ $calibracion->area }}</b>
                        </div>
                        <div>Gasto Manzana:
                            <b>${{ $calibracion->gastoManzana }}</b>
                        </div>
                        <div>Comentario:
                            <b>{{ $calibracion->comentario }}</b>
                        </div>
                        <div>
                            Responsable:
                            <b>
                                {{
                                    $calibracion->Empleado->nombreEmpleado .' '.
                                    $calibracion->Empleado->apellidoEmpleado .' ('.
                                    $calibracion->Empleado->sobrenombreEmpleado .')'
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
    {{-- Fin Calibración de Equipo --}}

    {{-- Limpieza de Canales --}}
    <h2 class="h1 mt-5">Limpieza de Canales</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Fecha</th>
                <th scope="col">Huerta</th>
                <th scope="col">Canal</th>
                <th scope="col">Longitud</th>
                <th scope="col">Ver Detalle</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($limpiezaCanales as $canal)
            <tr>
                <td>{{ $canal->fecha }}</td>
                <td>{{ $canal->huerta->nombreHuerta }}</td>
                <td>{{ $canal->nombreCanal }}
                <td>{{ $canal->longitud }}</td>
                </td>
                <td><a href="#" data-toggle="modal" data-target="#canal{{ $canal->id }}">Ver detalle</a></td>
            </tr>
            
            <!-- Modal -->
            <div class="modal fade" id="canal{{ $canal->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <b>{{ $canal->fecha }}</b>
                        </div>
                        <div>
                            Huerta:
                            <b>{{ $canal->huerta->nombreHuerta }}</b>
                        </div>
                        <div>
                            Canal: 
                            <b>{{ $canal->nombreCanal }}</b>
                        </div>
                        <div>
                            Longitud:
                            <b>{{ $canal->longitud }}</b>
                        </div>
                        <div>
                            Revestimiento:
                            <b>{{ $canal->revestimiento }}</b>
                        </div>
                        <div>
                            Acciones Realizadas:
                            <b>{{ $canal->accionesRealizadas }}</b>
                        </div>
                        <div>
                            Observaciones:
                            <b>{{ $canal->observaciones }}</b>
                        </div>
                        <div>
                            Responsable:
                            <b>
                                {{
                                    $canal->Empleado->nombreEmpleado .' '.
                                    $canal->Empleado->apellidoEmpleado .' ('.
                                    $canal->Empleado->sobrenombreEmpleado .')'
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
    {{-- Fin Limpieza de Canales --}}

    {{-- Control de Podas --}}
    <h2 class="h1 mt-5">Control de Podas</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Fecha</th>
                <th scope="col">Huerta y Sección</th>
                <th scope="col">Plantas Removidas</th>
                <th scope="col">Motivo</th>
                <th scope="col">Ver Detalle</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cortePlantas as $cortePlanta)
            <tr>
                <td>{{ $cortePlanta->fecha }}</td>
                <td>{{ $cortePlanta->huerta->nombreHuerta ." - ". $cortePlanta->seccion->nombreSeccion }}</td>
                <td>{{ $cortePlanta->cantidad }}
                <td>{{ $cortePlanta->motivo }}</td>
                </td>
                <td><a href="#" data-toggle="modal" data-target="#cortePlanta{{ $cortePlanta->id }}">Ver detalle</a></td>
            </tr>
            
            <!-- Modal -->
            <div class="modal fade" id="cortePlanta{{ $cortePlanta->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <b>{{ $cortePlanta->fecha }}</b>
                        </div>
                        <div>
                            Huerta:
                            <b>{{ $cortePlanta->huerta->nombreHuerta }}</b>
                        </div>
                        <div>
                            Sección:
                            <b>{{ $cortePlanta->seccion->nombreSeccion }}</b>
                        </div>
                        <div>
                            Plantas Removidas: 
                            <b>{{ $cortePlanta->cantidad }}</b>
                        </div>
                        <div>
                            Motivo del corte:
                            <b>{{ $cortePlanta->motivo }}</b>
                        </div>
                        <div>
                            Responsable:
                            <b>
                                {{
                                    $cortePlanta->Empleado->nombreEmpleado .' '.
                                    $cortePlanta->Empleado->apellidoEmpleado .' ('.
                                    $cortePlanta->Empleado->sobrenombreEmpleado .')'
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
    {{-- Fin Control de Podas --}}

    {{-- Capacitaciones de Personal --}}
    <h2 class="h1 mt-5">Capacitaciones de Personal</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Fecha</th>
                <th scope="col">huerta</th>
                <th scope="col">Curso</th>
                <th scope="col">Capacitador</th>
                <th scope="col">Ver Detalle</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($capacitacionPersonal as $capacitacion)
            <tr>
                <td>{{ $capacitacion->fecha }}</td>
                <td>{{ $capacitacion->huerta->nombreHuerta }}</td>
                <td>{{ $capacitacion->nombreCurso }}
                <td>{{ $capacitacion->capacitador }}</td>
                </td>
                <td><a href="#" data-toggle="modal" data-target="#capacitacion{{ $capacitacion->id }}">Ver detalle</a></td>
            </tr>
            
            <!-- Modal -->
            <div class="modal fade" id="capacitacion{{ $capacitacion->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <b>{{ $capacitacion->fecha }}</b>
                        </div>
                        <div>
                            Huerta:
                            <b>{{ $capacitacion->huerta->nombreHuerta }}</b>
                        </div>
                        <div>
                            Curso: 
                            <b>{{ $capacitacion->nombreCurso }}</b>
                        </div>
                        <div>
                            Capacitador:
                            <b>{{ $capacitacion->capacitador }}</b>
                        </div>
                        <div>
                            Empresa capaciitadora:
                            <b>{{ $capacitacion->empresa }}</b>
                        </div>
                        <div>
                            Duración del curso:
                            <b>{{ $capacitacion->tiempo }}</b>
                        </div>
                        <div>
                            Asistes:
                            <b>{{ $capacitacion->empleados }}</b>
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
    {{-- Fin Capacitaciones de Personal --}}
</div>
@endsection