<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = [
        'title',
        'description',
        'category',
        'goal',
        'about',
        'image_url',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likedByUsers()
    {
        return $this->belongsToMany(User::class, 'user_likes');
    }

    public function favouritedByUsers()
    {
        return $this->belongsToMany(User::class, 'user_favourite');
    }

    public function donations()
{
    return $this->hasMany(Donation::class);
}

}
