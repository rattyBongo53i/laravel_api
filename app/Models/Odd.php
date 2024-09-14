<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MatchGame;

class Odd extends Model
{
    use HasFactory;
    protected $primary_key = 'id';
    protected $fillable = [
        'match_id', 'bet_type', 'odd'
    ];

    public function matchGame()
    {
        return $this->belongsTo('App\Models\MatchGame');
    }
}
