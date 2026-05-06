<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;

class CatalogController extends Controller
{

    public function getHome() {
        // Redirige al listado, no al HomeController
        return redirect()->action([CatalogController::class, 'getIndex']); 
    }

    public function getIndex() {
        // Le pasas el array entero a la vista
        $peliculas = Movie::all();
    	return view('catalog.index', array('arrayPeliculas' => $peliculas)); 
    }

    public function getCreate() {
        return view('catalog.create'); 
    }

    public function getShow($id) {
	$pelicula = Movie::findOrFail($id);
    return view('catalog.show', array('pelicula' => $pelicula));
    }

public function getEdit($id)
{
    // Mandamos a la vista tanto la peli como el ID
    $pelicula = Movie::findOrFail($id);
    return view('catalog.edit', array('pelicula' => $pelicula, 'id' => $id));
}
}