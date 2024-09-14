<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenditureBudget extends Model
{
    use HasFactory;
    protected $table = 'expenditure_budgets';
    protected $primaryKey = 'id';
}