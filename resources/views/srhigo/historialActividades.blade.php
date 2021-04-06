@extends('layouts.app')
@section('content')
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
<div class="row">
    <h1 class="titulo mb-5 col-12 text-center">Historial de Actividades</h1>
    <h2 class="h1">Preparación de suelo</h2>
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
                <td><a href="#" data-toggle="modal" data-target="#detalle{{ $actividad->id }}">Ver detalle</a></td>
            </tr>
            
            <!-- Modal -->
            <div class="modal fade" id="detalle{{ $actividad->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
</div>
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
@endsection