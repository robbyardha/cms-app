<?php

namespace Database\Seeders;

use App\Models\SubMenu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubMenu::create([
            "menu_id" => 2,
            "name" => "Role",
            "url" => "/role",
            "order" => 0,
            "is_show" => 0
        ]);

        SubMenu::create([
            "menu_id" => 2,
            "name" => "Menu",
            "url" => "/menu",
            "order" => 1,
            "is_show" => 0
        ]);

        SubMenu::create([
            "menu_id" => 2,
            "name" => "Sub menu",
            "url" => "/submenu",
            "order" => 2,
            "is_show" => 0
        ]);

        SubMenu::create([
            "menu_id" => 2,
            "name" => "Permission",
            "url" => "/permission",
            "order" => 3,
            "is_show" => 0
        ]);

        SubMenu::create([
            "menu_id" => 2,
            "name" => "Give permission",
            "url" => "/give-permission",
            "order" => 4,
        ]);

        SubMenu::create([
            "menu_id" => 3,
            "name" => "User",
            "url" => "/user",
            "order" => 0,
        ]);
        SubMenu::create([
            "menu_id" => 3,
            "name" => "Tags",
            "url" => "/tag",
            "order" => 1,
        ]);
        SubMenu::create([
            "menu_id" => 4,
            "name" => "Post",
            "url" => "/post",
            "order" => 2,
        ]);
    }
}
