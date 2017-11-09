<?php

use App\Models\Player;

if(! function_exists('getPlayer')) {
    function getPlayer()
    {
        $token = request()->header('X-Auth-Token') ?: request()->get('api_token');

        return Player::where('api_token', $token)->first();
    }
}
