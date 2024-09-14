<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdableEmployer extends Model
{
    use HasFactory;
    protected $table = 'ordable_employers';
   
    protected $primaryKey = 'id';
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'email_verified',
        'company',
        'password',
        'address_1',
        'address_2',
        'city',
        'zip',
        'business_certificate',
        'phone_1',
        'phone_1_verified',
        'phone_2',
        'phone_2_verified',
        'verified',
        'employer_code',
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
