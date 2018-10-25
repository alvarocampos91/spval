<?php

namespace App\Http\Controllers;

use App\Usuario;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Usuario::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nuevo_usuario');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario = Usuario::create($request->all());
        $usuario->matricula = intval($request->all()["matricula"]);

        return response()->json($usuario,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(User $usuario)
    {
        return response()->json(DB::table('usuario')->select(DB::raw('users.id, usuario.matricula AS nombreUsuario, usuario.tipo AS tipoUsuario, usuario.img_perfil AS idImagenPerfil'))->
            join('users','users.name','=','usuario.matricula')->
            where('users.id','=',$usuario->id)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        return view('editar_area');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        $usuario->update($request->all());

        return response()->json($usuario, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();

        return response()->json($usuario, 200);
    }

    public function validar(Request $request)
    {
        return Usuario::validarUsuario($request->input('usuario'),$request->input('contrasena'));
    }
}
