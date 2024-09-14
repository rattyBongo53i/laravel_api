<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'Employee';

    protected $primary_key = 'id';

    protected $fillable = [
        'employer_id',
        'name',
        'email',
        'job_title',
        'job_description',
        'email_verified',
        'password',
        'company',
        'address',
        'city',
        'department',
        'zip',
        'phone',
        'phone_verified',
        'verified',
        'national_id',
        'hired_date',
    ];

    public function employer()
    {
        return $this->belongsTo('App\Models\Employer');
    }
}


