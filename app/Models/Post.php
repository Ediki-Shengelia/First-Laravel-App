<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Post extends Model
{
    public function isLikedByUser($user):bool
    {
        return $user ? $this->likes()->where('user_id', $user->id)->exists() : false;
    }
    use Notifiable;
    protected $fillable = ['title', 'content', 'user_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
