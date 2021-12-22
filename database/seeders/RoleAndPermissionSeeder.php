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
            'edit users',
            'read users',
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
            'edit users',
            'read users',
        ];

        $member_permissions = [
            'read users',
        ];

        $admin->syncPermissions($admin_permissions);
        $member->syncPermissions($member_permissions);
    }
}
