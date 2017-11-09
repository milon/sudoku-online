<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class GameResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'grid_size' => $this->grid_size,
            'difficulty' => $this->difficulty,
            'problem' => $this->problem,
            'score' => $this->score,
            'penalty' => $this->penalty,
            'position' => $this->whenPivotLoaded('game_level', function() {
                return $this->pivot->position;
            }),
        ];
    }
}
