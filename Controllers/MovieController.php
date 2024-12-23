<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Genre;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::with('genre')->get();
        return view('movies.index', compact('movies'));
    }


    public function create()
    {
        $genres = Genre::all();
        return view('movies.create', compact('genres'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'synopsis' => 'required',
            'year' => 'required|digits:4',
            'genre_id' => 'required|uuid',
        ]);

        Movie::create($request->all());

        return redirect()->route('movies.index')->with('success', 'Movie created successfully.');
    }
}