<?php

namespace App\Models\Admins;

use App\Models\BookTour;
use App\Models\Favorite;
use GuzzleHttp\Psr7\Request;
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
        'category_tour_id',
    ];
    use SoftDeletes;
    protected $casts = [
        'status' => 'boolean',
    ];

    public static function getAll()
    {
        return self::all();
    }

    // Định nghĩa quan hệ Tour thuộc về User
    public function user()
    {
        return $this->belongsTo(UserModel::class);
    }
    public function imagetour()
    {
        return $this->hasMany(ImageTour::class);
    }
    // Định nghĩa quan hệ Tour thuộc về Location
    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
    public function guides()


    {
        return $this->hasMany(Coupons::class, 'tour_id');
    }
    public function category_tour()
    {
        return $this->belongsTo(Categoty_tour::class, 'tour_id');
    }

    public function scopeSearch($query, $searchTerm)
    {
        return $query->where('name', 'like', '%' . $searchTerm . '%');
            // ->orWhere('title', 'like', '%' . $searchTerm . '%')  
            // ->orWhere('description', 'like', '%' . $searchTerm . '%')
            // ->orWhere('content', 'like', '%' . $searchTerm . '%')
            // ->orWhere('journeys', 'like', '%' . $searchTerm . '%')
            // ->orWhere('schedule', 'like', '%' . $searchTerm . '%')
            // ->orWhere('move_method', 'like', '%' . $searchTerm . '%')
            // ->orWhere('starting_gate', 'like', '%' . $searchTerm . '%')
            // ->orWhere('start_date', 'like', '%' . $searchTerm . '%')
            // ->orWhere('end_date', 'like', '%' . $searchTerm . '%')
            // ->orWhere('price_old', 'like', '%' . $searchTerm . '%')
            // ->orWhere('price_children', 'like', '%' . $searchTerm . '%')
            // ->orWhere('sale', 'like', '%' . $searchTerm . '%');
    }

    public function images()
    {
        return $this->hasMany(ImageTour::class, 'tour_id');
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
    public function bookTours()
    {
        return $this->hasMany(BookTour::class, 'tour_id');
    }
}
