<?php

namespace App\Models;

use App\Models\Level;
use Backpack\CRUD\CrudTrait;
use AbcAeffchen\sudoku\Sudoku;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use CrudTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'grid_size',
        'difficulty',
        'problem',
        'solution',
        'score',
        'penalty',
        'meta',
    ];

    protected $casts = [
        'problem'  => 'array',
        'solution' => 'array',
    ];

    public function levels()
    {
        return $this->belongsToMany(Level::class)
            ->withPivot(['position'])
            ->withTimestamps();
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($game) {
            list($problem, $solution) = Sudoku::generateWithSolution((int) $game->grid_size, $game->difficulty);
            $game->problem = $problem;
            $game->solution = $solution;
        });
        static::updating(function ($game) {
            list($problem, $solution) = Sudoku::generateWithSolution((int) $game->grid_size, $game->difficulty);
            $game->problem = $problem;
            $game->solution = $solution;
        });
    }

}
