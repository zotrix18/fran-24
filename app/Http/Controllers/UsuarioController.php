<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $datos['usuarios'] = User::select('id','apellido', 'nombre', 'username', 'suspendido')->paginate(5);

        
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

        $campos=[
            'apellido'=>'required|string|max:100',
            'nombre'=> 'required|string|max:100',
            'username'=> 'required|string|unique:Users|max:100',
            
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);


        // $datosUsuario = request()->except('_token');
        
        $apellido = $request->input('apellido');
        $nombre = $request->input('nombre');
        $usuario = $request->input('username');
        $pass = $request->input('pass');
        $hashedPass = Hash::make($pass);


        $datosUsuario = [
            'apellido'=> $apellido,
            'nombre'=> $nombre,
            'username'=> $usuario,
            'password'=> $hashedPass,
            'suspendido'=>0
        ];
        

        $user = User::create($datosUsuario);
        $user->assignRole('Vendor');
        return redirect('usuario')->with('mensaje', 'Usuario agregado con exito');
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
        $usuario = User::findOrFail($id);
        return view('usuario.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        $campos=[
            'apellido'=>'required|string|max:100',
            'nombre'=> 'required|string|max:100',
            'username'=> 'required|string|max:100',
            
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);


        $apellido = $request->input('apellido');
        $nombre = $request->input('nombre');
        $usuario = $request->input('username');
        
        $pass = $request->input('pass');
        $hashedPass = Hash::make($pass);

        if(empty($request->input('pass'))){
            $datosUsuario = [
                'apellido'=> $apellido,
                'nombre'=> $nombre,
                'username'=> $usuario,
                'suspendido'=>0
            ];
        }else{
            $datosUsuario = [
                'apellido'=> $apellido,
                'nombre'=> $nombre,
                'username'=> $usuario,
                'password'=> $hashedPass,
                'suspendido'=>0
            ];
        }
        
        User::where('id', '=', $id)->update($datosUsuario);
        $usuario = User::findOrFail($id);
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
        $usuario = User::findOrFail($id);
        $usuario->suspendido = !$usuario->suspendido;
        $usuario->save();
        return redirect('/usuario')->with('mensaje', 'Empleado suspendido');
    }
    

    
}
