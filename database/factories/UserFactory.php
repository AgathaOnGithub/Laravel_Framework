<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'id' => Str::uuid(),
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt('password'), // Default password
            'role_id' => Role::inRandomOrder()->first()->id ?? Role::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
