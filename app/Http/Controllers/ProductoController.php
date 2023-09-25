<?php

namespace App\Http\Controllers;

use App\Models\Proveedores;
use App\Models\Producto;
use Illuminate\Http\Request;
use Carbon\Carbon;


class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos['proveedores'] = Proveedores::select('id_proveedor','nombre')->get();
        $datos['productos'] = Producto::select('id_producto','nombre', 'stock', 'precio', 'alerta', 'id_proveedor')->paginate(5);
        return view('producto.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $datos['proveedores'] = Proveedores::select('id_proveedor', 'nombre')->get();
        return view('producto.create', $datos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $campos=[
            'nombre'=>'required|string|max:100',
            'stock' => 'required|numeric|max:1000',
            'precio' => 'required|numeric|max:1000000',
            'proveedor_id' => 'required|numeric', // Asegura que 'proveedor_id' esté presente y sea numérico


        ];
        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);


        // $datosUsuario = request()->except('_token');
        
        $nombre = $request->input('nombre');
        $stock = $request->input('stock');
        $precio = $request->input('precio');
        $prov = $request->input('proveedor_id');
        $id = auth()->id();
        


        $datosProducto = [
            'nombre'=> $nombre,
            'stock'=> $stock,
            'precio'=> $precio,
            'alerta'=> 0,
            'id_proveedor'=> $prov,
            'user_cambio' => $id,
            'baja' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ];
        

        Producto::insert($datosProducto);
        return redirect('producto')->with('mensaje', 'Producto agregado con exito');

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
    public function edit($id_producto)
    {
        $producto = Producto::where('id_producto', $id_producto)->first();
        $id = $producto->id_proveedor;
        $proveedor = Proveedores::findOrFail($id);
        
        return view('producto.edit', compact('producto', 'proveedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'nombre'=>'required|string|max:100',
            'stock' => 'required|numeric|max:1000',
            'precio' => 'required|numeric|max:1000000',

        ];
        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);
       
        $nombre = $request->input('nombre');
        $stock = $request->input('stock');
        $precio = $request->input('precio'); 
        $prov = $request->input('proveedor_id');
        $id_cambio = auth()->id();

        $datosProducto = [
            'nombre'=> $nombre,
            'stock'=> $stock,
            'precio'=> $precio,
            'id_proveedor'=> $prov,
            'user_cambio' => $id_cambio,
            'updated_at' => now()
        ];
        

        Producto::where('id_producto', '=', $id)->update($datosProducto);
        return redirect ('producto')->with('mensaje', 'Cambio realizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        //
    }

    public function baja(Request $request, $id){
        $producto = Producto::findOrFail($id);
        $producto->baja = !$producto->baja;
        $producto->save();
        return redirect('/producto')->with('mensaje', 'Producto dado de Baja');
    }
}
