<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            [
                'name' => 'View Users',
                'slug' => 'users.view',
                'description' => 'Can view users list',
                'group' => 'users',
            ],
            [
                'name' => 'Create Users',
                'slug' => 'users.create',
                'description' => 'Can create new users',
                'group' => 'users',
            ],
            [
                'name' => 'Edit Users',
                'slug' => 'users.edit',
                'description' => 'Can edit existing users',
                'group' => 'users',
            ],
            [
                'name' => 'Delete Users',
                'slug' => 'users.delete',
                'description' => 'Can delete users',
                'group' => 'users',
            ],
            [
                'name' => 'View Roles',
                'slug' => 'roles.view',
                'description' => 'Can view roles list',
                'group' => 'roles',
            ],
            [
                'name' => 'Create Roles',
                'slug' => 'roles.create',
                'description' => 'Can create new roles',
                'group' => 'roles',
            ],
            [
                'name' => 'Edit Roles',
                'slug' => 'roles.edit',
                'description' => 'Can edit existing roles',
                'group' => 'roles',
            ],
            [
                'name' => 'Delete Roles',
                'slug' => 'roles.delete',
                'description' => 'Can delete roles',
                'group' => 'roles',
            ],
            [
                'name' => 'Assign Permissions',
                'slug' => 'roles.assign_permissions',
                'description' => 'Can assign permissions to roles',
                'group' => 'roles',
            ],
            [
                'name' => 'View Countries',
                'slug' => 'countries.view',
                'description' => 'Can view countries list',
                'group' => 'countries',
            ],
            [
                'name' => 'Create Countries',
                'slug' => 'countries.create',
                'description' => 'Can create new countries',
                'group' => 'countries',
            ],
            [
                'name' => 'Edit Countries',
                'slug' => 'countries.edit',
                'description' => 'Can edit existing countries',
                'group' => 'countries',
            ],
            [
                'name' => 'Delete Countries',
                'slug' => 'countries.delete',
                'description' => 'Can delete countries',
                'group' => 'countries',
            ],
            [
                'name' => 'View Settings',
                'slug' => 'settings.view',
                'description' => 'Can view system settings',
                'group' => 'settings',
            ],
            [
                'name' => 'Edit Settings',
                'slug' => 'settings.edit',
                'description' => 'Can edit system settings',
                'group' => 'settings',
            ],
            [
                'name' => 'Manage All Stores',
                'slug' => 'stores.manage_all',
                'description' => 'Can manage all stores',
                'group' => 'stores',
            ],
            [
                'name' => 'View All Stores',
                'slug' => 'stores.view_all',
                'description' => 'Can view all stores',
                'group' => 'stores',
            ],

            // permissions for client stores
            [
                'name' => 'view my stores',
                'slug' => 'stores.view_own',
                'description' => 'Can view own stores',
                'group' => 'stores',
            ],
            [
                'name' => 'manage all my stores',
                'slug' => 'stores.manage_own',
                'description' => 'Can manage own stores',
                'group' => 'stores',
            ],
            [
                'name' => 'view my settings',
                'slug' => 'settings.view_own',
                'description' => 'Can view own settings',
                'group' => 'settings',
            ],
            [
                'name' => 'edit my settings',
                'slug' => 'settings.edit_own',
                'description' => 'Can edit own settings',
                'group' => 'settings',
            ],
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(
                ['slug' => $permission['slug']],
                $permission
            );
        }
    }
}
