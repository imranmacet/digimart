<?php

namespace Database\Seeders\Admin;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Super Admin
        $admin = new Admin();
        $admin->name = 'Super Admin';
        $admin->email = 'admin@gmail.com';
        $admin->password = bcrypt('password');
        $admin->save();
        $admin->assignRole('super admin');

        // Reviewer
        $reviewer = new Admin();
        $reviewer->name = 'Reviewer';
        $reviewer->email = 'reviewer@gmail.com';
        $reviewer->password = bcrypt('password');
        $reviewer->save();
        $reviewer->assignRole('reviewer');

    }
}
