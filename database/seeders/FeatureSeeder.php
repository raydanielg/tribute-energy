<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Feature::create([
            'title' => 'Clinical Formula',
            'description' => 'Every ingredient dosed at clinical levels — not proprietary blends hiding under-dosed actives.',
            'icon' => '⚡',
            'image' => null,
            'is_active' => true,
            'sort_order' => 1,
        ]);

        Feature::create([
            'title' => 'Clean Ingredients',
            'description' => 'Zero artificial dyes, no synthetic sweeteners. Just clean energy from nature-identical compounds.',
            'icon' => '🌿',
            'image' => null,
            'is_active' => true,
            'sort_order' => 2,
        ]);

        Feature::create([
            'title' => 'Third-Party Tested',
            'description' => 'Every batch independently tested for purity, potency, and banned substances. No shortcuts.',
            'icon' => '🔬',
            'image' => null,
            'is_active' => true,
            'sort_order' => 3,
        ]);

        Feature::create([
            'title' => 'Sustained Energy',
            'description' => 'Engineered release formula keeps you sharp for 6+ hours without jitters or the dreaded crash.',
            'icon' => '⚙️',
            'image' => null,
            'is_active' => true,
            'sort_order' => 4,
        ]);
    }
}
