<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            'Informática' => "#50b8c8",
            'Ocio' => "#e4bf41",
            'Social' => "#a4e441",
            'Limpieza' => "#41e4bf",
            'Bazar' => "#e47041",
        ];
        foreach ($categorias as $nombre => $color) {
            Category::create(compact('nombre','color'));
        }
    }
}
