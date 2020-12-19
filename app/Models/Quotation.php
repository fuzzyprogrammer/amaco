<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    public function quotationDetail()
    {
        return $this->hasMany(QuotationDetail::class);
    }
    public function party()
    {
        return $this->hasOne(Party::class, 'id','party_id');
    }

}
