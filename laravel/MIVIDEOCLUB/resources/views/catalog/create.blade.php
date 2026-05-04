@extends('layouts.master')
@section('content') 
<div class="row">
    <div class="col-sm-6 col-sm-offset-3">
        <h1>Crear nueva película</h1>
        <form action="{{ url('/catalog/create') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="form-group">
                <label for="year">Año</label>
                <input type="text" class="form-control" id="year" name="year" required>
            </div>

            <div class="form-group">
                <label for="director">Director</label>
                <input type="text" class="form-control" id="director" name="director" required>
            </div>

            <div class="form-group">
                <label for="poster">Poster</label>
                <input type="text" class="form-control" id="poster" name="poster" required>
            </div>

            <div class="form-group">
                <label for="synopsis">Resumen</label>
                <textarea class="form-control" id="synopsis" name="synopsis" rows="5" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Añadir película</button>
        </form>
    </div>
</div>

@stop