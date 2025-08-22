<?php

namespace Database\Seeders\Admin;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->createDefaultPermissions();

        $admin = new Role();
        $admin->name = 'super admin';
        $admin->guard_name = 'admin';
        $admin->save();

        $reviewer = new Role();
        $reviewer->name = 'reviewer';
        $reviewer->guard_name = 'admin';
        $reviewer->save();
        $reviewer->givePermissionTo('review products');
    }

    function createDefaultPermissions() : void
    {
        Permission::insert([
            
            array('id' => '1','name' => 'review products','guard_name' => 'admin','group_name' => 'Review Products','created_at' => NULL,'updated_at' => NULL),
            array('id' => '2','name' => 'manage categories','guard_name' => 'admin','group_name' => 'Category Module','created_at' => NULL,'updated_at' => NULL),
            array('id' => '3','name' => 'manage order','guard_name' => 'admin','group_name' => 'Manage Order','created_at' => '2025-02-18 05:33:15','updated_at' => '2025-02-18 05:33:15'),
            array('id' => '4','name' => 'manage kyc','guard_name' => 'admin','group_name' => 'Manage KYC','created_at' => '2025-02-18 05:34:56','updated_at' => '2025-02-18 05:34:56'),
            array('id' => '5','name' => 'manage withdraw request','guard_name' => 'admin','group_name' => 'Manage Withdraw Request','created_at' => '2025-02-18 05:35:55','updated_at' => '2025-02-18 05:35:55'),
            array('id' => '6','name' => 'manage withdraw method','guard_name' => 'admin','group_name' => 'Manage Withdraw Method','created_at' => '2025-02-18 05:36:05','updated_at' => '2025-02-18 05:36:05'),
            array('id' => '7','name' => 'manage sections','guard_name' => 'admin','group_name' => 'Mange Sections','created_at' => '2025-02-18 05:37:05','updated_at' => '2025-02-18 05:37:05'),
            array('id' => '8','name' => 'manage socials','guard_name' => 'admin','group_name' => 'Manage Socials','created_at' => '2025-02-18 05:37:24','updated_at' => '2025-02-18 05:37:24'),
            array('id' => '9','name' => 'manage banner','guard_name' => 'admin','group_name' => 'Manage Banner','created_at' => '2025-02-18 05:37:34','updated_at' => '2025-02-18 05:37:34'),
            array('id' => '10','name' => 'page builder','guard_name' => 'admin','group_name' => 'Page Builder','created_at' => '2025-02-18 05:37:49','updated_at' => '2025-02-18 05:37:49'),
            array('id' => '11','name' => 'manage newsletter','guard_name' => 'admin','group_name' => 'Manage Newsletter','created_at' => '2025-02-18 05:38:10','updated_at' => '2025-02-18 05:38:10'),
            array('id' => '12','name' => 'access management','guard_name' => 'admin','group_name' => 'Access Management','created_at' => '2025-02-18 05:38:27','updated_at' => '2025-02-18 05:38:27'),
            array('id' => '13','name' => 'payment setting','guard_name' => 'admin','group_name' => 'Payment Setting','created_at' => '2025-02-18 05:38:37','updated_at' => '2025-02-18 05:38:37'),
            array('id' => '14','name' => 'manage settings','guard_name' => 'admin','group_name' => 'Manage Settings','created_at' => '2025-02-18 05:38:48','updated_at' => '2025-02-18 05:38:48')
          
        ]);
    }
}
