<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'creator' => $this->creator->pseudo,
            'description' => $this->description,
            'participant_max' =>$this->participant_max,
            'participants_count'=> $this->participants_count ?? 0,
            'category' => $this->category->name,
            'image_url' => $this->category->image_url,
            'start_date' => $this->start_date,
            'tag' => $this->tag->name,
            'is_IRL' => $this->is_IRL,
            'city' => $this->city ?? '',
            'region' => $this->region ?? ''
        ];
    }
}
