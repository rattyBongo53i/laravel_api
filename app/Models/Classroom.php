<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;
    protected $primary_key = 'id';
    protected $table = 'classrooms';
    protected $fillable = [];
}
