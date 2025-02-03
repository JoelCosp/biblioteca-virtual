<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Importamos los controladores necesarios
use App\Http\Controllers\BookController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/books', [BookController::class, 'index']); // Listar todos los libros
Route::post('/books', [BookController::class, 'store']); // Crear libro 
Route::get('/book/{id}', [BookController::class, 'show']); // Crear libro 
Route::put('/books/{id}', [BookController::class, 'update']); // Actualizar libro
Route::delete('/books/{id}', [BookController::class, 'destroy']); // Eliminar libro
