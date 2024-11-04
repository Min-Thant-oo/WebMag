<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'thumbnail',
        'image',
        'title',
        'slug',
        'content',
        'blog_status_id',
        'category_id',
        'published_at',
        'user_id',
        'is_featured',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function blog_status() {
        return $this->belongsTo(BlogStatus::class, 'blog_status_id');
    }

    public function blog_comments() {
        return $this->hasMany(Comment::class);
    }

    public function blog_views() {
        return $this->hasMany(BlogView::class);
    }

    public function getThumbnailUrlAttribute()
    {
        if($this->thumbnail) {
            return asset("storage/{$this->thumbnail}");
        }

        $random_width = rand(725, 750);
        $random_height = rand(425, 450);
        return "https://picsum.photos/$random_width/$random_height/";
    }

    public function getImageUrlAttribute()
    {
        if($this->image) {
            return asset("storage/{$this->image}");
        }
        
        $random_width = rand(725, 750);
        $random_height = rand(425, 450);
        return "https://picsum.photos/$random_width/$random_height/";
    }

    public function scopeFilter($query, $filter)
    {
        $query->when($filter['search'] ?? false, function($query, $search) {
            $query->where(function ($query) use($search) {
                $query->where('title', 'LIKE', '%' . $search . '%')
                    ->orWhere('content', 'LIKE', '%' . $search . '%');
                // $query->where("title", "like", "%$search%")
                //     ->orWhere("content", "like", "%$search%");
            });
        });

        $query->when($filter['blog_status_id'] ?? false, function ($query, $blog_status_id) {
            $query->where('blog_status_id', $blog_status_id);
        });

        $query->when($filter['category_id'] ?? false, function ($query, $category_id) {
            $query->where('category_id', $category_id);
        });
    }

}
