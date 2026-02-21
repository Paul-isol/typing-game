<?php

namespace App\Http\Controllers;

use App\Models\GameSession;
use App\Models\Score;
use Illuminate\Http\Request;

class ScoreboardController extends Controller
{
    public function index()
    {
        $scores = Score::where('user_id', auth()->id())
            ->with('session')           // eager-load session for difficulty
            ->latest()
            ->limit(20)
            ->get();

        return view('scores.index', compact('scores'));
    }
}
