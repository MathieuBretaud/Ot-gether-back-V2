<?php

namespace Database\Seeders;

use App\Models\event_category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EventCategorySeeder extends Seeder
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

        $category->map(fn($category) => event_category::create([
            'name' => $category,
            'slug' => Str::slug($category),
            'image_url' => url('/images/Categories/' . Str::slug($category) . '.jpg'),
        ]));
    }
}
