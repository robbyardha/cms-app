<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::updateOrCreate(['name' => '/dashboard'], ['name' => '/dashboard']);

        // Access Role
        Permission::updateOrCreate(['name' => '/access'], ['name' => '/access']);
        Permission::updateOrCreate(['name' => '/access/role'], ['name' => '/access/role']);
        Permission::updateOrCreate(['name' => '/access/role/create'], ['name' => '/access/role/create']);
        Permission::updateOrCreate(['name' => '/access/role/update'], ['name' => '/access/role/update']);
        Permission::updateOrCreate(['name' => '/access/role/delete'], ['name' => '/access/role/delete']);


        // Access Menu
        Permission::updateOrCreate(['name' => '/access'], ['name' => '/access']);
        Permission::updateOrCreate(['name' => '/access/role'], ['name' => '/access/role']);
        Permission::updateOrCreate(['name' => '/access/role/create'], ['name' => '/access/role/create']);
        Permission::updateOrCreate(['name' => '/access/role/update'], ['name' => '/access/role/update']);
        Permission::updateOrCreate(['name' => '/access/role/delete'], ['name' => '/access/role/delete']);

        // Access Sub Menu
        Permission::updateOrCreate(['name' => '/access/submenu'], ['name' => '/access/submenu']);
        Permission::updateOrCreate(['name' => '/access/submenu/create'], ['name' => '/access/submenu/create']);
        Permission::updateOrCreate(['name' => '/access/submenu/update'], ['name' => '/access/submenu/update']);
        Permission::updateOrCreate(['name' => '/access/submenu/delete'], ['name' => '/access/submenu/delete']);

        // Access Permission
        Permission::updateOrCreate(['name' => '/access/permission'], ['name' => '/access/permission']);
        Permission::updateOrCreate(['name' => '/access/permission/create'], ['name' => '/access/permission/create']);
        Permission::updateOrCreate(['name' => '/access/permission/update'], ['name' => '/access/permission/update']);
        Permission::updateOrCreate(['name' => '/access/permission/delete'], ['name' => '/access/permission/delete']);

        // Access Give Permission
        Permission::updateOrCreate(['name' => '/access/give-permission'], ['name' => '/access/give-permission']);
        Permission::updateOrCreate(['name' => '/access/give-permission/create'], ['name' => '/access/give-permission/create']);
        Permission::updateOrCreate(['name' => '/access/give-permission/update'], ['name' => '/access/give-permission/update']);
        Permission::updateOrCreate(['name' => '/access/give-permission/delete'], ['name' => '/access/give-permission/delete']);

        // Master User
        Permission::updateOrCreate(['name' => '/master'], ['name' => '/master']);
        Permission::updateOrCreate(['name' => '/master/user'], ['name' => '/master/user']);
        Permission::updateOrCreate(['name' => '/master/user/create'], ['name' => '/master/user/create']);
        Permission::updateOrCreate(['name' => '/master/user/update'], ['name' => '/master/user/update']);
        Permission::updateOrCreate(['name' => '/master/user/delete'], ['name' => '/master/user/delete']);

        // Master Tag
        Permission::updateOrCreate(['name' => '/master'], ['name' => '/master']);
        Permission::updateOrCreate(['name' => '/master/tag'], ['name' => '/master/tag']);
        Permission::updateOrCreate(['name' => '/master/tag/create'], ['name' => '/master/tag/create']);
        Permission::updateOrCreate(['name' => '/master/tag/update'], ['name' => '/master/tag/update']);
        Permission::updateOrCreate(['name' => '/master/tag/delete'], ['name' => '/master/tag/delete']);

        // Master Post
        Permission::updateOrCreate(['name' => '/cms'], ['name' => '/cms']);
        Permission::updateOrCreate(['name' => '/cms/tag'], ['name' => '/cms/tag']);
        Permission::updateOrCreate(['name' => '/cms/tag/create'], ['name' => '/cms/tag/create']);
        Permission::updateOrCreate(['name' => '/cms/tag/update'], ['name' => '/cms/tag/update']);
        Permission::updateOrCreate(['name' => '/cms/tag/delete'], ['name' => '/cms/tag/delete']);
    }
}
