<?php

namespace Database\Factories;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AksesMenu>
 */
class AksesMenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'idAksesMenu' => fake()->unique()->numberBetween(1, 15),
            'idMenu' => Menu::inRandomOrder()->first()->idMenu,
            'deskripsi' => fake()->sentence(3),
            'label' => fake()->sentence(1),
        ];
    }
}
