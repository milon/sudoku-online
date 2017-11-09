<?php

namespace App\Http\Controllers\Api;

use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Resources\PlayerAuthResource;

class PlayerAuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|unique:players|email',
            'password' => 'required',
        ]);

        $player = Player::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return new PlayerAuthResource($player);
    }

    public function getAccessToken(Request $request)
    {
        $request->validate([
            'email'    => 'required',
            'password' => 'required',
        ]);

        $player = Player::where('email', $request->email)->first();

        if(! $player) {
            return response()->json([
                'data' => [
                    'message' => "Unable to authenticate with wrong credential.",
                ]
            ])->setStatusCode(401);
        }

        if(Hash::check($request->password, $player->password)) {
            return new PlayerAuthResource($player);
        }

        return response()->json([
            'data' => [
                'message' => "Unable to authenticate with wrong credential.",
            ]
        ])->setStatusCode(401);
    }

    public function passwordResetRequest(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:players,email',
        ]);

        $player = Player::where('email', $request->email)->first();
        $player->reset_key = str_random(15);
        $player->save();

        Mail::raw("Your Password Reset Key is: {$player->reset_key} \n\n--\nSudoku Ninja Team", function ($message) use ($player) {
            $message->from(config('mail.from.address'), config('mail.from.name'));
            $message->subject('Password Reset Key of Sudoku Ninja');
            $message->to($player->email);
        });

        return response()->json([
            'data' => [
                'message' => 'Password reset key sent to your email',
            ],
        ]);
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'email'     => 'required|email|exists:players',
            'reset_key' => 'required',
            'password'  => 'required',
        ]);

        $player = Player::where([
            ['reset_key', $request->reset_key],
            ['email', $request->email],
        ])->first();

        if(! $player) {
            return response()->json([
                'data' => [
                    'message' => 'Email and Reset Key does not match.'
                ]
            ], 422);
        }

        $player->reset_key = null;
        $player->password = bcrypt($request->password);
        // $player->api_token = str_random(60);    // if you want to change api_token as well
        $player->save();

        return response()->json([
            'data' => [
                'message' => 'Password changed successfully.'
            ]
        ]);

    }
}
