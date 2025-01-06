@ext@extends('layouts.app')

@section('content')
<h1>{{ isset($movie) ? 'Edit Movie' : 'Edit Genre' }}</h1>

<form action="{{ isset($movie) ? route('movies.update', $movie->id) : route('genres.update', $genre->id) }}" method="POST">
    @csrf
    @method('PUT')

    @if(isset($movie))
        <!-- Form untuk Edit Movie -->
        <label for="title">Title:</label>
        <input type="text" name="title" value="{{ $movie->title }}" required>

        <label for="synopsis">Synopsis:</label>
        <textarea name="synopsis" required>{{ $movie->synopsis }}</textarea>

        <label for="year">Year:</label>
        <input type="number" name="year" value="{{ $movie->year }}" required>

        <label for="genre_id">Genre:</label>
        <select name="genre_id" required>
            @foreach($genres as $genre)
                <option value="{{ $genre->id }}" {{ $genre->id == $movie->genre_id ? 'selected' : '' }}>{{ $genre->name }}</option>
            @endforeach
        </select>
    @else
        <!-- Form untuk Edit Genre -->
        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ $genre->name }}" required>
    @endif

    <button type="submit">Update</button>
</form>
@endsection
