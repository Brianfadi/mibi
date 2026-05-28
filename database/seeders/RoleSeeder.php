<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'manage users', 'manage services', 'manage bookings', 'manage blog',
            'manage testimonials', 'manage contacts', 'manage pages',
            'manage settings', 'manage live-sessions', 'manage faqs',
        ];

        foreach ($permissions as $name) {
            Permission::firstOrCreate(['name' => $name, 'guard_name' => 'web']);
        }

        $admin = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $admin->givePermissionTo(Permission::all());

        $coach = Role::firstOrCreate(['name' => 'coach', 'guard_name' => 'web']);
        $coach->givePermissionTo([
            'manage bookings', 'manage blog', 'manage testimonials',
        ]);

        Role::firstOrCreate(['name' => 'client', 'guard_name' => 'web']);
    }
}
