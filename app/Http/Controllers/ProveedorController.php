<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Proveedores;
use App\Models\User;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos['categorias'] = Categorias::select('id_categoria', 'nombre')->get();
        $datos['usuarios'] = User::select('id','apellido','nombre','username')->get();
        $datos['proveedores'] = Proveedores::select('id_proveedor','nombre')->get();
        return view('proveedor.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proveedor.create');
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
        $cat = $request->input('categoria_id');

        $datosProveedor = [
            'nombre'=> $nombre,
            'id_categoria' => $cat,
            'user_cambio' => $id,
            'baja' => 0,
            'created_at' => now(),
            'updated_at' => now()

        ];
        
        Proveedores::create($datosProveedor);
        
        return redirect('proveedor')->with('mensaje', 'Proveedor agregada con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Proveedor $proveedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proveedor $proveedor)
    {
        //Reemplazado por modal
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_cat)
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

        $datosproveedor = [
            'nombre'=> $nombre,
            'user_cambio' => $id,
            'updated_at' => now()

        ];

        Proveedores::where('id_proveedor', '=', $id_cat)->update($datosproveedor);
        return redirect ('proveedor')->with('mensaje', 'Cambio realizado');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(proveedor $proveedor)
    {
        //
    }

    public function baja(Request $request, $id){
        $proveedor = Proveedores::findOrFail($id);
        $proveedor->baja = !$proveedor->baja;
        $proveedor->save();
        return redirect('/proveedor')->with('mensaje', 'Categoria dada de Baja');
    }
}
