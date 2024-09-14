<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;
    protected $primary_key = 'id';
    protected $table = 'urls';
    protected $fillable = [
        'match_id', 'url_type', 'url'
    ];

    public function url()
    {
        return $this->belongsTo(MatchGame::class);
    }
}
