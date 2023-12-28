<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentTransaction extends Model
{
    use HasFactory;

    protected $table='payment_transactions';

    protected $fillable=[
        'payment_id',
        'amount_paid',
        'transaction_time',
        'created_by'
    ];

    public function Payments(){
        return $this->belongsTo(Payment::class);
    }


}
