<?php

namespace App\Models;

use App\Models\Level;
use Backpack\CRUD\CrudTrait;
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
}
