<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin@mibi.africa'],
            [
                'name' => 'MIBI Admin',
                'phone' => '254700000000',
                'password' => Hash::make('password'),
                'is_active' => true,
            ]
        );
        $admin->assignRole('admin');

        $coach = User::firstOrCreate(
            ['email' => 'coach@mibi.africa'],
            [
                'name' => 'MIBI Coach',
                'phone' => '254700000001',
                'password' => Hash::make('password'),
                'is_active' => true,
            ]
        );
        $coach->assignRole('coach');
    }
}
