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

        // =======================================================================

        $member_permissions = [
            'read users',
        ];

        $admin->syncPermissions(Permission::all());
        $member->syncPermissions($member_permissions);
    }
}
