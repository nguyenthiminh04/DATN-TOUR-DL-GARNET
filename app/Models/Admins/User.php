<?php

namespace App\Models\Admins;

use App\Models\Status;
use App\Models\Tour_Guide;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $table = 'users';  // Tên bảng thực sự trong cơ sở dữ liệu
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'avatar',
        'birth',
        'gender',
        'role_id',
        'password',
        'status',

    ];
    protected $cats = [
        'status' => 'boolean',
    ];
    public function Role()
    {
        return $this->belongsTo(Role::class);
    }
    // Định nghĩa quan hệ User có nhiều Tours
    public function tours()
    {
        return $this->hasMany(Tour::class);
    }
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
    public function categories()
    {
        return $this->hasMany(Category::class, 'user_id');
    }

    static public function getEmailSingle($email)
    {
        return User::where('email', '=', $email)->first();
    }

    static public function getTokenSingle($remember_token)
    {
        return User::where('remember_token', '=', $remember_token)->first();
    }

     // Quan hệ với TourGuide
     public function tourGuides()
     {
         return $this->hasMany(Tour_Guide::class, 'user_id');
     }
 
     // Quan hệ với các tour qua bảng tour_guides
     public function guideTours()
     {
         return $this->belongsToMany(Tour::class, 'tour_guides', 'user_id', 'tour_id');
     }
}
