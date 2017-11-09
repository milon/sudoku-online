<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Player;

class PlayerAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = $request->header('X-Auth-Token') ?: $request->api_token;

        if (empty($token)) {
            return response()->json([
                'data' => [
                    'message' => "Unable to authenticate without valid token.",
                ]
            ])->setStatusCode(401);
        }

        $player = Player::where('api_token', $token)->first();

        if(! $player) {
            return response()->json([
                'data' => [
                    'message' => "Unable to authenticate with invalid token.",
                ]
            ])->setStatusCode(401);
        }

        return $next($request);
    }
}
