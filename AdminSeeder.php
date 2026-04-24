<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::create([
            'full_name' => 'Super Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Admin@123'),
            'contact_no' => '1254698763',
            'address' => 'Mumbai Head Office',
            'city' => 'Mumbai',
            'state' => 'Maharashtra',
        ]);
    }
}
