<?php

namespace App\Models;

use App\Models\Game;
use App\Models\Player;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'player_id',
        'game_id',
        'status',
    ];

    /**
     * Status name list
     *
     * @var array
     */
    protected $statusList = [
        1 => 'Successful',
        2 => 'Failed',
    ];

    /**
     * Relations with player
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function player()
    {
        return $this->belongsTo(Player::class);
    }

    /**
     * Relations with game
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    /**
     * Accessor for status name attribute
     *
     * @return string
     */
    public function getStatusNameAttribute()
    {
        return $this->statusList[$this->status];
    }
}
