{{-- Responsable --}}
<div class="form-group col-sm-12 col-md-6 col-lg-6 mb-5">
    <label for="responsable">Responsable</label>
    <select name="responsable" id="responsable" class="form-control @error('responsable') is-invalid @enderror">
        <option value="" hidden>Seleccione el empleado</option>
        @foreach ($empleados as $empleado)
            <option 
                value="{{ $empleado->id }}" 
                {{ old('responsable') == $empleado->id ? 'selected' : '' }}
            >
                {{ $empleado->nombreEmpleado ." ".
                    $empleado->apellidoEmpleado ." (".
                    $empleado->sobrenombreEmpleado .")"}}
            </option>
        @endforeach
    </select>
    @error('responsable')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{$message}}</strong>
        </span>
    @enderror
</div> {{-- Fin Responsable --}}