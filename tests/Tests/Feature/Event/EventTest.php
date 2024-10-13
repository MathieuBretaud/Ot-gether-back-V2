<?php

namespace Tests\Feature\Event;

use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EventTest extends TestCase
{
    use RefreshDatabase;

    public function testEventCreatedWithGoodData(): void
    {
        $user = User::factory()->create();
        $category = Category::create(['name' => 'test']);
        $tag = Tag::create(['name' => 'testTag']);

        $response = $this->actingAs($user)->post('/api/events', [
            'category_id' => $category->id,
            'tag_id' => $tag->id,
            'creator_id' => $user->id,
            'title' => 'titre',
            'slug' => 'titre',
            'description' => 'description',
            'address' => 'address',
            'city' => 'city',
            'region' => 'region',
            'is_IRL' => true,
            'participant_max' => 10,
            'start_date' => Carbon::now(),
        ]);

        $response
            ->assertStatus(201)
            ->assertJson([
                'created_at' => true,
            ]);
    }

    public function testEventCreatedWithEmptyData(): void
    {
        $user = User::factory()->create();
        $category = Category::create(['name' => 'test']);
        $tag = Tag::create(['name' => 'testTag']);

        $response = $this->actingAs($user)->post('/api/events', [
            'category_id' => $category->id,
            'tag_id' => $tag->id,
            'creator_id' => $user->id,
            'slug' => 'titre',
            'description' => 'description',
            'address' => 'address',
            'city' => 'city',
            'region' => 'region',
            'is_IRL' => true,
            'participant_max' => 10,
            'start_date' => Carbon::now(),
        ]);

        $response
            ->assertStatus(422);
    }
}
