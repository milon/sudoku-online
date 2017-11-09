<?php

namespace App\Http\Controllers\Api;

use App\Models\Level;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\LevelResource;

class LevelController extends Controller
{
    /**
     * Get level list
     *
     * @param  Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $levels = Level::when($request->name, function($query) use ($request) {
            return $query->where('name', 'like', "%{$request->name}%");
        })->paginate($request->get('limit', 10));

        return LevelResource::collection($levels);
    }

    /**
     * Get a level details with games associated
     *
     * @param  Level  $level
     * @return mixed
     */
    public function show(Level $level)
    {
        $level->load(['games']);

        return new LevelResource($level);
    }
}
