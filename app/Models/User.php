<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'avatar',
        'birth',
        'gender',
        'password',
        'status',
        'remember_token',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Mối quan hệ với Notification thông qua bảng trung gian notification_user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function notifications()
    {
        return $this->belongsToMany(Notification::class, 'notification_user')
            ->withPivot('is_read', 'created_at')
            ->withTimestamps();
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
    public function bookTours()
    {
        return $this->hasMany(BookTour::class, 'user_id');
    }
}
