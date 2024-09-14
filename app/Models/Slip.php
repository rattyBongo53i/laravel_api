<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slip extends Model
{
    use HasFactory;
    protected $table = 'slips';

    protected $primary_key = 'id';
    protected $fillable = [ 
        'stake_amount', 'predicted_return_cash', 'actual_return_cash','start_time', 'end_time', 'status'
    ];

    public function game()
    {
        return $this->belongsTo('App\Models\Game');
    }
    
    public function predictions()
    {
        return $this->hasMany('App\Models\Prediction', 'slip_id', 'id');
    }
}
