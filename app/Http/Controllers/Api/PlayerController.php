<?php

namespace App\Http\Controllers\Api;

use App\Models\Level;
use App\Models\Submission;
use Illuminate\Http\Request;
use AbcAeffchen\sudoku\Sudoku;
use App\Http\Controllers\Controller;
use App\Http\Resources\GameResource;

class PlayerController extends Controller
{
    public function nextGame(Request $request)
    {
        $player = getPlayer();

        $playerLevel = $this->getPlayerLevel($player);
        $playerEpisode = $this->getPlayerEpisode($player);

        $level = Level::withCount('games')->where('rank', $playerLevel)->first();

        if(! $level) {
            return response()->json([
                'data' => [
                    'message' => 'No level available for this player',
                ]
            ], 404);
        }

        if($playerEpisode > $level->games_count) {
            $level = Level::withCount('games')->where('rank', $playerLevel + 1)->first();

            if(! $level) {
                return response()->json([
                    'data' => [
                        'message' => 'No level available for this player',
                    ]
                ], 404);
            }

            // update player profile
            $player->level = $level->rank;
            $player->episode = 1;
            $player->save();
        }

        $game = $level->games->filter(function($value, $key) use($player) {
            return $value->pivot->position == $player->episode;
        })->first();

        return new GameResource($game);
    }

    public function submitGame(Request $request)
    {
        $request->validate([
            'solution' => 'required|json'
        ]);

        $player = getPlayer();
        $playerLevel = $this->getPlayerLevel($player);

        $level = Level::where('rank', $playerLevel)->first();

        if(! $level) {
            return response()->json([
                'data' => [
                    'message' => 'No level available for this player',
                ]
            ], 404);
        }

        $playerEpisode = $this->getPlayerEpisode($player);

        $game = $level->games->filter(function($value, $key) use($playerEpisode) {
            return $value->pivot->position == $playerEpisode;
        })->first();

        if(! $game) {
            return response()->json([
                'data' => [
                    'message' => 'No game available for this level',
                ]
            ], 404);
        }

        if(Sudoku::checkSolution((array) json_decode($request->solution), (array) $game->problem)) {
            $this->updateSuccessfulSubmission($player, $game);

            return response()->json([
                'data' => [
                    'message' => 'Submission was successfully. Please try next level.',
                ]
            ]);
        }

        $this->updateFailedSubmission($player, $game);

        return response()->json([
            'data' => [
                'message' => 'Submission was failed. Please try again.',
            ]
        ]);
    }

    public function getPlayerLevel($player)
    {
        if(! $player->level) {
            $player->level = 1;
            $player->save();
        }

        return $player->level;
    }

    public function getPlayerEpisode($player)
    {
        if(! $player->episode) {
            $player->episode = 1;
            $player->save();
        }

        return $player->episode;
    }

    private function updateSuccessfulSubmission($player, $game)
    {
        Submission::create([
            'player_id' => $player->id,
            'game_id'   => $game->id,
            'status'    => 1, // 1 for successfully
        ]);

        // update player profile
        $player->episode = (int) $player->episode + 1;
        $player->points = (int) $player->points + (int) $game->score;
        $player->save();
    }

    private function updateFailedSubmission($player, $game)
    {
        Submission::create([
            'player_id' => $player->id,
            'game_id'   => $game->id,
            'status'    => 2, // 1 for failed
        ]);

        // update player profile
        $player->points = (int) $player->points - (int) $game->penalty;
        $player->save();
    }
}
