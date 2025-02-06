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
        Permission::updateOrCreate(['name' => '/access/role/edit'], ['name' => '/access/role/edit']);
        Permission::updateOrCreate(['name' => '/access/role/update'], ['name' => '/access/role/update']);
        Permission::updateOrCreate(['name' => '/access/role/delete'], ['name' => '/access/role/delete']);


        // Access Menu
        Permission::updateOrCreate(['name' => '/access'], ['name' => '/access']);
        Permission::updateOrCreate(['name' => '/access/menu'], ['name' => '/access/menu']);
        Permission::updateOrCreate(['name' => '/access/menu/create'], ['name' => '/access/menu/create']);
        Permission::updateOrCreate(['name' => '/access/menu/edit'], ['name' => '/access/menu/edit']);
        Permission::updateOrCreate(['name' => '/access/menu/update'], ['name' => '/access/menu/update']);
        Permission::updateOrCreate(['name' => '/access/menu/delete'], ['name' => '/access/menu/delete']);

        // Access Sub Menu
        Permission::updateOrCreate(['name' => '/access/submenu'], ['name' => '/access/submenu']);
        Permission::updateOrCreate(['name' => '/access/submenu/create'], ['name' => '/access/submenu/create']);
        Permission::updateOrCreate(['name' => '/access/submenu/edit'], ['name' => '/access/submenu/edit']);
        Permission::updateOrCreate(['name' => '/access/submenu/update'], ['name' => '/access/submenu/update']);
        Permission::updateOrCreate(['name' => '/access/submenu/delete'], ['name' => '/access/submenu/delete']);

        // Access Permission
        Permission::updateOrCreate(['name' => '/access/permission'], ['name' => '/access/permission']);
        Permission::updateOrCreate(['name' => '/access/permission/create'], ['name' => '/access/permission/create']);
        Permission::updateOrCreate(['name' => '/access/permission/edit'], ['name' => '/access/permission/edit']);
        Permission::updateOrCreate(['name' => '/access/permission/update'], ['name' => '/access/permission/update']);
        Permission::updateOrCreate(['name' => '/access/permission/delete'], ['name' => '/access/permission/delete']);

        // Access Give Permission
        Permission::updateOrCreate(['name' => '/access/give-permission'], ['name' => '/access/give-permission']);
        Permission::updateOrCreate(['name' => '/access/give-permission/create'], ['name' => '/access/give-permission/create']);
        Permission::updateOrCreate(['name' => '/access/give-permission/edit'], ['name' => '/access/give-permission/edit']);
        Permission::updateOrCreate(['name' => '/access/give-permission/update'], ['name' => '/access/give-permission/update']);
        Permission::updateOrCreate(['name' => '/access/give-permission/delete'], ['name' => '/access/give-permission/delete']);

        // Master User
        Permission::updateOrCreate(['name' => '/master'], ['name' => '/master']);
        Permission::updateOrCreate(['name' => '/master/user'], ['name' => '/master/user']);
        Permission::updateOrCreate(['name' => '/master/user/create'], ['name' => '/master/user/create']);
        Permission::updateOrCreate(['name' => '/master/user/edit'], ['name' => '/master/user/edit']);
        Permission::updateOrCreate(['name' => '/master/user/update'], ['name' => '/master/user/update']);
        Permission::updateOrCreate(['name' => '/master/user/delete'], ['name' => '/master/user/delete']);

        // Master Tag
        Permission::updateOrCreate(['name' => '/master'], ['name' => '/master']);
        Permission::updateOrCreate(['name' => '/master/tag'], ['name' => '/master/tag']);
        Permission::updateOrCreate(['name' => '/master/tag/create'], ['name' => '/master/tag/create']);
        Permission::updateOrCreate(['name' => '/master/tag/edit'], ['name' => '/master/tag/edit']);
        Permission::updateOrCreate(['name' => '/master/tag/update'], ['name' => '/master/tag/update']);
        Permission::updateOrCreate(['name' => '/master/tag/delete'], ['name' => '/master/tag/delete']);

        // Master Post
        Permission::updateOrCreate(['name' => '/cms'], ['name' => '/cms']);
        Permission::updateOrCreate(['name' => '/cms/post'], ['name' => '/cms/post']);
        Permission::updateOrCreate(['name' => '/cms/post/create'], ['name' => '/cms/post/create']);
        Permission::updateOrCreate(['name' => '/cms/post/edit'], ['name' => '/cms/post/edit']);
        Permission::updateOrCreate(['name' => '/cms/post/update'], ['name' => '/cms/post/update']);
        Permission::updateOrCreate(['name' => '/cms/post/delete'], ['name' => '/cms/post/delete']);
    }
}
