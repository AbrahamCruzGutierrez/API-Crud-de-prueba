<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    protected $table = 'cuenta';
    protected $primaryKey = 'id';
    protected $fillable = ['usuario_id', 'juego_id'];
    public $timestamps = true;
}
