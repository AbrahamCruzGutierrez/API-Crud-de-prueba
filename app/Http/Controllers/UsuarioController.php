<?php

namespace App\Http\Controllers;

use App\Facade\UsuarioFacade;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsuarioController extends Controller{

    public function crearUsuario(Request $request){
        $respuesta = UsuarioFacade::crearUsuario($request);
        return response()->json($respuesta, $respuesta->status);
    }

    public function listarUsuarios(){
        $respuesta = UsuarioFacade::listarUsuarios();
        return response()->json($respuesta, $respuesta->status);
    }

    public function buscarUsuario(int $id){
        $respuesta = UsuarioFacade::buscarUsuario($id);
        return response()->json($respuesta, $respuesta->status); 
    }

    public function actualizarUsuario(Request $request, int $id){
        $respuesta = UsuarioFacade::actualizarUsuario($request, $id);
        return response()->json($respuesta, $respuesta->status);  
    }

    public function eliminarUsuario(int $id){
        $respuesta = UsuarioFacade::eliminarUsuario($id);
        return response()->json($respuesta, $respuesta->status); 
    }

}