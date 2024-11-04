<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'blog_id',
        'name',
        'email',
        'website',
        'comment',
    ];

    public function blog() {
        return $this->belongsTo(Blog::class);
    }

    public function scopeFilter($query, $filter)
    {
        // Filter by search keyword
        $query->when($filter['search'] ?? false, function($query, $search) {
            $query->where(function ($query) use($search) {
                $query->where('name', 'LIKE', '%' . $search . '%')
                    ->orWhere('email', 'LIKE', '%' . $search . '%')
                    ->orWhere('comment', 'LIKE', '%' . $search . '%');
            });
        });

        // Filter by blog ID
        $query->when($filter['blog_id'] ?? false, function ($query, $blog_id) {
            $query->where('blog_id', $blog_id);
        });
    }

}
