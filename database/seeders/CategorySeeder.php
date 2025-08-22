<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'icon' => 'ti ti-code',
                'name' => 'Code & Scripts',
                'slug' => 'code-scripts',
                'file_types' => ['ZIP', 'RAR', 'PNG', 'JPG'],
                'show_at_featured' => true,
                'show_at_nav' => true,
                'subcategories' => [
                    'PHP Scripts',
                    'WordPress Plugins',
                    'JavaScript Code',
                    'Mobile App Source Code',
                    'Python Scripts',
                    'ASP.NET Scripts',
                    'C# & Java Code',
                ]
            ],
            [
                'icon' => 'ti ti-layout-dashboard',
                'name' => 'Website Themes & Templates',
                'slug' => 'website-themes-templates',
                'file_types' => ['ZIP', 'RAR'],
                'show_at_featured' => true,
                'show_at_nav' => true,
                'subcategories' => [
                    'WordPress Themes',
                    'HTML Templates',
                    'Shopify Themes',
                    'Magento Themes',
                    'Joomla Templates',
                    'WooCommerce Themes',
                    'Blogger Templates',
                ]
            ],
            [
                'icon' => 'ti ti-paint',
                'name' => 'Graphics & Design',
                'slug' => 'graphics-design',
                'file_types' => ['ZIP', 'RAR', 'PNG', 'JPG'],
                'show_at_featured' => true,
                'show_at_nav' => true,
                'subcategories' => [
                    'Logo Templates',
                    'UI/UX Kits',
                    'Illustrations & Icons',
                    'Web Elements',
                    'Business Card Templates',
                    'Print Templates',
                    '3D Models',
                ]
            ],
            [
                'icon' => 'ti ti-video',
                'name' => 'Video & Motion Graphics',
                'slug' => 'video-motion-graphics',
                'file_types' => ['MP4', 'MOV', 'ZIP', 'RAR', 'PNG', 'JPG'],
                'show_at_featured' => true,
                'show_at_nav' => false,
                'subcategories' => [
                    'Stock Footage',
                    'Motion Graphics',
                    'After Effects Templates',
                    'Premiere Pro Templates',
                    'YouTube Intro & Outro Templates',
                    'Broadcast Packages',
                ]
            ],
            [
                'icon' => 'ti ti-music',
                'name' => 'Audio & Music',
                'slug' => 'audio-music',
                'file_types' => ['MP3', 'WAV', 'ZIP', 'RAR', 'PNG', 'JPG'],
                'show_at_featured' => true,
                'show_at_nav' => false,
                'subcategories' => [
                    'Royalty-Free Music',
                    'Sound Effects',
                    'Beats & Background Music',
                    'Podcast Music',
                    'Jingles & Logo Sounds',
                ]
            ],
            [
                'icon' => 'ti ti-book',
                'name' => 'eBooks & Learning Materials',
                'slug' => 'ebooks-learning',
                'file_types' => ['PDF', 'DOC', 'ZIP', 'RAR', 'PNG', 'JPG'],
                'show_at_featured' => true,
                'show_at_nav' => false,
                'subcategories' => [
                    'Programming eBooks',
                    'Design & UI/UX eBooks',
                    'Marketing & SEO Guides',
                    'Photography & Videography',
                    'Business & Finance Books',
                ]
            ],
            [
                'icon' => 'ti ti-layers',
                'name' => 'Presentation Templates',
                'slug' => 'presentation-templates',
                'file_types' => ['PPTX', 'KEY', 'ZIP', 'RAR', 'PNG', 'JPG'],
                'show_at_featured' => false,
                'show_at_nav' => true,
                'subcategories' => [
                    'PowerPoint Templates',
                    'Keynote Templates',
                    'Google Slides Templates',
                    'Business Pitch Decks',
                ]
            ],
            // New Categories Added Below
            [
                'icon' => 'ti ti-camera',
                'name' => 'Photography',
                'slug' => 'photography',
                'file_types' => ['JPG', 'PNG', 'PSD', 'ZIP'],
                'show_at_featured' => true,
                'show_at_nav' => true,
                'subcategories' => [
                    'Stock Photos',
                    'Lightroom Presets',
                    'Photoshop Actions',
                    'Photo Overlays',
                    'Textures & Backgrounds',
                    'Photo Editing Templates',
                ]
            ],
            [
                'icon' => 'ti ti-chart-bar',
                'name' => 'Marketing & SEO',
                'slug' => 'marketing-seo',
                'file_types' => ['PDF', 'DOC', 'XLSX', 'ZIP', 'PNG', 'JPG'],
                'show_at_featured' => true,
                'show_at_nav' => true,
                'subcategories' => [
                    'Social Media Templates',
                    'Email Marketing Templates',
                    'SEO Tools & Guides',
                    'Landing Page Templates',
                    'Sales Funnel Templates',
                    'Google Ads Templates',
                ]
            ],
            [
                'icon' => 'ti ti-plug',
                'name' => 'Plugins & Extensions',
                'slug' => 'plugins-extensions',
                'file_types' => ['ZIP', 'RAR', 'PNG', 'JPG'],
                'show_at_featured' => true,
                'show_at_nav' => true,
                'subcategories' => [
                    'Browser Extensions',
                    'WordPress Plugins',
                    'Shopify Apps',
                    'Magento Extensions',
                    'Joomla Plugins',
                    'Chrome Extensions',
                ]
            ],
            [
                'icon' => 'ti ti-device-mobile',
                'name' => 'Mobile Apps',
                'slug' => 'mobile-apps',
                'file_types' => ['APK', 'ZIP', 'RAR', 'PNG', 'JPG'],
                'show_at_featured' => true,
                'show_at_nav' => true,
                'subcategories' => [
                    'Android Apps',
                    'iOS Apps',
                    'Flutter Templates',
                    'React Native Templates',
                    'Mobile UI Kits',
                    'App Marketing Templates',
                ]
            ],
        ];

        // Insert categories and get IDs
        foreach ($categories as $category) {
            $categoryId = DB::table('categories')->insertGetId([
                'icon' => $category['icon'],
                'name' => $category['name'],
                'slug' => $category['slug'],
                'file_types' => json_encode($category['file_types']),
                'show_at_featured' => $category['show_at_featured'],
                'show_at_nav' => $category['show_at_nav'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Insert subcategories
            foreach ($category['subcategories'] as $sub) {
                DB::table('sub_categories')->insert([
                    'category_id' => $categoryId,
                    'name' => $sub,
                    'slug' => Str::slug($sub),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }

}
