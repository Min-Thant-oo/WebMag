<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogStatus extends Model
{
    /** @use HasFactory<\Database\Factories\BlogStatusFactory> */
    use HasFactory;

    public function blogs() {
        return $this->hasMany(Blog::class);
    }
}
