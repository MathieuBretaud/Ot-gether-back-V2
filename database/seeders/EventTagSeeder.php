<?php

namespace Database\Seeders;

use App\Models\event_tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tag = collect(['En cours', 'Terminé', 'Supprimé', 'Fermé']);
        $tag->map(fn($tag) => event_tag::create([
            'name' => $tag,
        ]));
    }
}
