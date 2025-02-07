<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::post('/usuario/create', [UsuarioController::class, 'crearUsuario']);
Route::get('/usuario/all', [UsuarioController::class, 'listarUsuarios']);
Route::get('/usuario/get/{id}', [UsuarioController::class, 'buscarUsuario']);
Route::put('/usuario/update/{id}', [UsuarioController::class, 'actualizarUsuario']);
Route::delete('/usuario/delete/{id}', [UsuarioController::class, 'eliminarUsuario']);
