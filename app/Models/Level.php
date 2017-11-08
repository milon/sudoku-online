<?php

namespace App\Models;

use App\Models\Game;
use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use CrudTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'rank',
        'meta',
        'game_level',
    ];

    protected $casts = [
        'game_level' => 'array',
    ];

    public function games()
    {
        return $this->belongsToMany(Game::class)
            ->withPivot(['position'])
            ->withTimestamps();
    }
}
