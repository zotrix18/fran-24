<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use App\Models\rv;
use App\Models\Producto;
use Illuminate\Http\Request;

class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $horaActual = now();
        $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
         
        $fecha [0] = $dias[date('w')];
        $fecha [1] = date('d')." de ".$meses[date('n')-1];

        $productos = Producto::select('id_producto','nombre', 'stock', 'precio', 'alerta', 'id_proveedor')->get();
        $productosJson = json_encode($productos);
        
        return view('venta.index', compact('horaActual', 'fecha', 'productosJson'));
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(rv $rv)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(rv $rv)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, rv $rv)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(rv $rv)
    {
        //
    }

    public function productosAjax()
    {
    $productos = Producto::select('id_producto','nombre', 'stock', 'precio', 'alerta', 'id_proveedor')->get();
    return response()->json(['productosJson' => $productos]);
    }

}
