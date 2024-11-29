<?php

namespace App\Models\Admins;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class CategoryTour extends Model
{
    
    use HasFactory;
    protected $table = 'category_tour';  // Tên bảng trong cơ sở dữ liệu
    protected $fillable = [
        'tour_id',
        'category_tour',
        'price',
        'description',
        'status',
    ];
    Use SoftDeletes;
    public function tour()
    {
        return $this->hasMany(Tour::class);
    }
}
