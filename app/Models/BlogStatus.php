<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'color'
    ];

    public function blogs() {
        return $this->hasMany(Blog::class);
    }

    public function scopeFilter($query, $filter)
    {
        $query->when($filter['search'] ?? false, function ($query, $search) {
            $query->where("name", "like", "%$search%");
        });
    }
}
