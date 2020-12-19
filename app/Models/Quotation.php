<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    public function quotataionDetail()
    {
        return $this->hasMany(QuotationDeatail::class, 'id','quotation_id');
    }

}
