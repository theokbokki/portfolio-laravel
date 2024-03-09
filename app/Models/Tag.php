<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Translatable\HasTranslations;

class Tag extends Model
{
    use HasFactory, HasTranslations, HasUuids;

    protected $fillable = [
        'text',
    ];

    public $translatable = [
        'text',
    ];

    public function post(): BelongsToMany
    {
        return $this->belongsToMany(Post::class)->using(PostTag::class);
    }
}
