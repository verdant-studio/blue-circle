<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleAndPermissionSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'create categories',
            'delete categories',
            'read categories',
            'update categories',

            'create sites',
            'delete sites',
            'read sites',
            'update sites',

            'create users',
            'delete users',
            'read users',
            'update users',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
        // =======================================================================

        $admin = Role::create(['name' => 'admin']);
        $member = Role::create(['name' => 'member']);
        Role::create(['name' => 'super-admin']);

        // =======================================================================

        $admin_permissions = [
            'read categories',
            'read sites',
            'read users',
        ];

        $member_permissions = [

            'read users',
        ];

        $admin->syncPermissions($admin_permissions);
        $member->syncPermissions($member_permissions);
    }
}
