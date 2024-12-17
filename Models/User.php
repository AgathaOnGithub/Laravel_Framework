<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'email', 'password', 'email_verified_at', 'role_id'];
    public $incrementing = false; // Untuk UUID

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function profile()
    {
        return $this->hasOne(Profile::class, 'user_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'user_id');
    }
}

