<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $table = 'scores';

    protected $fillable = [
        'user_id',
        'game_session_id',
        'score',
        'accuracy',
        'wpm',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function session()
    {
        return $this->belongsTo(GameSession::class, 'game_session_id');
    }
}
