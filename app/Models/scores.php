<?php

namespace App\Models;

use App\Models\game_sessions;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class scores extends Model
{
    public function user()
{
    return $this->belongsTo(User::class);
}

public function session()
{
    return $this->belongsTo(game_sessions::class, 'game_session_id');
}
}
