<?php

namespace App\Http\ViewComposers;

use App\Models\Game;
use App\Models\Level;
use App\Models\Player;
use Illuminate\View\View;
use App\Models\Submission;

class DashboardComposer
{
    public function compose(View $view)
    {
        $view->with('games_count', Game::count());
        $view->with('levels_count', Level::count());
        $view->with('players_count', Player::count());
        $view->with('submission_count', Submission::count());
    }

}
