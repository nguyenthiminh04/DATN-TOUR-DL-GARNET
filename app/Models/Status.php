<?php

namespace App\Models;

use App\Models\Admins\Location;
use App\Models\Admins\UserModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $table = 'status';

    protected $fillable = [
        'status_name',
        'description',
        'type',
    ];

    public function faqs()
    {
        return $this->hasMany(Faq::class);
    }
    public function user()
    {
        return $this->hasMany(UserModel::class);
    }
    public function location()
    {
        return $this->hasMany(Location::class);
    }
}
