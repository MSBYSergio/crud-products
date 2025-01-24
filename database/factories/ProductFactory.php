<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Le concateno el nombre y el primer parámetro es la ruta donde se van a almacenar
        
        fake()->addProvider(new \Mmo\Faker\PicsumProvider(fake()));
        return [
            'nombre' => fake()->sentence(10, true),
            'descripcion' => fake()->text(40),
            'stock' => random_int(1, 100),
            'imagen' => "imagenes/" . fake()->picsum('public/storage/imagenes', 400, 400, false),
            'category_id' => Category::all()->random()->id
        ];
    }
}
