<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdablEmployer extends Model
{
    use HasFactory;

    protected $table = 'ordabl_employers';
    protected $primaryKey = 'id';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'company',
        'city'
    ];
}
