<?php

namespace Database\Seeders;

use App\Models\tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tag = collect(['En cours', 'Terminé', 'Supprimé', 'Fermé']);
        $tag->map(fn($tag) => tag::create([
            'name' => $tag,
        ]));
    }
}
