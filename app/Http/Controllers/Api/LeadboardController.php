<?php

namespace App\Http\Controllers\Api;

use App\Models\Player;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\LeadboardResource;

class LeadboardController extends Controller
{
    public function index()
    {
        $players = Player::orderBy('points', 'desc')->take(10)->get();

        return LeadboardResource::collection($players);
    }
}
