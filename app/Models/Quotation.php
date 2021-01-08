<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function quotationDetail()
    {
        return $this->hasMany(QuotationDetail::class);
    }
    public function party()
    {
        return $this->hasOne(Party::class, 'id','party_id');
    }

    public function rfq()
    {
        return $this->hasOne(RFQ::class, 'id', 'rfq_id');
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class, 'quotation_id', 'id');
    }

}
