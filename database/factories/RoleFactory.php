<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RoleFactory extends Factory
{
    protected $model = Role::class;

    public function definition()
    {
        return [
            'id' => Str::uuid(),
            'name' => $this->faker->randomElement(['Admin', 'User', 'Guest']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}