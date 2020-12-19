<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Analyse extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function rfq_details()
    {
        return $this->hasMany(RFQDetails::class,'id','rfq_details_id');
    }
}