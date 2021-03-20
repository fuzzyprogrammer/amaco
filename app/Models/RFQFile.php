<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RFQFile extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function rfq_file()
    {
        return $this->belongsTo(RFQ::class);
    }
}
