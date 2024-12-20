<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour_Guide extends Model
{
    use HasFactory;
    protected $table = 'tour_guides';

    protected $fillable = [
        'tour_id',
        'user_id',
    ];

    // Quan hệ với bảng tours
    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }

    // Quan hệ với bảng users
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
