<?php

namespace App\Models;

use App\Models\Submission;
use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use CrudTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'points',
        'api_token',
        'reset_key',
        'meta',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($player) {
            if(empty($player->api_token)) {
                $player->api_token = str_random(60);
            }
        });
    }

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }

}
