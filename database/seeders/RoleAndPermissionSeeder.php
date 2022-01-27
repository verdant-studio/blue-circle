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
            'blog create',
            'blog delete',
            'blog read',
            'blog update',

            'categories create',
            'categories delete',
            'categories read',
            'categories update',

            'dashboard read',

            'pages create',
            'pages delete',
            'pages read',
            'pages update',

            'settings read',
            'settings update',

            'sites create',
            'sites delete',
            'sites read',
            'sites update',

            'stats read',

            'users create',
            'users delete',
            'users read',
            'users update',
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
            'blog read',

            'categories read',

            'pages read',

            'dashboard read',

            'sites create',
            'sites read',
            'sites update',

            'stats read',
        ];

        $member_permissions = [
            'dashboard read',

            'sites create',
            'sites read',
            'sites update',
        ];

        $admin->syncPermissions($admin_permissions);
        $member->syncPermissions($member_permissions);
    }
}
