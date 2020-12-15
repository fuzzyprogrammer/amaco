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
        return $this->belongsTo('App\Models\RFQ');
    }
    public function rfq_detail()
    {
        return $this->belongsTo('App\Models\RFQDetails');
    }
}
