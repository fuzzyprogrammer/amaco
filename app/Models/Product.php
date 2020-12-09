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
        return $this->belongsTo('App\Models\Division');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
