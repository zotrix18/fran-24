<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $datos['usuarios'] = Usuario::select('id','apellido', 'nombre', 'nivel_acceso', 'user')->paginate(5);

        return view('usuario.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $datosUsuario = request()->except('_token');
        $apellido = $request->input('apellido');
        $nombre = $request->input('nombre');
        $usuario = $request->input('user');
        $pass = $request->input('pass');
        $hashedPass = Hash::make($pass);


        $datosUsuario = [
            
            'apellido'=> $apellido,
            'nombre'=> $nombre,
            'nivel_acceso' => 1,
            'user'=> $usuario,
            'pass'=> $hashedPass,
            'activo'=>1
        ];
        // $datosUsuario

        Usuario::insert($datosUsuario);
         return response()->json($datosUsuario);
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuario.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        $apellido = $request->input('apellido');
        $nombre = $request->input('nombre');
        $nivel_acceso = $request->input('nivel_acceso');
        $usuario = $request->input('user');
        $pass = $request->input('pass');
        $hashedPass = Hash::make($pass);


        $datosUsuario = [
            
            'apellido'=> $apellido,
            'nombre'=> $nombre,
            
            'user'=> $usuario,
            'pass'=> $hashedPass,
            'activo'=>1
        ];
        Usuario::where('id', '=', $id)->update($datosUsuario);
        $usuario = Usuario::findOrFail($id);
        return view('usuario.edit', compact('usuario'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        //
    }

    public function suspender(Request $request, $id){
        $usuario = Usuario::findOrFail($id);
        $usuario->activo = !$usuario->activo;
        $usuario->save();
        return redirect('/usuario');
    }
    

    
}
