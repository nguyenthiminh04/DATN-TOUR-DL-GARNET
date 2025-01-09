<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour_dates extends Model
{
    use HasFactory;
    protected $table = 'tour_dates';
    
    protected $fillable = [
        'tour_id',
        'tour_date',
    ];

}
