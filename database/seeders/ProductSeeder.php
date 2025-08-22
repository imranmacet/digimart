<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'icon' => 'ti ti-code',
                'name' => 'Code & Scripts',
                'slug' => 'code-scripts',
                'file_types' => ['ZIP', 'RAR', 'JPG', 'PNG'],
                'show_at_featured' => true,
                'show_at_nav' => true,
                'subcategories' => [
                    'PHP Scripts' => [
                        'EzyBook Online Booking System',
                        'SocialSphere Social Network Platform',
                        'Eventify Event Management Solution',
                        'Learnify E-Learning Platform',
                        'RealtyHub Real Estate Script',
                        'JobConnect Job Board Software',
                        'ForumFusion Community Forum Script',
                        'Blogify Advanced Blogging Platform',
                        'MemberZone Membership System',
                        'ShopEzy E-Commerce Script',
                    ],
                    'WordPress Plugins' => [
                        'SEO Master Advanced SEO Plugin',
                        'ShopWise E-Commerce Plugin',
                        'MemberGate Membership Plugin',
                        'FormCraft Form Builder Plugin',
                        'SocialWave Social Media Plugin',
                        'SecureShield Security Plugin',
                        'SpeedBoost Optimization Plugin',
                        'NewsLetterPro Newsletter Plugin',
                        'Analytix Analytics Plugin',
                        'PolyLang Multilingual Plugin',
                    ],
                    'JavaScript Code' => [
                        'SlideMagic Image Slider',
                        'ValidatePro Form Validator',
                        'ChatSphere Chat Application',
                        'Weatherly Weather App',
                        'Quizzy Interactive Quiz App',
                        'TaskTrek To-Do List Manager',
                        'Calendara Calendar Widget',
                        'ParallaxFX Scrolling Effects',
                        'Animotion Animation Library',
                        'DataViz Data Visualization Tool',
                    ],
                    'Mobile App Source Code' => [
                        'FashionCart Flutter E-Commerce App',
                        'Socially React Native Social Media App',
                        'FitTrack Ionic Fitness Tracker',
                        'Foodie SwiftUI Food Delivery App',
                        'MelodyBox Kotlin Music Player',
                        'TravelEase Flutter Travel Booking',
                        'Newsly React Native News App',
                        'EduSphere Ionic Learning App',
                        'Evently SwiftUI Event Planner',
                        'Expensee Kotlin Expense Tracker',
                    ],
                ],
            ],
            [
                'icon' => 'ti ti-layout-dashboard',
                'name' => 'Website Themes & Templates',
                'slug' => 'website-themes-templates',
                'file_types' => ['ZIP', 'RAR', 'JPG', 'PNG'],
                'show_at_featured' => true,
                'show_at_nav' => true,
                'subcategories' => [
                    'WordPress Themes' => [
                        'AstraPro Multipurpose Theme',
                        'DiviMax Drag-and-Drop Theme',
                        'OceanWP Business Theme',
                        'Neve Minimalist Theme',
                        'Hestia One-Page Theme',
                        'Avenue Blogging Theme',
                        'Storefront WooCommerce Theme',
                        'Enfold Creative Theme',
                        'Salient Responsive Theme',
                        'Uncode Creative Multiuse Theme',
                    ],
                    'HTML Templates' => [
                        'BootstrapLand Landing Page Template',
                        'MaterialX Admin Dashboard',
                        'CreativeFolio Portfolio Template',
                        'Startuply Startup Template',
                        'ElegantX Corporate Template',
                        'MinimalistX Minimal Template',
                        'TravelGo Travel Agency Template',
                        'Foodie Restaurant Template',
                        'EduZone Education Template',
                        'MediCare Health Template',
                    ],
                    'Shopify Themes' => [
                        'ShopifyX Multipurpose Theme',
                        'Fashionista Fashion Theme',
                        'ElectroHub Electronics Theme',
                        'OrganicLife Organic Store Theme',
                        'JewelCraft Jewelry Theme',
                        'FurniShop Furniture Theme',
                        'BookNook Bookstore Theme',
                        'PetCare Pet Store Theme',
                        'Sportify Sports Theme',
                        'TechGadget Tech Store Theme',
                    ],
                ],
            ],
            [
                'icon' => 'ti ti-paint',
                'name' => 'Graphics & Design',
                'slug' => 'graphics-design',
                'file_types' => ['ZIP', 'RAR', 'JPG', 'PNG'],
                'show_at_featured' => true,
                'show_at_nav' => true,
                'subcategories' => [
                    'Logo Templates' => [
                        'BrandCraft Logo Pack',
                        'LogoGenius Business Logos',
                        'CreativeMark Branding Kit',
                        'MinimalLogos Modern Designs',
                        'VintageLogo Collection',
                        'TechLogos Futuristic Designs',
                        'EcoLogos Nature-Inspired',
                        'LuxuryLogos Premium Collection',
                        'SportsLogos Dynamic Designs',
                        'FoodLogos Culinary Branding',
                    ],
                    'UI/UX Kits' => [
                        'PixelPerfect UI Kit',
                        'MaterialX Dashboard Kit',
                        'NeonGlow Dark UI Kit',
                        'FlatDesign Modern Kit',
                        'BoldUI Creative Kit',
                        'MinimalX Clean UI Kit',
                        'FuturisticX Advanced Kit',
                        'EcoUI Nature-Inspired Kit',
                        'LuxuryUI Premium Kit',
                        'TechUI Futuristic Kit',
                    ],
                    'Illustrations & Icons' => [
                        'Artify Illustration Pack',
                        'IconGenius Icon Collection',
                        'HandDrawn Sketch Pack',
                        'FlatIcons Modern Set',
                        'LineArt Minimalist Pack',
                        '3DIcons Futuristic Set',
                        'NatureIcons Eco-Friendly',
                        'BusinessIcons Professional Set',
                        'SocialIcons Media Pack',
                        'TechIcons Futuristic Set',
                    ],
                ],
            ],
            [
                'icon' => 'ti ti-video',
                'name' => 'Video & Motion Graphics',
                'slug' => 'video-motion-graphics',
                'file_types' => ['MP4', 'MOV', 'ZIP', 'RAR', 'JPG', 'PNG'],
                'show_at_featured' => true,
                'show_at_nav' => true,
                'subcategories' => [
                    'Stock Footage' => [
                        'CityLife Urban Footage',
                        'NatureScapes Landscape Videos',
                        'TechWorld Futuristic Clips',
                        'TravelDiaries Adventure Footage',
                        'BusinessScenes Corporate Videos',
                        'SportsAction Dynamic Clips',
                        'FoodieCulinary Cooking Videos',
                        'WildlifeNature Animal Clips',
                        'RetroVintage Classic Footage',
                        'SciFiWorld Futuristic Clips',
                    ],
                    'Motion Graphics' => [
                        'MotionFX Dynamic Graphics',
                        'NeonGlow Animated Elements',
                        'FlatMotion Modern Designs',
                        'BoldMotion Creative Kit',
                        'MinimalMotion Clean Graphics',
                        'FuturisticX Advanced Animations',
                        'EcoMotion Nature-Inspired',
                        'LuxuryMotion Premium Kit',
                        'TechMotion Futuristic Designs',
                        'CorporateMotion Business Kit',
                    ],
                    'After Effects Templates' => [
                        'AEFX Dynamic Templates',
                        'NeonGlow AE Pack',
                        'FlatDesign AE Templates',
                        'BoldAE Creative Kit',
                        'MinimalAE Clean Templates',
                        'FuturisticAE Advanced Kit',
                        'EcoAE Nature-Inspired',
                        'LuxuryAE Premium Templates',
                        'TechAE Futuristic Designs',
                        'CorporateAE Business Kit',
                    ],
                ],
            ],
            [
                'icon' => 'ti ti-music',
                'name' => 'Audio & Music',
                'slug' => 'audio-music',
                'file_types' => ['MP3', 'WAV', 'ZIP', 'RAR', 'JPG', 'PNG'],
                'show_at_featured' => true,
                'show_at_nav' => true,
                'subcategories' => [
                    'Royalty-Free Music' => [
                        'EpicCinema Orchestral Tracks',
                        'ChillVibes Relaxing Music',
                        'UrbanBeats Hip-Hop Tracks',
                        'NatureSounds Ambient Music',
                        'RetroWave Synthwave Tracks',
                        'JazzNights Smooth Jazz',
                        'RockAnthem Classic Rock',
                        'EDMEnergy Electronic Tracks',
                        'ClassicalElegance Orchestral',
                        'WorldMusic Cultural Tracks',
                    ],
                    'Sound Effects' => [
                        'CitySounds Urban Effects',
                        'NatureScapes Ambient Effects',
                        'TechWorld Futuristic Sounds',
                        'SportsAction Dynamic Effects',
                        'FoodieCulinary Cooking Sounds',
                        'WildlifeNature Animal Sounds',
                        'RetroVintage Classic Effects',
                        'SciFiWorld Futuristic Sounds',
                        'HorrorFX Spooky Effects',
                        'FantasyWorld Magical Sounds',
                    ],
                    'Beats & Background Music' => [
                        'HipHopBeats Urban Tracks',
                        'ChillBeats Relaxing Music',
                        'EDMBeats Electronic Tracks',
                        'JazzBeats Smooth Background',
                        'RockBeats Energetic Tracks',
                        'CinematicBeats Orchestral',
                        'RetroBeats Synthwave Tracks',
                        'WorldBeats Cultural Music',
                        'CorporateBeats Business Tracks',
                        'FantasyBeats Magical Music',
                    ],
                ],
            ],
            [
                'icon' => 'ti ti-book',
                'name' => 'eBooks & Learning Materials',
                'slug' => 'ebooks-learning',
                'file_types' => ['PDF', 'DOC', 'ZIP', 'RAR', 'JPG', 'PNG'],
                'show_at_featured' => true,
                'show_at_nav' => true,
                'subcategories' => [
                    'Programming eBooks' => [
                        'Python Pro Mastery Guide',
                        'JavaScript Essentials',
                        'React Native Development',
                        'Flutter for Beginners',
                        'Advanced PHP Techniques',
                        'Data Science with Python',
                        'Machine Learning Basics',
                        'C++ Programming Guide',
                        'SwiftUI for iOS Developers',
                        'Kotlin for Android Devs',
                    ],
                    'Design & UI/UX eBooks' => [
                        'UI/UX Design Principles',
                        'Figma Mastery Guide',
                        'Adobe XD for Beginners',
                        'Web Design Best Practices',
                        'Mobile UI Design Trends',
                        'Typography Essentials',
                        'Color Theory for Designers',
                        'Design Systems Handbook',
                        'User Research Methods',
                        'Prototyping Techniques',
                    ],
                ],
            ],
            [
                'icon' => 'ti ti-layers',
                'name' => 'Presentation Templates',
                'slug' => 'presentation-templates',
                'file_types' => ['PPTX', 'KEY', 'ZIP', 'RAR', 'JPG', 'PNG'],
                'show_at_featured' => true,
                'show_at_nav' => true,
                'subcategories' => [
                    'PowerPoint Templates' => [
                        'BusinessPro Corporate Deck',
                        'CreativeX Modern Presentation',
                        'Minimalist Clean Slides',
                        'TechWorld Futuristic Deck',
                        'EcoFriendly Green Presentation',
                        'LuxuryPremium Elegant Slides',
                        'StartupPitch Investor Deck',
                        'EducationEdu Learning Slides',
                        'MedicalCare Health Presentation',
                        'TravelGo Adventure Slides',
                    ],
                    'Keynote Templates' => [
                        'BusinessKey Corporate Deck',
                        'CreativeKey Modern Presentation',
                        'MinimalKey Clean Slides',
                        'TechKey Futuristic Deck',
                        'EcoKey Green Presentation',
                        'LuxuryKey Elegant Slides',
                        'StartupKey Investor Deck',
                        'EducationKey Learning Slides',
                        'MedicalKey Health Presentation',
                        'TravelKey Adventure Slides',
                    ],
                ],
            ],
            [
                'icon' => 'ti ti-camera',
                'name' => 'Photography',
                'slug' => 'photography',
                'file_types' => ['JPG', 'PNG', 'PSD', 'ZIP', 'RAR'],
                'show_at_featured' => true,
                'show_at_nav' => true,
                'subcategories' => [
                    'Stock Photos' => [
                        'UrbanLife Cityscapes',
                        'NatureScapes Landscapes',
                        'TechWorld Futuristic Images',
                        'TravelDiaries Adventure Photos',
                        'BusinessScenes Corporate Shots',
                        'SportsAction Dynamic Images',
                        'FoodieCulinary Cooking Photos',
                        'WildlifeNature Animal Shots',
                        'RetroVintage Classic Photos',
                        'SciFiWorld Futuristic Images',
                    ],
                    'Lightroom Presets' => [
                        'UrbanMood City Presets',
                        'NatureGlow Landscape Presets',
                        'VintageVibes Retro Presets',
                        'ModernX Clean Presets',
                        'BoldColors Vibrant Presets',
                        'MinimalistX Subtle Presets',
                        'EcoTone Nature Presets',
                        'LuxuryGold Premium Presets',
                        'TechFuturism Modern Presets',
                        'FantasyDream Magical Presets',
                    ],
                ],
            ],
            [
                'icon' => 'ti ti-chart-bar',
                'name' => 'Marketing & Business Tools',
                'slug' => 'marketing-business-tools',
                'file_types' => ['PDF', 'DOC', 'XLSX', 'ZIP', 'JPG', 'PNG'],
                'show_at_featured' => true,
                'show_at_nav' => true,
                'subcategories' => [
                    'Social Media Templates' => [
                        'InstaPro Instagram Templates',
                        'SocialWave Facebook Covers',
                        'TweetMaster Twitter Graphics',
                        'PinterestPro Pin Templates',
                        'LinkedInBiz Professional Posts',
                        'YouTubeThumbnail Templates',
                        'TikTokTrending Video Templates',
                        'SocialCalendar Content Planner',
                        'BrandKit Social Media Pack',
                        'StoryCreator Instagram Stories',
                    ],
                    'Email Marketing Templates' => [
                        'MailCraft Newsletter Templates',
                        'PromoPro Email Campaigns',
                        'WelcomeSeries Email Templates',
                        'SalesFunnel Email Sequences',
                        'AbandonedCart Email Templates',
                        'EventPromo Email Designs',
                        'ProductLaunch Email Templates',
                        'HolidaySale Email Campaigns',
                        'CorporateMail Business Emails',
                        'MinimalistX Clean Email Designs',
                    ],
                    'SEO Tools & Guides' => [
                        'SEOMaster Keyword Research Tool',
                        'RankTracker SEO Analytics',
                        'BacklinkPro Link Building Guide',
                        'ContentGenius SEO Writing',
                        'OnPageSEO Optimization Checklist',
                        'TechnicalSEO Audit Tool',
                        'LocalSEO Business Guide',
                        'EcommerceSEO Product Optimization',
                        'SEOAudit Website Health Check',
                        'SEOTrends Industry Insights',
                    ],
                ],
            ],
            [
                'icon' => 'ti ti-plug',
                'name' => 'Plugins & Extensions',
                'slug' => 'plugins-extensions',
                'file_types' => ['ZIP', 'RAR', 'JPG', 'PNG'],
                'show_at_featured' => true,
                'show_at_nav' => true,
                'subcategories' => [
                    'Browser Extensions' => [
                        'AdBlocker Pro Extension',
                        'PasswordManager Secure Tool',
                        'DarkMode Nighttime Browsing',
                        'TabMaster Tab Organizer',
                        'GrammarlyX Writing Assistant',
                        'PrivacyGuard Security Extension',
                        'VideoDownloader Media Tool',
                        'ProductivityBoost Task Manager',
                        'LanguageTranslator Multilingual Tool',
                        'SEOAnalyzer Website Checker',
                    ],
                    'WordPress Plugins' => [
                        'WPSEO Master SEO Plugin',
                        'EcommercePro WooCommerce Plugin',
                        'FormBuilderX Contact Form Plugin',
                        'SecurityShield WP Protection',
                        'SpeedOptimizer Performance Plugin',
                        'SocialShare Social Media Plugin',
                        'AnalyticsPro Tracking Plugin',
                        'MembershipX Subscription Plugin',
                        'BackupMaster WP Backup Tool',
                        'MultilingualX Translation Plugin',
                    ],
                    'Shopify Apps' => [
                        'ShopifySEO Search Optimization',
                        'ProductUpsell Upsell App',
                        'AbandonedCart Recovery Tool',
                        'ReviewMaster Customer Feedback',
                        'SocialProof Sales Booster',
                        'EmailMarketing Pro Campaigns',
                        'InventoryManager Stock Tracker',
                        'DiscountPro Coupon App',
                        'ShippingMaster Delivery Tool',
                        'AnalyticsX Sales Tracker',
                    ],
                ],
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

            // Insert subcategories and products
            foreach ($category['subcategories'] as $subcategoryName => $products) {
                $subcategoryId = DB::table('sub_categories')->insertGetId([
                    'category_id' => $categoryId,
                    'name' => $subcategoryName,
                    'slug' => Str::slug($subcategoryName),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                foreach ($products as $product) {
                    if($category['name'] == 'Video & Motion Graphics') {
                        $type = 'video';
                        $previewFile = "/uploads/demo/video/".$this->getVideo();
                    } elseif($category['name'] == 'Audio & Music') {
                        $type = 'audio';
                        $previewFile = "/uploads/demo/audio/".$this->getAudio();
                    } else {
                        $type = 'image';
                        $previewFile = "/uploads/demo/".$this->getImage();
                    }


                    DB::table('items')->insert([
                        'author_id' => 2,
                        'name' => $product,
                        'slug' => Str::slug($product),
                        'description' => '<h3 id="item-description__explore-our-demo-amp-admin-panels">Explore Our Demo & Admin Panels</h3>
<p>Front End: <a href="https://skillgro.websolutionus.com/" rel="nofollow">https://skillgro.websolutionus.com/</a></p>
<p>Admin Panel: <a href="https://skillgro.websolutionus.com/admin" rel="nofollow">Login to Admin Panel</a><br>Admin Panel Login: <a href="mailto:admin@gmail.com">admin@gmail.com</a> | 1234</p>
<p>Student Login: <a href="https://skillgro.websolutionus.com/login" rel="nofollow">Login to Student Panel</a><br>Student Panel Login: <a href="mailto:student@gmail.com">student@gmail.com</a> | 1234</p>
<p>Instructor Login: <a href="https://skillgro.websolutionus.com/login" rel="nofollow">Login to Instructor Panel</a><br>Instructor Panel Login: <a href="mailto:instructor@gmail.com">instructor@gmail.com</a> | 1234</p>
<h2 id="item-description__documentation">Documentation</h2>
<p><a href="https://doc.websolutionus.com/skillgro" rel="nofollow">https://doc.websolutionus.com/skillgro</a></p>
<h2 id="item-description__about-skillgro">About SkillGro</h2>
<p>Skillgro is a comprehensive Learning Management System (LMS) tailored for instructors and educators. It allows educators to create, manage, and sell their online courses. Skillgro provides a seamless platform for offering interactive online courses. Designed with real-world educational needs in mind, Skillgro is equipped with a wide array of features to support the growth of your online education business in just a few hours.</p>
<p>Developed using the Laravel PHP framework, Skillgro guarantees robust security, protecting against SQL injection, XSS attacks, and CSRF attacks, ensuring a safe and reliable learning environment.</p>',
                        'category_id' => $categoryId,
                        'sub_category_id' => $subcategoryId,
                        'version' => '1.0',
                        'demo_link' => 'https://skillgro.websolutionus.com/',
                        'tags' => json_encode(['Laravel', 'PHP', 'LMS']),
                        'preview_type' => $type,
                        'preview_image' => $previewFile,
                        'preview_video' => $previewFile,
                        'preview_audio' => $previewFile,
                        'main_file' => '/uploads/items/67bbe88553e66.rar',
                        'screenshots' => json_encode(["/uploads/items/67bbe87b8f279.png", "/uploads/items/67bbe87bca25c.png", "/uploads/items/67bbe87bcc414.png", "/uploads/items/67bbe87bcdbc1.png"]),
                        'price' => rand(100, 400),
                        'is_main_file_external' => 0,
                        'total_sales' => 0,
                        'is_supported' => rand(0, 1),
                        'status' => 'approved',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }

    
    function getImage()
    {
        $files = array(
            'file_1.png',
            'file_2.png',
            'file_3.png',
            'file_4.png',
            'file_5.png',
            'file_6.png',
            'file_7.png',
            'file_8.png',
            'file_9.png',
            'file_10.png',
            'file_11.png',
            'file_12.png',
            'file_13.png',
            'file_14.png',
            'file_15.png',
            'file_16.png',
            'file_17.png',
            'file_18.png',
            'file_19.png',
            'file_20.png',
            'file_21.png',
            'file_22.png',
            'file_23.png',
            'file_24.png',
            'file_25.png',
            'file_26.png',
            'file_27.png',
            'file_28.png',
            'file_29.png',
            'file_30.png',
            'file_31.png',
            'file_32.png',
            'file_33.png',
            'file_34.png',
            'file_35.png',
            'file_36.png',
            'file_37.png',
            'file_38.png',
            'file_39.png',
            'file_40.png',
            'file_41.png',
            'file_42.png',
            'file_43.png',
            'file_44.png',
            'file_45.png',
            'file_46.png',
            'file_47.png',
            'file_48.png',
            'file_49.png',
            'file_50.png',
            'file_51.png',
            'file_52.png',
            'file_53.png',
            'file_54.png',
            'file_55.png',
            'file_56.png',
            'file_57.png',
            'file_58.png',
        );

        return $files[array_rand($files)];
    }

    function getVideo()
    {
        $files = array(
            'file_1.mp4',
            'file_2.mp4',
            'file_3.mp4',
            'file_4.mp4',
            'file_5.mp4',
            'file_6.mp4',
            'file_7.mp4',
            'file_8.mp4',
            'file_9.mp4',
        );

        return $files[array_rand($files)];
    }
    function getAudio()
    {
        $files = array(
            'file_1.mp3',
            'file_2.mp3',
            'file_3.mp3',
            'file_4.mp3',
            'file_5.mp3',
            'file_6.mp3',
            'file_7.mp3',
            'file_8.mp3',
            'file_9.mp3',
            'file_10.mp3',

        );

        return $files[array_rand($files)];
    }
}
