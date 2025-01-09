<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guide_tours extends Model
{
    use HasFactory;

    protected $table = 'guide_tours';

    protected $fillable = [
        'guide_id',
        'tour_id',
        'assigned_at',
    ];

    // Quan hệ với bảng guides (một bản ghi thuộc về một hướng dẫn viên)
    public function guide()
    {
        return $this->belongsTo(Guide::class, 'guide_id');
    }
    // Quan hệ với bảng tours
    public function tour()
    {
        return $this->belongsTo(Tour::class, 'tour_id');
    }
}
