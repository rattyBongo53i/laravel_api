<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prediction extends Model
{
    use HasFactory;
    protected $primary_key = 'id';
    protected $fillable = [ 
        'slip_id', 'match_id', 'home', 'home_score', 'away', 'away_score', 'bet_type',
         'prediction', 'result',
        'odd', 'start_time', 'end_time'
    ];

    public function slip()
    {
        return $this->belongsTo('App\Models\Slip');
    }
    public function matchGame()
    {
        return $this->hasOne('App\Models\MatchGame');
    }
}
