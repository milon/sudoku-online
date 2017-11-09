<?php

namespace App\Models;

use App\Models\Game;
use App\Models\Player;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $fillable = [
        'player_id',
        'game_id',
        'status',
    ];

    protected $statusList = [
        1 => 'Successful',
        2 => 'Failed',
    ];

    public function player()
    {
        return $this->belongsTo(Player::class);
    }

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function getStatusNameAttribute()
    {
        return $this->statusList[$this->status];
    }
}
