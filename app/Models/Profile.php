<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'points',
        'meta',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
