<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Str;

/**
 * @mixin IdeHelpercategory
 */
class category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'image_url'
    ];

    protected static function booted(): void
    {
        static::saving(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });
    }

//    public function getImageUrlAttribute($value)
//    {
//        return url($value);
//    }

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }
}
