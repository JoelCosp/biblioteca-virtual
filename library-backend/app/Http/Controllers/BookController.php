<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return response()->json($books);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validamos los datos que se reciben
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'img' => 'nullable|string',
        ]);
        // Creamos un libro con los datos recibidos
        $book = Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
            'img' => $request->img,
            'user_id' => auth()->id(), // Asigna manualmente el usuario autenticado
        ]);
        // Devolvemos respuesta JSON confirmando que se ha creado el libro
        return response()->json($book, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Buscar el libro por ID
        $book = Book::find($id);

        // Si no se encuentra, devolver un error 404
        if (!$book) {
            return response()->json(['message' => 'Libro no encontrado'], 404);
        }

        // Validamos los datos recibidos
        $validatedData = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'author' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|nullable|string',
            'img' => 'sometimes|nullable|url', // Si es una URL
        ]);

        // Actualizar el libro con los datos validados
        $book->update($validatedData);

        // Retornar la respuesta JSON una vez actualizado el libro
        return response()->json([
            'message' => 'Libro actualizado con éxito',
            'book' => $book
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        if($book)
        {
            $book->delete();
        }
    }
}
