<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MovieSeeder extends Seeder
{
    public function run()
    {
        // Ambil ID genre dari tabel genres
        $genreId = DB::table('genres')->first()->id ?? Str::uuid();

        // Data awal untuk movies
        $movies = [
            [
                'id' => Str::uuid(),
                'title' => 'The Shawshank Redemption',
                'synopsis' => 'Two imprisoned men bond over a number of years.',
                'poster' => 'shawshank.jpg',
                'year' => 1994,
                'available' => true,
                'genre_id' => $genreId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'title' => 'The Godfather',
                'synopsis' => 'The aging patriarch of an organized crime dynasty transfers control.',
                'poster' => 'godfather.jpg',
                'year' => 1972,
                'available' => true,
                'genre_id' => $genreId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert ke database
        DB::table('movies')->insert($movies);
    }
}
