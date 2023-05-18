<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $fillable = ['transaction_id', 'product_id', 'serial_no', 'price', 'discount'];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'product_id');
    }

    public function serialNumber()
    {
        return $this->belongsTo(SerialNumber::class, 'serial_no');
    }

    use HasFactory;
}