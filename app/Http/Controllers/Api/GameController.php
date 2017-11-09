<?php

namespace App\Http\Controllers\Api;

use App\Models\Game;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\GameResource;

class GameController extends Controller
{
    public function index(Request $request)
    {
        $games = Game::when($request->name, function($query) use ($request) {
            return $query->where('name', 'like', "%{$request->name}%");
        })->paginate($request->get('limit', 10));

        return GameResource::collection($games);
    }
}
