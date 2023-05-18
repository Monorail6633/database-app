<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['product_name', 'brand', 'price', 'model_no','stock'];

    public function serialNumbers()
    {
        return $this->hasMany(SerialNumber::class);
    }

    public function transactionDetails()
    {
        return $this->hasMany(TransactionDetail::class);
    }

    use HasFactory;
}
