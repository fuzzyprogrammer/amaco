<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationDetail extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function quotation()
    {
        return $this->belongsTo(Quotation::class);
    }
    public function party()
    {
        return $this->hasOne(Party::class, 'id', 'party_id');
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function getDeliveredQuantity(QuotationDetail $quotation_detail)
    {
        $delivery_note = $quotation_detail->quotation->deliveryNote;
        // if(!($delivery_note)){

        //     return 0;
        // }
        $deliveryNoteDetail = DeliveryNoteDetail::where([
            'delivery_note_id' => $delivery_note->id,
            'product_id' => $quotation_detail->product_id
        ])->get();
        $data = $delivery_note->deliveryNoteDetail->getTotalDeliveredQuantity($deliveryNoteDetail);
        return $data;
    }
}
