@extends('layouts.app')

@section('content')
<h1>{{ isset($movies) ? 'Movies List' : 'Genres List' }}</h1>

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        @if(isset($movies))
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Year</th>
                <th>Genre</th>
                <th>Actions</th>
            </tr>
        @else
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        @endif
    </thead>
    <tbody>
        @if(isset($movies))
            @foreach($movies as $index => $movie)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $movie->title }}</td>
                    <td>{{ $movie->year }}</td>
                    <td>{{ $movie->genre->name ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('movies.edit', $movie->id) }}">Edit</a>
                        <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this movie?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
            @foreach($genres as $index => $genre)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $genre->name }}</td>
                    <td>
                        <a href="{{ route('genres.edit', $genre->id) }}">Edit</a>
                        <form action="{{ route('genres.destroy', $genre->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this genre?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>

<a href="{{ isset($movies) ? route('movies.create') : route('genres.create') }}" style="margin-top: 20px; display: inline-block;">Add New {{ isset($movies) ? 'Movie' : 'Genre' }}</a>
@endsection
