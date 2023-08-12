<?php

namespace App\Http\Controllers;
use App\Models\Usuario;
use Redirect;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function index(){
        $usuarios = Usuario::get();


        return view('usuarios.list', ['usuarios' => $usuarios]);
    }

    public function new(){
        return view('usuarios.form');
    }

    public function add( Request $request ){
        $usuario = new Usuario;
        $usuario = $usuario->create($request->all());

        return Redirect::to('/usuarios');
    }
}
