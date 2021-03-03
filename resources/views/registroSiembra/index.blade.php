@extends('layouts.app')
@section('content')
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
<div class="row">
    <h1 class="titulo mb-5 col-12 text-center">Registro de siembra</h1>
    <form action="" method="post">
        <div class="row">
            
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="Lote">Lote</label>
                <div class="alert alert-warning">Esto vendra de los lotes registrados</div>
                <select name="Lote" id="Lote" class="form-control">
                    <option value="1437">1437</option>
                    <option value="2845">2845</option>
                    <option value="4579">4579</option>
                </select>
            </div>

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="Varidad">Variedad</label>
                <div class="alert alert-danger">Hacer lista selectiva</div>
                <input type="text" name="Variedad" id="Variedad" class="form-control">
            </div>

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="FechaSiembra">Fecha de Acción</label>
                <input type="date" name="FechaSiembra" id="FechaSiembra" class="form-control">
            </div>

            <div class="col-sm-12 col-md-6 mb-5">
                <span>Distanciamiento de siembra</span>
                <div class="row">
                    <div class="col-6">
                        <label for="DistanciaDobleSurco">Entre doble surco (Metros)</label>
                        <input type="text" name="DistanciaDobleSurco" id="DistanciaDobleSurco" class="form-control">
                    </div>
                    <div class="col-6">
                        <label for="DistanciaSurco">Entre surco (Metros)</label>
                        <input type="text" name="DistanciaSurco" id="DistanciaSurco" class="form-control">
                    </div>
                </div>
            </div>

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="Riego">Tipo de Riego</label>
                <select name="Riego" id="Riego" class="form-control">
                    <option hidden></option>
                    <option value="Aspersión">Aspersión</option>
                    <option value="Goteo">Goteo</option>
                    <option value="Gravedad">Gravedad</option>
                </select>
            </div>

        </div>

        <div class="row text-left">
            <div class="form-group">
                <input type="submit" value="Registrar siembra" class="btn btn-primary">
            </div>
        </div>

    </form>
</div>
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
@endsection