<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /** @use HasFactory<\Database\Factories\CommentFactory> */
    use HasFactory;

    protected $fillable = [
        'blog_id',
        'name',
        'email',
        'website',
        'content',
    ];

    public function blog() {
        return $this->belongsTo(Blog::class);
    }
}
