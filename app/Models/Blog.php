<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    /** @use HasFactory<\Database\Factories\BlogFactory> */
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

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function status() {
        return $this->belongsTo(BlogStatus::class, 'blog_status_id');
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function view() {
        return $this->hasMany(BlogView::class);
    }

}
