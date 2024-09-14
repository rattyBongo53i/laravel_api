<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceFees extends Model
{
    use HasFactory;
    protected $table = 'invoice_fees';
    protected $fillable = ['invoice_uuid', 'invoice_id', 'amount', 'fee_id', 'name'];

        // Define the relationship: An item belongs to an invoice
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}