<?php

namespace App;

use App\Concerns\Models\Postable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Story extends Model
{
    use Postable;

    protected $table = 'stories';

    protected $fillable = [
        'title',
        'slug',
        'content',
    ];

    protected $appends = [
        'url',
    ];

    public function getUrlAttribute(): string
    {
        return route('story.view', $this->slug);
    }

    public function scopeSlugIs(Builder $query, string $slug): Builder
    {
        return $query->where('slug', $slug);
    }
}
