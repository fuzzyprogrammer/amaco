<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function division()
    {
        return $this->belongsTo(Division::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function rfq()
    {
        return $this->belongsTo(RFQDetails::class);
    }
}
