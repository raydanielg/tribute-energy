<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Product::create([
            'name' => 'Tribute Pro',
            'slug' => 'tribute-pro',
            'description' => 'High-performance energy drink with 200mg natural caffeine, L-theanine, and B-vitamins for sustained focus without the crash.',
            'price' => 4.99,
            'original_price' => null,
            'color' => 'linear-gradient(135deg, #FF6B00, #FFB800)',
            'color_start' => '#FF6B00',
            'color_end' => '#FFB800',
            'flavor' => 'Orange',
            'size' => '12oz',
            'rating' => 5,
            'reviews' => 24,
            'specs' => json_encode([
                'Caffeine: 200mg',
                'L-Theanine: 200mg',
                'B-Vitamins: B3, B6, B12',
                'Size: 12oz can',
                'Calories: 10',
                'Sugar: 0g'
            ]),
            'category' => 'drink',
            'is_featured' => true,
            'is_new' => false,
            'is_sale' => false,
            'is_active' => true
        ]);

        \App\Models\Product::create([
            'name' => 'Tribute Zero',
            'slug' => 'tribute-zero',
            'description' => 'Zero-calorie energy drink with clean caffeine and no artificial sweeteners. Perfect for fasting and keto diets.',
            'price' => 4.99,
            'original_price' => null,
            'color' => 'linear-gradient(135deg, #00D4FF, #0099CC)',
            'color_start' => '#00D4FF',
            'color_end' => '#0099CC',
            'flavor' => 'Citrus',
            'size' => '12oz',
            'rating' => 5,
            'reviews' => 18,
            'specs' => json_encode([
                'Caffeine: 200mg',
                'Calories: 0',
                'Sugar: 0g',
                'Size: 12oz can',
                'Sweetener: Stevia',
                'Flavor: Citrus'
            ]),
            'category' => 'drink',
            'is_featured' => true,
            'is_new' => true,
            'is_sale' => false,
            'is_active' => true
        ]);

        \App\Models\Product::create([
            'name' => 'Tribute Powder',
            'slug' => 'tribute-powder',
            'description' => 'Concentrated energy powder that mixes with water. Portable and customizable strength for your perfect energy boost.',
            'price' => 29.99,
            'original_price' => 39.99,
            'color' => 'linear-gradient(135deg, #FF6B00, #FF4500)',
            'color_start' => '#FF6B00',
            'color_end' => '#FF4500',
            'flavor' => 'Orange',
            'size' => '30 Servings',
            'rating' => 5,
            'reviews' => 32,
            'specs' => json_encode([
                'Servings: 30',
                'Caffeine: 200mg/serving',
                'L-Theanine: 200mg/serving',
                'Flavor: Orange',
                'Mixes with: Water',
                'Portable: Yes'
            ]),
            'category' => 'powder',
            'is_featured' => true,
            'is_new' => false,
            'is_sale' => true,
            'is_active' => true
        ]);

        \App\Models\Product::create([
            'name' => 'Tribute Berry',
            'slug' => 'tribute-berry',
            'description' => 'Fruity energy drink with natural berry flavors and the same powerful energy formula as Tribute Pro.',
            'price' => 4.99,
            'original_price' => null,
            'color' => 'linear-gradient(135deg, #FF6B6B, #FF4444)',
            'color_start' => '#FF6B6B',
            'color_end' => '#FF4444',
            'flavor' => 'Mixed Berry',
            'size' => '12oz',
            'rating' => 4,
            'reviews' => 15,
            'specs' => json_encode([
                'Caffeine: 200mg',
                'L-Theanine: 200mg',
                'Flavor: Mixed Berry',
                'Size: 12oz can',
                'Calories: 15',
                'Sugar: 2g'
            ]),
            'category' => 'drink',
            'is_featured' => false,
            'is_new' => true,
            'is_sale' => false,
            'is_active' => true
        ]);

        \App\Models\Product::create([
            'name' => 'Tribute Citrus',
            'slug' => 'tribute-citrus',
            'description' => 'Refreshing citrus energy drink with lemon-lime flavor and electrolytes for hydration.',
            'price' => 4.99,
            'original_price' => null,
            'color' => 'linear-gradient(135deg, #FFD700, #FFA500)',
            'color_start' => '#FFD700',
            'color_end' => '#FFA500',
            'flavor' => 'Lemon-Lime',
            'size' => '12oz',
            'rating' => 4,
            'reviews' => 12,
            'specs' => json_encode([
                'Caffeine: 200mg',
                'L-Theanine: 200mg',
                'Flavor: Lemon-Lime',
                'Size: 12oz can',
                'Electrolytes: Yes',
                'Calories: 10'
            ]),
            'category' => 'drink',
            'is_featured' => false,
            'is_new' => false,
            'is_sale' => false,
            'is_active' => true
        ]);

        \App\Models\Product::create([
            'name' => 'Performance Bundle',
            'slug' => 'performance-bundle',
            'description' => 'Complete performance pack: 12 cans of Tribute Pro + 1 tub of Tribute Powder. Everything you need for peak performance.',
            'price' => 79.99,
            'original_price' => 99.99,
            'color' => 'linear-gradient(135deg, #1A1A2E, #16213E)',
            'color_start' => '#1A1A2E',
            'color_end' => '#16213E',
            'flavor' => 'Variety',
            'size' => 'Bundle',
            'rating' => 5,
            'reviews' => 45,
            'specs' => json_encode([
                'Tribute Pro: 12 cans',
                'Tribute Powder: 1 tub',
                'Total Servings: 42',
                'Savings: $20',
                'Free Shipping: Yes',
                'Gift Box: Included'
            ]),
            'category' => 'bundle',
            'is_featured' => true,
            'is_new' => false,
            'is_sale' => true,
            'is_active' => true
        ]);

        \App\Models\Product::create([
            'name' => 'Starter Pack',
            'slug' => 'starter-pack',
            'description' => 'Perfect introduction to Tribute Energy: 4 cans each of Pro, Zero, Berry, and Citrus flavors.',
            'price' => 19.99,
            'original_price' => null,
            'color' => 'linear-gradient(135deg, #4ECDC4, #44A08D)',
            'color_start' => '#4ECDC4',
            'color_end' => '#44A08D',
            'flavor' => 'Variety',
            'size' => '16 Cans',
            'rating' => 4,
            'reviews' => 21,
            'specs' => json_encode([
                'Variety Pack: 16 cans',
                'Flavors: 4 different',
                'Caffeine: 200mg per can',
                'Perfect for: Trying all flavors',
                'Free Shipping: Yes',
                'Sampler: Yes'
            ]),
            'category' => 'bundle',
            'is_featured' => false,
            'is_new' => true,
            'is_sale' => false,
            'is_active' => true
        ]);

        \App\Models\Product::create([
            'name' => 'Tribute Night',
            'slug' => 'tribute-night',
            'description' => 'Recovery drink with magnesium, zinc, and melatonin for post-workout recovery and better sleep.',
            'price' => 5.99,
            'original_price' => null,
            'color' => 'linear-gradient(135deg, #667eea, #764ba2)',
            'color_start' => '#667eea',
            'color_end' => '#764ba2',
            'flavor' => 'Berry',
            'size' => '12oz',
            'rating' => 4,
            'reviews' => 9,
            'specs' => json_encode([
                'Magnesium: 200mg',
                'Zinc: 15mg',
                'Melatonin: 3mg',
                'Size: 12oz can',
                'Caffeine: 0mg',
                'Purpose: Recovery'
            ]),
            'category' => 'drink',
            'is_featured' => false,
            'is_new' => true,
            'is_sale' => false,
            'is_active' => true
        ]);
    }
}
