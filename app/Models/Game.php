<?php

namespace App\Models;

use App\Models\Level;
use App\Models\Submission;
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

    /**
     * Attributes that will be casted automatically
     *
     * @var array
     */
    protected $casts = [
        'problem'  => 'array',
        'solution' => 'array',
    ];

    /**
     * Relations with level
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function levels()
    {
        return $this->belongsToMany(Level::class)
            ->withPivot(['position'])
            ->withTimestamps();
    }

    /**
     * Relations with submissions
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }

    /**
     * This method will run every time an operation run
     *
     * @return null
     */
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
