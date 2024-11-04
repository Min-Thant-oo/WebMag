<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class SiteConfig extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo',
        'facebook',
        'twitter',
        'google',
        'github',
        'policy',
        'about',
        'email',
        'phone',
        'address',
        'contact_message',
    ];

    public function getLogoUrlAttribute(): string
    {
        if($this->logo) {
            return asset("storage/{$this->logo}");
        }
        return asset('blog/img/logo.png');
    }
}
