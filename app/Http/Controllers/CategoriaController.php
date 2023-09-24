<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Categorias;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos['usuarios'] = User::select('apellido','nombre','username')->paginate(5);
        $datos['categorias'] = Categorias::select('id_categoria','nombre', 'user_cambio', 'baja')->paginate(5);
        return view('categoria.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $campos=[
            'nombre'=> 'required|string|max:100',  
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);

        $nombre = $request->input('nombre');
        $id = auth()->id();
        
        $datosCategoria = [
            'nombre'=> $nombre,
            'user_cambio' => $id,
            'baja' => 0,
            'created_at' => now(),
            'updated_at' => now()

        ];
        
        Categorias::create($datosCategoria);
        
        return redirect('categoria')->with('mensaje', 'Categoria agregada con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(categoria $categoria)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, categoria $categoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(categoria $categoria)
    {
        //
    }
}
