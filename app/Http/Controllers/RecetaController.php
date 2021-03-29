<?php

namespace App\Http\Controllers;

use App\CategoriaReceta;
use Debugbar;
use App\Receta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class RecetaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
     {  
        $recetas = auth()->user()->recetas; // $recetas = Auth::user()->recetas; = Diferente forma de hacer
        // Debugbar::info($recetas);
        return view("recetas.index")->with('recetas', $recetas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // DB::table('categoria_receta')->get()->pluck('nombre','id')->dd();

        // Obtenerlas categorias (Sin Modelo) 
        // $categorias = DB::table('categoria_recetas')->get()->pluck('nombre', 'id');

        // Con Modelo
        $categorias = CategoriaReceta::all(['id', 'nombre']);
        // Debugbar::info($categorias);
        return view("recetas.create")->with('categorias', $categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->all()); 
        // Validacion
        $data = request()->validate([
            'titulo' => 'required|min:6|string',
            'ingredientes' => 'required',
            'preparacion' => 'required',
            'imagen' => 'required|image',
            'categoria' => 'required'
        ]);

        // Obtener Ruta de la Imagen
        $ruta_imagen = $request['imagen']->store('upload-recetas', 'public');

        // Intervention Observer
        $img = Image::make(public_path("storage/{$ruta_imagen}"))->fit(1200, 550);
        $img->save();

        // Insertar Datos a la BD (Sin Modelo)
        // DB::table('recetas')->insert([

        //     'titulo_receta' => $data['titulo'],
        //     'ingredientes' => $data['ingredientes'],
        //     'preparacion' => $data['preparacion'],
        //     'imagen' => $ruta_imagen,
        //     'user_id' => Auth::user()->id,
        //     'categoria_id' => $data['categoria']

        // ]);


        // Insertar Datos a la BD (Con Modelo)
        auth()->user()->recetas()->create([
            'titulo_receta' => $data['titulo'],
            'ingredientes' => $data['ingredientes'],
            'preparacion' => $data['preparacion'],
            'imagen' => $ruta_imagen,
            'categoria_id' => $data['categoria']
        ]);

        // Reedireccionar
        return redirect()->action('RecetaController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function show(Receta $receta)
    {
        // Mandamos la informacion a la vista how.blade.php
        return view("recetas.show", compact('receta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function edit(Receta $receta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receta $receta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receta $receta)
    {
        //
    }
}
