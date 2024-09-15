<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $table = 'schedules';
    protected $primaryKey = 'id';

    //belongs to invoice
    public function invoice()
    {
        return $this->belongsTo('App\Models\Invoice');
    }
}