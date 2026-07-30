<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
             // Create a default administrator
        User::create([
            'name' => 'Anjali',
            'email' => 'anjali@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('anjali123'),
            'mobile_no' => '8798989976',
            'role' => 'admin',
            'image' => null,
        ]);

    }
}
