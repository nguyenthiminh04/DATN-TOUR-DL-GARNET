<?php

namespace App\Models\Admins;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tour extends Model
{
    use HasFactory;
    protected $table = 'tours';  // Tên bảng thực sự trong cơ sở dữ liệu
    protected $fillable = [
        'name',
        'title',
        'journeys',
        'schedule',
        'move_method',
        'starting_gate',
        'start_date',
        'end_date',
        'number_guests',
        'price_old',
        'price_children',
        'sale',
        'view',
        'description',
        'content',
        'image',
        'location_id',
        'user_id',
        'album_img',
        'status',
    ];
    use SoftDeletes;
    protected $cats = [
        'status' => 'boolean',
    ];
// Định nghĩa quan hệ Tour thuộc về User
public function user()
{
    return $this->belongsTo(UserModel::class);
}

// Định nghĩa quan hệ Tour thuộc về Location
public function location()
{
    return $this->belongsTo(Location::class);
}
public function guides()
    {
        return $this->hasMany(Coupons::class, 'tour_id');
    }
}
