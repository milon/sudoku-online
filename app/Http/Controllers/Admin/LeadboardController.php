<?php

namespace App\Http\Controllers\Admin;

use App\Models\Player;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LeadboardController extends Controller
{
    /**
     * Get the lead scorer
     *
     * @return View $view
     */
    public function index()
    {
        $players = Player::orderBy('points', 'desc')->take(10)->get();

        return view('admin.leadboard.index', compact('players'));
    }
}
