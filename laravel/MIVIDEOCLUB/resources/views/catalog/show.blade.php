@extends('layouts.master')
@section('content') 

<div class="row">
    <div class="col-sm-4">
        {{-- Imagen de la película --}}
        <img src="{{$pelicula->poster}}" style="height:500px"/>
    </div>
    
    <div class="col-sm-8">
        {{-- Datos de la película --}}
        <h1>{{$pelicula->title}}</h1>
        <h3>Año: {{$pelicula->year}}</h3>
        <h3>Director: {{$pelicula->director}}</h3>
        <br><br>
        <p><strong>Resumen: </strong>{{$pelicula->synopsis}}</p>
        <br>
        
        <p><strong>Estado: </strong> 
            @if($pelicula->rented)
                {{-- Si es TRUE (está alquilada) --}}
                <span class="label label-danger">Película actualmente alquilada.</span>
                <br><br>
                <a class="btn btn-danger" href="#" role="button">Devolver película</a>
            @else
                {{-- Si es FALSE (está disponible) --}}
                <span class="label label-success">Película disponible.</span>
                <br><br>
                <a class="btn btn-primary" href="#" role="button">Alquilar película</a>
            @endif
            <a href="{{ url('/catalog/edit/' . $pelicula->id) }}" class="btn btn-warning">Editar Película</a>
            <a class="btn btn-light" style="border: 1px solid #ccc;" href="{{ url('/') }}" role="button">Volver al listado</a>
        </p>
    </div>
</div>

@stop