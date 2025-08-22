<?php

namespace Database\Seeders\Admin;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::insert([
            array('id' => '1', 'key' => 'site_name', 'value' => 'Digimart', 'created_at' => '2025-01-22 11:19:21', 'updated_at' => '2025-01-22 11:19:21'),
            array('id' => '2', 'key' => 'site_email', 'value' => 'digi@gmail.com', 'created_at' => '2025-01-22 11:19:21', 'updated_at' => '2025-01-22 11:19:21'),
            array('id' => '3', 'key' => 'country', 'value' => 'US', 'created_at' => '2025-01-23 03:50:51', 'updated_at' => '2025-01-23 03:50:51'),
            array('id' => '4', 'key' => 'time_zone', 'value' => 'America/Sitka', 'created_at' => '2025-01-23 03:50:51', 'updated_at' => '2025-01-23 03:50:51'),
            array('id' => '5', 'key' => 'default_currency', 'value' => 'USD', 'created_at' => '2025-01-23 03:50:51', 'updated_at' => '2025-01-23 03:50:51'),
            array('id' => '6', 'key' => 'currency_icon', 'value' => '$', 'created_at' => '2025-01-23 03:50:51', 'updated_at' => '2025-01-23 03:50:51'),
            array('id' => '7', 'key' => 'currency_position', 'value' => 'left', 'created_at' => '2025-01-23 03:50:51', 'updated_at' => '2025-02-03 07:11:45'),
            array('id' => '8', 'key' => 'paypal_mode', 'value' => 'sandbox', 'created_at' => '2025-01-23 05:49:39', 'updated_at' => '2025-01-23 05:49:39'),
            array('id' => '9', 'key' => 'paypal_app_id', 'value' => 'app_id', 'created_at' => '2025-01-23 05:49:39', 'updated_at' => '2025-01-23 05:49:39'),
            array('id' => '10', 'key' => 'paypal_client_id', 'value' => 'AUpkMOC_PruXVfpAxx5r6JEhaZ8iqBDEPhF-WTTROGxdJdG4STrZEfCe7j1dlYhYqwibVBKdJA80yup6', 'created_at' => '2025-01-23 05:49:39', 'updated_at' => '2025-01-23 06:20:52'),
            array('id' => '11', 'key' => 'paypal_secret_key', 'value' => 'EJ5DMVuR6IHI3Z1E9ZRtYEKnkl9T-XRpev0R2CDf1XRzR4iPVZiamlBKEzbmBnLkbVYxnYaMZQWmo7sB', 'created_at' => '2025-01-23 05:49:39', 'updated_at' => '2025-01-23 06:20:52'),
            array('id' => '12', 'key' => 'paypal_status', 'value' => 'active', 'created_at' => '2025-01-23 05:49:39', 'updated_at' => '2025-01-23 05:49:39'),
            array('id' => '13', 'key' => 'stripe_publishable_key', 'value' => 'pk_test_51QlPlHP8UJm5HQ7rkafTwQ8fubfmxN1v3tnzr4BDM8WdQdIuL8EyouvS5lLW61fYYXihMUSLmPBrCMDvrJ0WzQ8n0088R2GMvG', 'created_at' => '2025-01-26 07:28:14', 'updated_at' => '2025-01-26 07:28:54'),
            array('id' => '14', 'key' => 'stripe_secret_key', 'value' => 'sk_test_51QlPlHP8UJm5HQ7rj20FdFFhInnhpquMm9VQnh8EnDJRYVQZBKFow7t9ICaeSseRCsxfSPZG95LDDm4TT5eTEXm500iX9lrT6S', 'created_at' => '2025-01-26 07:28:14', 'updated_at' => '2025-01-26 07:28:54'),
            array('id' => '15', 'key' => 'stripe_status', 'value' => 'active', 'created_at' => '2025-01-26 07:28:14', 'updated_at' => '2025-01-26 07:28:14'),
            array('id' => '16', 'key' => 'razorpay_currency_rate', 'value' => '86.40', 'created_at' => '2025-01-26 11:20:36', 'updated_at' => '2025-01-27 06:13:09'),
            array('id' => '17', 'key' => 'razorpay_currency', 'value' => 'INR', 'created_at' => '2025-01-26 11:20:36', 'updated_at' => '2025-01-27 04:25:35'),
            array('id' => '18', 'key' => 'razorpay_key', 'value' => 'rzp_test_cvrsy43xvBZfDT', 'created_at' => '2025-01-26 11:20:36', 'updated_at' => '2025-01-27 04:25:35'),
            array('id' => '19', 'key' => 'razorpay_secret_key', 'value' => 'c9AmI4C5vOfSWmZehhlns5df', 'created_at' => '2025-01-26 11:20:36', 'updated_at' => '2025-01-27 04:25:35'),
            array('id' => '20', 'key' => 'razorpay_status', 'value' => 'active', 'created_at' => '2025-01-26 11:58:52', 'updated_at' => '2025-01-26 11:58:52'),
            array('id' => '21', 'key' => 'author_commission', 'value' => '30', 'created_at' => '2025-01-27 10:48:27', 'updated_at' => '2025-01-27 10:48:27'),
            array('id' => '22', 'key' => 'logo', 'value' => '/uploads/67b2caf6a4d40.png', 'created_at' => '2025-02-17 05:34:24', 'updated_at' => '2025-02-17 05:36:55'),
            array('id' => '23', 'key' => 'footer_logo', 'value' => '/uploads/67b2cb38037f0.png', 'created_at' => '2025-02-17 05:38:00', 'updated_at' => '2025-02-17 05:38:00'),
            array('id' => '24', 'key' => 'favicon', 'value' => '/uploads/67b2d4ed0f9b6.png', 'created_at' => '2025-02-17 05:38:00', 'updated_at' => '2025-02-17 06:19:25'),
            array('id' => '25', 'key' => 'breadcrumb', 'value' => '/uploads/67b2d6556a952.jpg', 'created_at' => '2025-02-17 05:38:00', 'updated_at' => '2025-02-17 06:25:25'),
            array('id' => '26', 'key' => 'smtp_sender_name', 'value' => 'DIGIMART', 'created_at' => '2025-02-17 07:36:19', 'updated_at' => '2025-02-17 07:40:48'),
            array('id' => '27', 'key' => 'smtp_sender_email', 'value' => 'suport@digimart.com', 'created_at' => '2025-02-17 07:36:19', 'updated_at' => '2025-02-17 07:40:48'),
            array('id' => '28', 'key' => 'smtp_recipient_email', 'value' => 'contact@digimart.com', 'created_at' => '2025-02-17 07:36:19', 'updated_at' => '2025-02-17 07:40:48'),
            array('id' => '29', 'key' => 'smtp_mail_host', 'value' => 'sandbox.smtp.mailtrap.io', 'created_at' => '2025-02-17 07:36:19', 'updated_at' => '2025-02-17 07:39:36'),
            array('id' => '30', 'key' => 'smtp_user_name', 'value' => 'c59215b9b026af', 'created_at' => '2025-02-17 07:36:19', 'updated_at' => '2025-02-17 07:39:36'),
            array('id' => '31', 'key' => 'smtp_user_password', 'value' => '9018c2674a638e', 'created_at' => '2025-02-17 07:36:19', 'updated_at' => '2025-02-17 07:39:36'),
            array('id' => '32', 'key' => 'smtp_port', 'value' => '2525', 'created_at' => '2025-02-17 07:36:19', 'updated_at' => '2025-02-17 07:39:36'),
            array('id' => '33', 'key' => 'smtp_encryption', 'value' => 'ssl', 'created_at' => '2025-02-17 07:36:19', 'updated_at' => '2025-02-17 07:39:36')

        ]);
    }
}
