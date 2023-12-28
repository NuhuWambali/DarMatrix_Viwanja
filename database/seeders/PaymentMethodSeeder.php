<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $paymentMethods = ['Airtel Money', 'Tigo Pesa','Halo Pesa', 'M-Pesa','Cash'];

        foreach ($paymentMethods as $paymentMethod) {
            if (DB::table('payment_methods')->where('name', $paymentMethod)->doesntExist()) {
                DB::table('payment_methods')->insert([
                    'name' => $paymentMethod,
                    'description'=>"This is Test Payment Method",
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ]);
            } else {
                error_log("Payment '{$paymentMethod}' already exists in the database.");
            }
        }

    }
}
