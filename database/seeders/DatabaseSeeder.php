<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Developer',
            'username' => 'developer',
            'email' => 'developer@gmail.com',
            'password' => Hash::make('developer')
        ]);
        User::factory()->create([
            'name' => 'Penulis',
            'username' => 'penulis',
            'email' => 'penulis@gmail.com',
            'password' => Hash::make('penulis')
        ]);


        $this->call(MenuSeeder::class);
        $this->call(SubMenuSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(RolePermissionSeeder::class);
    }
}
