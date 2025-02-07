<?php

namespace App\Services;

use App\Dtos\Response;
use App\Models\Cuenta;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsuarioService{

    public function listarUsuarios(){
        $respuesta = null;
        try {
            $listaUsuarios = Usuario::all();
            $mensaje = $listaUsuarios->isEmpty() ? 'No existe ningún usuario registrado' : 'Lista de usuarios obtenidos';
            $respuesta = Response::success($mensaje, $listaUsuarios);
        } catch (\Throwable $th) {
            $respuesta = Response::error('Hubo un error interno a nivel de servidor', Response::INTERNAL_SERVER_ERROR);
        }

        return $respuesta;
    }

    public function buscarUsuario(int $id){
        $respuesta = null;
        try {
            $usuario = Usuario::find($id);
            if (!$usuario) {
                $respuesta = Response::error('El usuario no existe', Response::NOT_FOUND);
            } else {
                $respuesta = Response::success('Usuario obtenido correctamente', $usuario);
            }
        } catch (\Throwable $th) {
            $respuesta = Response::error('Hubo un error interno a nivel de servidor', Response::INTERNAL_SERVER_ERROR);
        }

        return $respuesta;
    }

    public function crearUsuario(Request $request){
        $respuesta = null;
        try {
            $validador = Validator::make($request->all(), [
                'nombre' => 'required|string|max:255',
                'correo' => 'required|email|unique:usuario',
                'edad' => 'required|integer|min:0'],
            ['correo.unique' => 'El email ya está registrado']);

            if($validador->fails()){
                $respuesta = Response::error($validador->errors()->first(), Response::BAD_REQUEST);
            }else{
                $usuario = new Usuario();
                $usuario->nombre = $request->nombre;
                $usuario->correo = $request->correo;
                $usuario->edad = $request->edad;
                $usuario->save();

                $respuesta = Response::success('Usuario creado correctamente', $usuario, true);
            }
        } catch (\Throwable $th) {
            $respuesta = Response::error('Hubo un error interno a nivel de servidor ' . $th->getMessage(), Response::INTERNAL_SERVER_ERROR);
        }

        return $respuesta;
    }

    public function actualizarUsuario(Request $request, int $id){
        $respuesta = null;
        try {
            $usuario = Usuario::find($id);
            if (!$usuario) {
                $respuesta = Response::error('El usuario que trata de actualizar no existe', Response::NOT_FOUND);
            } else {
                $datos = $request->all();

                $validador = Validator::make($datos, [
                    'nombre' => 'required|string|max:255',
                    'edad' => 'required|integer|min:0']);
                
                if($usuario->correo != $datos['correo']){
                    $validador = Validator::make($datos, [
                        'nombre' => 'required|string|max:255',
                        'edad' => 'required|integer|min:0',
                        'correo' => 'required|email|unique:usuario'],
                        ['correo.unique' => 'El email ya está registrado']);
                }

                if($validador->fails()){
                    $respuesta = Response::error($validador->errors()->first(), Response::BAD_REQUEST);
                }else{
                    $usuario->nombre = $request->has('nombre') ? $request->nombre : $usuario->nombre;
                    $usuario->correo = $request->has('correo') ? $request->correo : $usuario->correo;
                    $usuario->edad = $request->has('edad') ? $request->edad : $usuario->edad;
                    $usuario->save();
    
                    $respuesta = Response::success('Usuario actualizado correctamente', $usuario);
                }
            }
        } catch (\Throwable $th) {
            $respuesta = Response::error('Hubo un error interno a nivel de servidor', Response::INTERNAL_SERVER_ERROR);
        }

        return $respuesta;
    }

    public function eliminarUsuario(int $id){
        $respuesta = null;
        try {
            $usuario = Usuario::find($id);
            if (!$usuario) {
                $respuesta = Response::error('El usuario que se trata de eliminar no existe', Response::NOT_FOUND);
            } else {
                $cuenta = Cuenta::where('usuario_id')->get();
                if ($cuenta->isNotEmpty()) {
                    $respuesta = Response::error('El usuario tiene juegos asociados. Debe eliminar todos los juegos antes de eliminar el usuario.', Response::BAD_REQUEST);
                } else {
                    $usuario->delete();
                    $respuesta = Response::success('Usuario eliminado correctamente', null);
                }
            }
        } catch (\Throwable $th) {
            $respuesta = Response::error('Hubo un error interno a nivel de servidor', Response::INTERNAL_SERVER_ERROR);
        }

        return $respuesta;
    }

}