<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => 'admin@library.com',
            'password' => Hash::make('password'),
        ]);
    }
}
