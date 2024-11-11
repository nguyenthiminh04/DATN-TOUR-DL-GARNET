<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $table = 'notifications';

    protected $fillable = [
        'content', 
        'status'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'notification_user');
    }
}
