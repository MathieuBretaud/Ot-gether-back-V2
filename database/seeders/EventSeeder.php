<?php

namespace Database\Seeders;

use App\Models\event;
use App\Models\category;
use App\Models\tag;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = category::where('id', '!=', 1)->get();
        $tags = tag::all();
        $users = User::all();

        Event::factory()
            ->count(25)
            ->sequence(function () use ($categories, $tags, $users) {
                $category = $categories->random();
                return [
                    'category_id' => $category->id,
                    'tag_id' => $tags->random()->id,
                    'creator_id' => $users->random()->id,
//                    'picture' => $category->image_url,
                ];
            })
            ->afterCreating(function (Event $event) use ($users) {
                $participantCount = min(rand(1, $event->participant_max), $users->count());
                $participants = $users->random($participantCount);
                $event->participants()->attach($participants);
            })
            ->create();
    }
}
