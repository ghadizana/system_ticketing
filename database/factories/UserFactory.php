<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'userId' => fake()->unique()->numberBetween(1, 1000),
            'nama' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'username' => fake()->unique()->userName(),
            'password' => Hash::make('password'),
            'idProyek' => 'PRJ' . fake()->numberBetween(1, 100),
            'idKaryawan' => 'KRY' . fake()->unique()->numberBetween(1, 1000),
            'idGrupUser' => fake()->numberBetween(1, 10),
            'idDepartment' => 'DEP' . fake()->numberBetween(1, 10),
            'status' => fake()->randomElement(['Aktif', 'Tidak Aktif']),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return $this
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
