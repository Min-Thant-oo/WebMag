<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'subject',
        'message'
    ];

    public function scopeFilter($query, $filter)
    {
        $query->when($filter['search'] ?? false, function($query, $search) {
            $query->where(function ($query) use($search) {
                $query->where('email', 'LIKE', '%' . $search . '%')
                    ->orWhere('subject', 'LIKE', '%' . $search . '%')
                    ->orWhere('message', 'LIKE', '%' . $search . '%');
            });
        });
    }
    
}
