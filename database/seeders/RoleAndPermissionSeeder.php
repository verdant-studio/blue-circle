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
            'articles create',
            'articles delete',
            'articles read',
            'articles update',

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
            if (!Permission::where('name', '=', $permission)->exists()) {
                Permission::create(['name' => $permission]);
            }
        }
        // =======================================================================


        if (!Role::where('name', '=', 'admin')->exists()) {
            $admin = Role::create(['name' => 'admin']);
        }
        if (!Role::where('name', '=', 'member')->exists()) {
            $member = Role::create(['name' => 'member']);
        }
        if (!Role::where('name', '=', 'super-admin')->exists()) {
            Role::create(['name' => 'super-admin']);
        }

        // =======================================================================

        $admin_permissions = [
            'articles read',

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

        if (Role::where('name', '=', 'admin')->exists()) {
            $admin = Role::findByName('admin');
            $admin->syncPermissions($admin_permissions);
        }
        if (Role::where('name', '=', 'member')->exists()) {
            $member = Role::findByName('member');
            $member->syncPermissions($member_permissions);
        }
    }
}
