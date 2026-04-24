<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('companies')->insert([
            'name' => 'EmpowerHer Inc',
            'email' => 'admin@empowerher.com',
            'phone' => '9876543210',
            'address' => '123 Main Street, City',
            'logo' => null,
            'password' => Hash::make('admin123'), // default password
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
