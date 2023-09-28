<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use App\Models\rv;
use Illuminate\Http\Request;

class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $horaActual = now();
        return view('venta.index')->with('horaActual', $horaActual);
    
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
}
