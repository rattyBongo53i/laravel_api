<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alglocation extends Model
{
    use HasFactory;

    protected $table = 'alglocations';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'longitude',
        'latitude',
        'city',
        'zip',
    ];
}
