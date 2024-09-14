<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $table = 'games';
    protected $primary_key = 'id';



    public function slips()
    {
        return $this->hasMany('App\Models\Slip', 'game_id', 'id'); 
    }
}
