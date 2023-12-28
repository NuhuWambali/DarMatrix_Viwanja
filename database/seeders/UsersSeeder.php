<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user=new User();
        $user->fullname="Nuhu Wambali";
        $user->username="nuhu09";
        $user->email="wambalinuhu@gmail.com";
        $user->phone="0699728933";
        $user->role_id=2;
        $user->status=1;
        $user->password="nuhu1998";
        $user->save();
    }
}
