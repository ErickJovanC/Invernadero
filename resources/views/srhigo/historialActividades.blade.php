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
                <td>{{ $preparacion->seccion->propiedad->nombreHuerta ." - ". 
                        $preparacion->seccion->nombreSeccion }}</td>
                <td>{{ $preparacion->costoOperacion }}</td>
                <td>{{ $preparacion->labor }}
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
</div>
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
@endsection