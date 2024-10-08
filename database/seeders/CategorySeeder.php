<?php

namespace Database\Seeders;

use App\Models\category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = collect([
            'Sans catégorie ❓', 'Plante Party 🌱', 'Raclette Party 🧀', 'Soirée Tuto 📚', 'Collock Party 🕒', 'Jeux de société 🎲', 'Jeux vidéo 🎮', 'Café ☕', 'Soirée 🎉', 'Danse 💃', 'Jeux de rôle 🎭',
            'Bowling 🎳', 'Cinéma 🎬', 'Pool party 🏊', 'Restaurant 🍽️', 'Apero Party 🍹',
        ]);

        $category->map(fn($category) => category::create([
            'name' => $category,
            'slug' => Str::slug($category),
            'image_url' => '/images/Categories/' . Str::slug($category) . '.jpg',
        ]));
    }
}
