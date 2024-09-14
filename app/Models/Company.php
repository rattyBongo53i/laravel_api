<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'Company';
    protected $primary_key = 'id';

    protected $fillable = [
        'employer_id',
        'name',
        'description',
        'address',
        'city',
        'zip',
        'departments',
        'registration_number',
        'start_date',
        
      
    ];

    public function employer()
    {
        return $this->belongsTo('App\Models\Employer');
    }
}
