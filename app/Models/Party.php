<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function rfq()
    {
        return $this->belongsTo(RFQ::class);
    }
    public function rfq_detail()
    {
        return $this->belongsTo(RFQDetails::class);
    }
    public function quotation()
    {
        return $this->belongsTo(Quotation::class);
    }

    public function contact()
    {
        return $this->hasMany(Contact::class,'id','party_id');
    }

    public function quotationDetail()
    {
        return $this->belongsTo(QuotationDetail::class);
    }
}
