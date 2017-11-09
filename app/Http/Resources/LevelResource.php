<?php

namespace App\Http\Resources;

use App\Http\Resources\GameResource;
use Illuminate\Http\Resources\Json\Resource;

class LevelResource extends Resource
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
            'name'  => $this->name,
            'rank'  => $this->rank,
            'games' => GameResource::collection($this->whenLoaded('games')),
        ];
    }
}
