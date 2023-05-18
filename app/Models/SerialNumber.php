<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SerialNumber extends Model
{
    protected $fillable = ['product_id', 'serial_no', 'price', 'prod_date', 'warranty_start', 'warranty_duration', 'used'];

    public function item()
    {
        return $this->belongsTo(Item::class, 'product_id');
    }

    public function transactionDetail()
    {
        return $this->hasOne(TransactionDetail::class, 'serial_no');
    }

    use HasFactory;
}
