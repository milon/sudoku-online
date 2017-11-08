<?php

namespace App\Models;

use App\Models\Game;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable = [
        'name',
        'points_from',
        'points_to',
    ];

    public function games()
    {
        return $this->belongsToMany(Game::class)
            ->withPivot(['position'])
            ->withTimestamps();
    }
}
