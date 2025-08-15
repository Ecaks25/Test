<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            'Gudang',
            'Pencucian',
            'Pengeringan',
            'Blower',
            'Grinding',
            'Mixing',
            'Packaging',
            'FinishGood',
            'Admin',
        ];

        foreach ($roles as $roleName) {
            Role::firstOrCreate(['name' => $roleName]);
        }
    }
}
