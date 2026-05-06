@extends('layouts.master')
@section('content') 
<div class="row">
    <div class="col-sm-6 col-sm-offset-3">
        <h1>Modificar película</h1>
        <form action="{{ url('/catalog/create') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" class="form-control" id="title" name="title" value="{{$pelicula->title}}" required>
            </div>

            <div class="form-group">
                <label for="year">Año</label>
                <input type="text" class="form-control" id="year" name="year" value="{{$pelicula->year}}" required>
            </div>

            <div class="form-group">
                <label for="director">Director</label>
                <input type="text" class="form-control" id="director" name="director" value="{{$pelicula->director}}" required>
            </div>

            <div class="form-group">
                <label for="poster">Poster</label>
                <input type="text" class="form-control" id="poster" name="poster" value="{{$pelicula->poster}}" required>
            </div>

            <div class="form-group">
                <label for="synopsis">Resumen</label>
                <textarea class="form-control" id="synopsis" name="synopsis" rows="7" required>{{$pelicula->synopsis}}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Modificar película</button>
        </form>
    </div>
</div>
@stop