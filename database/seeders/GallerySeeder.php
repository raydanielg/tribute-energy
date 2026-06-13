<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Gallery::create([
            'title' => 'Solar Panel Installation',
            'description' => 'Residential solar panel installation in Dar es Salaam',
            'image' => 'gallery/solar-panel-installation.jpg',
            'category' => 'installations',
            'is_featured' => true,
            'order' => 1,
            'is_active' => true
        ]);

        \App\Models\Gallery::create([
            'title' => 'Water Pump System',
            'description' => 'Solar water pump for agricultural irrigation',
            'image' => 'gallery/water-pump-system.jpg',
            'category' => 'installations',
            'order' => 2,
            'is_active' => true
        ]);

        \App\Models\Gallery::create([
            'title' => 'Inverter Installation',
            'description' => 'Hybrid inverter setup for commercial building',
            'image' => 'gallery/inverter-installation.jpg',
            'category' => 'installations',
            'order' => 3,
            'is_active' => true
        ]);

        \App\Models\Gallery::create([
            'title' => 'Battery Storage',
            'description' => 'Battery bank installation for energy storage',
            'image' => 'gallery/battery-storage.jpg',
            'category' => 'installations',
            'order' => 4,
            'is_active' => true
        ]);

        \App\Models\Gallery::create([
            'title' => 'Solar Controller',
            'description' => 'MPPT controller installation and configuration',
            'image' => 'gallery/solar-controller.jpg',
            'category' => 'installations',
            'order' => 5,
            'is_active' => true
        ]);

        \App\Models\Gallery::create([
            'title' => 'Commercial Project',
            'description' => 'Large-scale solar installation for factory',
            'image' => 'gallery/commercial-project.jpg',
            'category' => 'commercial',
            'is_featured' => true,
            'order' => 6,
            'is_active' => true
        ]);

        \App\Models\Gallery::create([
            'title' => 'Residential Installation',
            'description' => 'Home solar system installation',
            'image' => 'gallery/residential-installation.jpg',
            'category' => 'residential',
            'order' => 7,
            'is_active' => true
        ]);

        \App\Models\Gallery::create([
            'title' => 'Community Project',
            'description' => 'Solar power for community center',
            'image' => 'gallery/community-project.jpg',
            'category' => 'community',
            'order' => 8,
            'is_active' => true
        ]);

        \App\Models\Gallery::create([
            'title' => 'Agricultural Project',
            'description' => 'Solar irrigation system for farm',
            'image' => 'gallery/agricultural-project.jpg',
            'category' => 'agricultural',
            'order' => 9,
            'is_active' => true
        ]);

        \App\Models\Gallery::create([
            'title' => 'Industrial Installation',
            'description' => 'Industrial solar power system',
            'image' => 'gallery/industrial-installation.jpg',
            'category' => 'industrial',
            'order' => 10,
            'is_active' => true
        ]);

        \App\Models\Gallery::create([
            'title' => 'Solar Farm',
            'description' => 'Large solar farm installation',
            'image' => 'gallery/solar-farm.jpg',
            'category' => 'commercial',
            'is_featured' => true,
            'order' => 11,
            'is_active' => true
        ]);

        \App\Models\Gallery::create([
            'title' => 'Night Installation',
            'description' => 'Solar system with battery backup at night',
            'image' => 'gallery/night-installation.jpg',
            'category' => 'residential',
            'order' => 12,
            'is_active' => true
        ]);
    }
}
