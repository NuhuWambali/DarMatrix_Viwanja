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

    public function customers(){
        return $this->belongsTo(Customer::class);
    }

    public function plots(){
        return $this->belongsTo(Plot::class);
    }
}
