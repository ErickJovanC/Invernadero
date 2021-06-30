{{-- Metodo Aplicación --}}
<div class="form-group col-12 col-sm-6 col-md-3 col-lg-3 mb-5">
    <label for="metodoAplicacion">Metodo de Aplicación</label>
    <select name="metodoAplicacion" id="metodoAplicacion" class="form-control @error('metodoAplicacion') is-invalid @enderror">
        <option value="" hidden>Seleccione un metodo</option>
        <option value="Por planta" {{ old('metodoAplicacion') == 'Por planta' ? 'selected' : '' }}>Por planta</option>
        <option value="Voleo" {{ old('metodoAplicacion') == 'Voleo' ? 'selected' : '' }}>Voleo</option>
        <option value="Aspersion" {{ old('metodoAplicacion') == 'Aspersion' ? 'selected' : '' }}>Aspersión</option>
    </select>
    @error('metodoAplicacion')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{$message}}</strong>
        </span>
    @enderror
</div>{{-- Fin Metodo Aplicación --}}