<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table='payments';

    protected $fillable=[
        'customer_id',
        'plot_id',
        'total_amount',
        'installment_period',
        'down_payment',
        'monthly_installment_period',
        'payment_method_id',
        'payment_date',
        'amount_paid',
        'amount_remain',
        'installment_number',
        'payment_status',
        'created_by',
        'modified_by',
    ];

    public function Customer(){
        $this->belongsTo(Customer::class,'customer_id');
    }

    public function payment_methods(){
       return $this->hasMany(PaymentMethod::class,'payment_method_id');
    }

    public function plots(){
        return $this->belongsTo(Plot::class,'plot_id');
    }

}
