<?php

namespace Database\Seeders;

use App\Models\HeroSection;
use Illuminate\Database\Seeder;

class HeroSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HeroSection::create([
            'title' => 'Premium Energy Supplements',
            'subtitle' => 'FUEL<br>YOUR<br>POTENTIAL',
            'button_text' => 'Shop Now',
            'button_link' => '/products',
            'background_image' => null,
            'video_url' => null,
            'is_active' => true,
            'sort_order' => 1,
        ]);

        HeroSection::create([
            'title' => 'Peak Performance',
            'subtitle' => 'UNLEASH<br>YOUR<br>POWER',
            'button_text' => 'Explore Products',
            'button_link' => '/products',
            'background_image' => null,
            'video_url' => null,
            'is_active' => true,
            'sort_order' => 2,
        ]);

        HeroSection::create([
            'title' => 'Clean Energy',
            'subtitle' => 'NO CRASH.<br>NO JITTERS.<br>JUST POWER.',
            'button_text' => 'Get Started',
            'button_link' => '/products',
            'background_image' => null,
            'video_url' => null,
            'is_active' => true,
            'sort_order' => 3,
        ]);
    }
}
