<?php

namespace Database\Seeders;

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $roles = ['Admin', 'SuperAdmin','User', 'Manager','Finance','Surveyor'];

        foreach ($roles as $role) {
            if (DB::table('roles')->where('role_name', $role)->doesntExist()) {
                DB::table('roles')->insert([
                    'role_name' => $role,
                ]);
            } else {
                error_log("Role '{$role}' already exists in the database.");
            }
        }
    }
}
