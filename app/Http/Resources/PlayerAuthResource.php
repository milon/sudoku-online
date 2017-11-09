<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class PlayerAuthResource extends Resource
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
            'name'      => $this->name,
            'email'     => $this->email,
            'api_token' => $this->api_token,
            'points'    => $this->points,
            'level'     => $this->level,
            'episode'   => $this->episode,
        ];
    }
}
