<?php

namespace App\Facade;

use Illuminate\Support\Facades\Facade;

class UsuarioFacade extends Facade{
    protected static function getFacadeAccessor(){
        return 'usuario.service';
    }
}

