<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $filleble=[
        'customer_id',
        'project_id',
        'plot_id',
    ];

    protected $table="orders";

    public function customer(){
        return $this->belongsTo(Customer::class,'customer_id');
    }

    public function plot()
    {
        return $this->belongsTo(Plot::class, 'plot_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function paymentMethod(){
        return $this->belongsTo(PaymentMethod::class,'payment_method_id');
    }
}
