<?php

namespace Database\Factories;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categorias = Categoria::all()->pluck('id')->toArray();

        return [
            'nombre' => strtoupper(fake()->sentence(random_int(1, 5))),
            'precio' => fake()->randomFloat(2, 0, 1000000),
            'imagen' => fake()->imageUrl(),
            'descripcion' => fake()->sentence(),
            'categoria_id' => fake()->randomElement($categorias),
        ];
    }
}
