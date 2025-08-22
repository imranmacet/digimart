<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\Admin\AdminSeeder;
use Database\Seeders\Admin\SettingSeeder;
use Database\Seeders\Admin\RolePermissionSeeder;
use Database\Seeders\Frontend\UserSeeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            RolePermissionSeeder::class,
            SettingSeeder::class,
            AdminSeeder::class,
            UserSeeder::class,


            // testing
            // CategorySeeder::class,
            // ProductSeeder::class
        ]);
    }
}
