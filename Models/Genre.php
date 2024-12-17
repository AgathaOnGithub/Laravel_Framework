<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name'];
    public $incrementing = false;

    public function movies()
    {
        return $this->hasMany(Movie::class, 'genre_id');
    }
}
