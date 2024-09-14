<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;

    protected $table = 'Employer';
    protected $primary_key = 'id';
    
    protected $fillable = [
        'name',
        'email',
        'email_verified',
        'password',
        'company',
        'address',
        'city',
        'zip',
        'national_id',
        'phone',
        'phone_verified',
        'verified',
    ];

   
        public function company()
        {
            return $this->hasOne('App\Models\Company');
        }

        public function employee()
        {
            return $this->hasOne('App\Models\Employee');
        }


}
