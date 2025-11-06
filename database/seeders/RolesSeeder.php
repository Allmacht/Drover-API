<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdmin = Role::firstOrCreate(
            ['slug' => 'super_admin'],
            [
                'name' => 'Super Admin',
                'description' => 'Has full access to the system',
                'level' => 100,
            ]
        );

        $allPermissions = Permission::all()->pluck('id')->toArray();
        $superAdmin->permissions()->sync($allPermissions);

        $admin = Role::firstOrCreate(
            ['slug' => 'admin'],
            [
                'name' => 'Admin',
                'description' => 'Has administrative access',
                'level' => 80,
            ]
        );

        $adminPermissions = Permission::whereIn('slug', [
            'stores.view_own',
            'stores.manage_own',
            'settings.view_own',
            'settings.edit_own'
        ])->pluck('id')->toArray();
        $admin->permissions()->sync($adminPermissions);
    }
}
