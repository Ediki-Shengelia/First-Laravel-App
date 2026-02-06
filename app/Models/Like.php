<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use Notifiable;
    public function user()
    {
        $this->belongsTo(User::class);
    }
    protected $fillable = ['user_id', 'post_id'];
}
