<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fees extends Model
{
    use HasFactory;
    protected $table = 'fees';
    protected $primaryKey = 'id';

       // Define the relationship to the Fee model
    public function fees()
    {
        return $this->hasOne(Fees::class);
    }
}