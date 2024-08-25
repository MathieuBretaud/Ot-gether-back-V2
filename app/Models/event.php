<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class event extends Model
{
    use HasFactory;

    public function category(): BelongsTo
    {
        return $this->belongsTo(event_category::class);
    }

    public function tag(): BelongsTo
    {
        return $this->belongsTo(event_tag::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function participants(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'event_user');
    }
}
