<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'content',
        'image',
        'published_at',
        'featured',
    ];

    protected $casts = [
        'published_at' => 'datetime'
    ];

    protected $appends = [
        'image_url'
    ];

    public function scopePublished($query)
    {
        $query->where('published_at', '<=', now());
    }

    public function scopeFeatured($query)
    {
        $query->where('featured', true);
    }

    public function scopeWithCategory($query, string $category)
    {
        $query->when($category, function ($query) use ($category) {
            $query->whereHas('categories', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        });
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'post_like')->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getImageUrlAttribute()
    {
        return str_contains($this->image, 'http') ? $this->image : Storage::url($this->image);
    }

    public function getExcerpt()
    {
        return Str::limit(strip_tags($this->content), 150);
    }

    public function getReadingTime()
    {
        return round(str_word_count($this->content) / 250) ?: 1;
    }
}
