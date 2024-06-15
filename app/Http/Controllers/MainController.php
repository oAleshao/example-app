<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use App\Models\Review;
use Illuminate\Http\Request;

class MainController extends Controller
{
    function index()
    {

        $books = Book::latest()->limit(5)->get();
        $reviews = Review::latest()->limit(10)->get();
        return view('client.index', compact('books', 'reviews'));
    }

    function book(Book $book)
    {
        return view('client.book', compact('book'));
    }

    function genre(Genre $genre)
    {
        $books = Book::where('genre_id', '=', $genre->id)->latest()->get()->paginate();
        return view('client.book', compact('books'));
    }


    function contacts()
    {
        return view('client.contacts');
    }

    function sendEmail(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:255',
            'Email' => 'required|email',
            'message' => 'required'
        ]);

        //dd($request->all());
        //dump($request->name);
        //dump($request);
        //dump($_REQUEST);
        //return to_route('contacts');
        return back()->with('success', 'Thank!');
    }
}
