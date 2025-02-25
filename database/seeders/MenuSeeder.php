<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Menu::create([
            "icon" => "bx-home-circle",
            "name" => "Dashboard",
            "url" => "/dashboard",
            "category" => "",
            "order" => 0,
            "is_single" => 1
        ]);

        Menu::create([
            "icon" => "bxs-key",
            "name" => "Access",
            "url" => "/access",
            "category" => "",
            "order" => 1,
            "is_single" => 0
        ]);

        Menu::create([
            "icon" => "bxs-package",
            "name" => "Master",
            "url" => "/master",
            "category" => "",
            "order" => 2,
            "is_single" => 0
        ]);

        Menu::create([
            'icon' => "bx bxs-book-content",
            'name' => 'CMS',
            'url' => '/cms',
            'category' => '',
            'order' => 3,
            'is_single' => 0,
        ]);
    }
}
