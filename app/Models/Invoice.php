<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function invoiceDetail()
    {
        return $this->hasMany(InvoiceDetail::class);
    }

    public function quotation()
    {
        return $this->belongsTo(Quotation::class);
    }
}
