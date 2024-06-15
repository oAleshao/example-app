<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with('genre')->latest()->paginate(5);
        return view('admin.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::all()->pluck('name', 'id');
        $books = Book::orderBy('name')->get()->pluck('name', 'id');

        return view('admin.books.create', compact('genres', 'books'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:books,name',
            'genre_id' => 'exists:genres,id'
        ]);

        $book = Book::create($request->all());
        if ($request->image) {
            $path = $request->image->store('test');
            $book->image = 'storage/' . $path;
            $book->save();
        }
        $book->books()->sync($request->books);

        return to_route('books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $genres = Genre::all()->pluck('name', 'id');
        $books = Book::orderBy('name')->get()->pluck('name', 'id');

        return view('admin.books.edit', compact('genres', 'books', 'book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'name' => "required|unique:books,name,$book->id",
            'genre_id' => 'exists:genres,id'
        ]);

        $book->update($request->all());
        if ($request->image) {
            $path = $request->image->store('test');
            $book->image = 'storage/app' . $path;
            $book->save();
        }

        $book->books()->sync($request->books);

        return to_route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
