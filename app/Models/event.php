<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Str;

/**
 * @mixin IdeHelperevent
 */
class event extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'tag_id',
        'creator_id',
        'title',
        'description',
        'address',
        'city',
        'region',
        'is_IRL',
        'participant_max',
        'start_date'
    ];

    protected static function booted(): void
    {
        static::saving(function ($event) {
            if (empty($event->slug)) {
                $event->slug = Str::slug($event->title);
            }
        });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(category::class);
    }

    public function tag(): BelongsTo
    {
        return $this->belongsTo(tag::class);
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
