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

    public function Project()
    {
       return $this->belongsTo(Project::class);
    }

}
