<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class viwanjaProject extends Model
{
    use HasFactory;

    protected $table='viwanja_projects';

    protected $fillable = [
        'name',
        'address',
        'city',
        'region',
        'total_plots',
        'available_plots',
        'unavailable_plots',
        'description',
        'status',
        'plots_no',
        'block',
        'file_path',
        'installment_period',
        'price_per_sqm',
        'start_date',
        'end_date',
        'created_at',
        'updated_at',
        'created_by',
        'updated_by',
    ];

    protected $dates = [
        'start_date',
        'end_date',
        'created_at',
        'updated_at',
    ];

}
