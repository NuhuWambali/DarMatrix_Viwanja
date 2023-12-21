<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plot extends Model
{
    use HasFactory;

    protected $connection = 'mysql';

    protected $table='plots';

    protected $fillable = [
        'project_id',
        'plot_number',
        'installment_total_price',
        'plot_size',
        'land_use',
        'price_per_sqm',
        'cash_value',
        'installment_period',
        'monthly_installment_price',
        'total_value',
        'description1',
        'description2',
        'description3',
        'file',
        'status',
        'created_at',
        'updated_at',
        'created_by',
        'updated_by',
    ];
    protected $casts = [
        'plot_size'=>'float',
        'installment_price_per_sqm' => 'float',
        'cash_price_per_sqm' => 'float',
        'monthly_installement_price' => 'float',
    ];
    public function project()
    {
       return $this->belongsTo(Project::class);
    }

    public function customers(){
        return $this->belongsTo(Customer::class);
    }

    public function payments(){
        return $this->hasMany(Payment::class);
    }

    public function orders(){
        return $this->hasOne(Order::class);
    }


}
