<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Odd;
use App\Models\Prediction;
use App\Models\Url;

class MatchGame extends Model
{
    use HasFactory;
    protected $table = 'match_games';
    protected $primary_key = 'id';
    protected $fillable = [ 'id','matchUuid',
        'home', 'away', 'league','start_time', 'end_time', 'is_live'
    ];

    public function odds()
    {
        return $this->hasMany('App\Models\Odd', 'match_id', 'id'); 
    }
    public function predictions()
    {
        return $this->hasMany('App\Models\Prediction', 'match_id', 'id');
    }
    public function url()
    {
        return $this->hasMany('App\Models\Url', 'match_id', 'id');
    }
}
