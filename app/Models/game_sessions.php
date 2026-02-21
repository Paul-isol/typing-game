<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Score;
class game_sessions extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function score(){
        return $this->hasOne(Scores::class);
    }
}
