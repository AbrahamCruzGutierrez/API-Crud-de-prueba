<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Juego extends Model
{
    protected $table = 'juego';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre', 'imagen'];
    public $timestamps = true;
}
