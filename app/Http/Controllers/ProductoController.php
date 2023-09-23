<?php

namespace App\Http\Controllers;

use App\Models\Proveedores;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos['productos'] = Producto::select('id_producto','nombre', 'stock', 'precio', 'alerta', 'id_proveedor')->paginate(5);
        return view('producto.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $datos['proveedores'] = Proveedores::select('id_proveedor, nombre');
        return view('producto.create', $datos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $campos=[
            'nombre'=>'required|string|max:100',
            'stock'=> 'required|integer|max:1000',
            'precio'=> 'required|float|max:1000000'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);


        // $datosUsuario = request()->except('_token');
        
        $apellido = $request->input('nombro');
        $nombre = $request->input('stock');
        $usuario = $request->input('precio');
        $prov = $request->input('id_proveedor');
        


        $datosUsuario = [
            'nombre'=> $apellido,
            'stock'=> $nombre,
            'precio'=> $usuario,
            'alerta'=> 0,
            'id_proveedor'=> $prov
        ];
        

        Producto::create($datosUsuario);
        return redirect('producto')->with('mensaje', 'Usuario agregado con exito');

    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
