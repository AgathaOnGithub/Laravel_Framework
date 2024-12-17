<?php

namespace Database\Factories;

use App\Models\Movie;
use App\Models\Genre;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MovieFactory extends Factory
{
    protected $model = Movie::class;

    public function definition()
    {
        return [
            'id' => Str::uuid(),
            'title' => $this->faker->sentence(3),
            'synopsis' => $this->faker->paragraph(),
            'poster' => $this->faker->imageUrl(300, 450, 'movies'),
            'year' => $this->faker->year(),
            'available' => $this->faker->boolean(80), // 80% true
            'genre_id' => Genre::inRandomOrder()->first()->id ?? Genre::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
