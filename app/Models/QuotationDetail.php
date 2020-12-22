<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationDetail extends Model
{
    use HasFactory;

    public function quotataion()
    {
        return $this->belongsTo(Quotation::class);
    }
    // public function product()
    // {
    //     return $this->hasOne(Product::class);
    // }

}
