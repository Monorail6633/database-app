<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['date', 'trans_id', 'customer_vendor', 'trans_type'];

    public function transactionDetails()
    {
        return $this->hasMany(TransactionDetail::class);
    }

    protected $casts = [
        'date' => 'date',
    ];


    use HasFactory;
}