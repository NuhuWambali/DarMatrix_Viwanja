<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $connection = 'mysql';

    protected $table='customers';

    protected $fillable=[
        'fullname',
        'phone_number',
        'email',
        'date_of_birth',
        'national_id_number',
        'address',
        'description1',
        'description2',
        'description3',
        'description4',
        'description5',
        'description6',
        'file',
        'status',
        'created_by',
        'modified_by',
    ];

    public function payments(){
       return $this->hasMany(Payment::class);
    }

    public function plots(){
        return $this->hasMany(Plot::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }
}
