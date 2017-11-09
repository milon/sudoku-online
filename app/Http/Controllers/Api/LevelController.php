<?php

namespace App\Http\Controllers\Api;

use App\Models\Level;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\LevelResource;

class LevelController extends Controller
{
    public function index(Request $request)
    {
        $levels = Level::when($request->name, function($query) use ($request) {
            return $query->where('name', 'like', "%{$request->name}%");
        })->paginate($request->get('limit', 10));

        return LevelResource::collection($levels);
    }

    public function show(Level $level)
    {
        $level->load(['games']);

        return new LevelResource($level);
    }
}
