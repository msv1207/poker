<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'cards',
        'user_id',
    ];
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function story()
    {
        return $this->hasMany(Story::class);
    }
}
