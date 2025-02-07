<?php

namespace App\Dtos;

class Response
{
    public int $status;
    public string $message;
    public $data;

    /**
     * Código de estado HTTP para una solicitud exitosa.
     */
    public const OK = 200;
    /**
     * Código de estado HTTP para una creación exitosa.
     */
    public const CREATED = 201;
    /**
     * Código de estado HTTP para una solicitud incorrecta.
     */
    public const BAD_REQUEST = 400;
    /**
     * Código de estado HTTP para una solicitud no autorizada.
     */
    public const UNAUTHORIZED = 401;
    /**
     * Código de estado HTTP para una solicitud prohibida.
     */
    public const FORBIDDEN = 403;
    /**
     * Código de estado HTTP para un recurso no encontrado.
     */
    public const NOT_FOUND = 404;
    /**
     * Código de estado HTTP para un error interno del servidor.
     */
    public const INTERNAL_SERVER_ERROR = 500;

    /**
     * Crea una respuesta de error.
     * 
     * @param string $message El mensaje de error.
     * @param int $codigo El código de estado HTTP.
     * @param mixed $data Los datos adicionales de la respuesta, opcional.
     * @return Response La respuesta de error.
     */
    public static function error(string $message, int $codigo, $data = null){
        $respuesta = new Response();
        $respuesta->status = $codigo;
        $respuesta->message = $message;
        $respuesta->data = $data;
        return $respuesta;
    }

    /**
     * Crea una respuesta de éxito.
     * 
     * @param string $message El mensaje de éxito.
     * @param mixed $data Los datos de la respuesta.
     * @param bool $codRegistro Indica si se ha creado un registro.
     * @return Response La respuesta de éxito.
     */
    public static function success(string $message, $data, bool $codRegistro = false){
        $respuesta = new Response();
        $respuesta->status = $codRegistro ? self::CREATED : self::OK;
        $respuesta->message = $message;
        $respuesta->data = $data;
        return $respuesta;
    }

}
