<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public $fillable = ['end_date', 'winner_id'];
    public function turns() {
        return $this->hasMany('App\Turn', 'game_id');
    }

}
