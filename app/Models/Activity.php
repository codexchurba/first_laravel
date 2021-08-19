<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'duedate',
    ];

    public function scopeSearch($query, $term) 
    {
        $term = "%$term%";

        $query->where(function($query) use ($term)
        {
            $query->where('title', 'like', $term);

        });
    }
}
