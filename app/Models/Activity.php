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

    public function title() {
        return $this->belongsTo(Title::class, 'title_id');
    }
}
