<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RFQDetails extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function rfq()
    {
        return $this->belongsTo('App\Models\RFQ');
    }
}
