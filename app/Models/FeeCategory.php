<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeCategory extends Model
{
    use HasFactory;
    protected $table = 'fee_categories';
    protected $primaryKey = 'id';
        // Define relationship to the Category model
    public function category()
    {
        return $this->belongsTo(FeeCategory::class, 'category_id');
    }
}