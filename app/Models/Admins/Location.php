<?php

namespace App\Models\Admins;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $table = 'locations';  // Tên bảng thực sự trong cơ sở dữ liệu
    protected $fillable = [
        'name',
        'slug',
        'image',
        'description',
        'content',
        'status ',
        'tour_id',
        'user_id',
    ];
    // Định nghĩa quan hệ Location có nhiều Tours
    public function tours()
    {
        return $this->hasMany(Tour::class);
    }
}
