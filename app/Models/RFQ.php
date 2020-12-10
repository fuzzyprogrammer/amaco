<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RFQ extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function rfq_details()
    {
        return $this->hasMany('App\Models\RFQDetails', 'rfq_id');
    }
}
