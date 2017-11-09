<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class LeadboardResource extends Resource
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
            'name'    => $this->name,
            'points'  => (int) $this->points,
            'level'   => $this->level,
            'episode' => $this->episode,
        ];
    }
}
