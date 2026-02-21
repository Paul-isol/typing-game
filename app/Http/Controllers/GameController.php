<?php

namespace App\Http\Controllers;

use App\Models\GameSession;
use App\Models\Score;
use App\Models\Word;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Show the main game view.
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Start a new game session.
     * POST /game/start
     * Body: { difficulty: 'easy'|'medium'|'hard' }
     */
    public function start(Request $request)
    {
        $request->validate([
            'difficulty' => 'required|in:easy,medium,hard',
        ]);

        $difficulty = $request->input('difficulty');

        // Create the game session (guest-friendly: user_id is nullable if not authed)
        $session = GameSession::create([
            'user_id' => auth()->id(),
            'difficulty' => $difficulty,
            'started_at' => now(),
            'status' => 'active',
        ]);

        // Fetch 20 random words for the chosen difficulty
        $words = Word::where('difficulty', $difficulty)
            ->inRandomOrder()
            ->limit(20)
            ->pluck('word');

        return response()->json([
            'session_id' => $session->id,
            'words' => $words,
        ]);
    }

    /**
     * End a game session and store the score.
     * POST /game/end
     * Body: { session_id, score, accuracy, wpm, words_typed, words_correct }
     */
    public function end(Request $request)
    {
        $request->validate([
            'session_id' => 'required|exists:game_sessions,id',
            'score' => 'required|integer|min:0',
            'accuracy' => 'required|numeric|min:0|max:100',
            'wpm' => 'required|integer|min:0',
        ]);

        // Mark session as completed
        $session = GameSession::findOrFail($request->session_id);
        $session->update([
            'ended_at' => now(),
            'status' => 'completed',
        ]);

        // Store score
        $score = Score::create([
            'user_id' => $session->user_id,
            'game_session_id' => $session->id,
            'score' => $request->score,
            'accuracy' => $request->accuracy,
            'wpm' => $request->wpm,
        ]);

        return response()->json([
            'message' => 'Game saved!',
            'score' => $score->score,
            'accuracy' => $score->accuracy,
            'wpm' => $score->wpm,
        ]);
    }
}
