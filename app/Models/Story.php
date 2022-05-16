<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
//    protected $fillable=['title', 'user_id', 'story_id'];
    use HasFactory;

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function choose()
    {
        return $this->hasMany(Choose::class);
    }
}
