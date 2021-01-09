<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function employee()
    {
        return $this->hasOne(Employee::class, 'paid_by', 'id');
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class, 'referrence_bill_no', 'id');
    }
}
