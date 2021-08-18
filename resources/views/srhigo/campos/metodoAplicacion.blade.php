{{-- Metodo Aplicación --}}
<div class="form-group col-12 col-sm-6 col-md-6 col-lg-6 mb-5">
    <label for="metodoAplicacion">Metodo de Aplicación</label>
    <select name="metodoAplicacion" id="metodoAplicacion" class="form-control @error('metodoAplicacion') is-invalid @enderror">
        <option value="" hidden>Seleccionar...</option>
        <option value="Aspersion" {{ old('metodoAplicacion') == 'Aspersion' ? 'selected' : '' }}>Aspersión</option>
        <option value="Por planta" {{ old('metodoAplicacion') == 'Por planta' ? 'selected' : '' }}>Por planta</option>
        <option value="Riego" {{ old('metodoAplicacion') == 'Riego' ? 'selected' : '' }}>Riego</option>
        <option value="Voleo" {{ old('metodoAplicacion') == 'Voleo' ? 'selected' : '' }}>Voleo</option>
    </select>
    @error('metodoAplicacion')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{$message}}</strong>
        </span>
    @enderror
</div>{{-- Fin Metodo Aplicación --}}