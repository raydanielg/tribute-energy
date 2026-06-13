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
            'name' => 'Solar Panel 300W',
            'description' => 'High-efficiency monocrystalline solar panel designed for both residential and commercial applications. Features advanced PERC technology for maximum power output and durability in all weather conditions.',
            'price' => 450000.00,
            'color' => 'linear-gradient(135deg, #fff7ed, #ffedd5)',
            'rating' => '★★★★★',
            'reviews' => '(24 reviews)',
            'specs' => json_encode([
                'Power Output: 300W',
                'Type: Monocrystalline',
                'Efficiency: 18.5%',
                'Dimensions: 1650 x 992 x 35mm',
                'Weight: 18.5kg',
                'Warranty: 25 years'
            ]),
            'category' => 'solar-panels',
            'is_new' => true,
            'is_active' => true
        ]);

        \App\Models\Product::create([
            'name' => 'Solar Water Pump 2HP',
            'description' => 'Efficient solar-powered water pump perfect for irrigation and domestic water supply. Works directly with solar panels without batteries, making it cost-effective and environmentally friendly.',
            'price' => 1200000,
            'color' => 'linear-gradient(135deg, #dbeafe, #bfdbfe)',
            'rating' => '★★★★★',
            'reviews' => '(18 reviews)',
            'specs' => json_encode([
                'Power: 2HP',
                'Flow Rate: 10-15 m³/h',
                'Head: 30-50m',
                'Voltage: 24V DC',
                'IP Rating: IP68',
                'Warranty: 2 years'
            ]),
            'category' => 'water-pumps',
            'is_active' => true
        ]);

        \App\Models\Product::create([
            'name' => 'Hybrid Inverter 5kW',
            'description' => 'Advanced hybrid inverter for seamless switching between solar and grid power. Features MPPT technology for maximum solar harvest and pure sine wave output for sensitive electronics.',
            'price' => 2500000,
            'color' => 'linear-gradient(135deg, #dcfce7, #bbf7d0)',
            'rating' => '★★★★★',
            'reviews' => '(32 reviews)',
            'specs' => json_encode([
                'Capacity: 5kW',
                'Type: Hybrid',
                'Input Voltage: 48V DC',
                'Output: 230V AC',
                'Efficiency: 95%',
                'Warranty: 5 years'
            ]),
            'category' => 'inverters',
            'is_featured' => true,
            'is_active' => true
        ]);

        \App\Models\Product::create([
            'name' => 'Solar Battery 200Ah',
            'description' => 'Deep cycle solar battery designed for energy storage and backup power. Features long cycle life and maintenance-free operation for reliable performance.',
            'price' => 850000,
            'color' => 'linear-gradient(135deg, #f3e8ff, #e9d5ff)',
            'rating' => '★★★★',
            'reviews' => '(15 reviews)',
            'specs' => json_encode([
                'Capacity: 200Ah',
                'Voltage: 12V',
                'Type: Deep Cycle',
                'Cycle Life: 1500 cycles',
                'Weight: 55kg',
                'Warranty: 3 years'
            ]),
            'category' => 'batteries',
            'is_active' => true
        ]);

        \App\Models\Product::create([
            'name' => 'Solar Controller 30A',
            'description' => 'MPPT solar charge controller for optimal battery charging efficiency. Maximizes power harvest from solar panels and protects batteries from overcharging.',
            'price' => 350000,
            'color' => 'linear-gradient(135deg, #fef9c3, #fef08a)',
            'rating' => '★★★★',
            'reviews' => '(12 reviews)',
            'specs' => json_encode([
                'Current: 30A',
                'Type: MPPT',
                'Voltage: 12V/24V',
                'Efficiency: 98%',
                'Display: LCD',
                'Warranty: 2 years'
            ]),
            'category' => 'controllers',
            'is_active' => true
        ]);

        \App\Models\Product::create([
            'name' => 'Complete Solar Kit',
            'description' => 'All-in-one solar kit with everything you need for a complete solar installation. Includes panels, inverter, battery, controller, and mounting hardware.',
            'price' => 4200000,
            'original_price' => 5000000,
            'color' => 'linear-gradient(135deg, #fee2e2, #fecaca)',
            'rating' => '★★★★★',
            'reviews' => '(45 reviews)',
            'specs' => json_encode([
                'Solar Panels: 4x 300W',
                'Inverter: 3kW Hybrid',
                'Battery: 200Ah',
                'Controller: 40A MPPT',
                'Mounting: Complete set',
                'Warranty: 2-5 years'
            ]),
            'category' => 'kits',
            'is_featured' => true,
            'is_sale' => true,
            'is_active' => true
        ]);

        \App\Models\Product::create([
            'name' => 'Submersible Pump 3HP',
            'description' => 'Deep well submersible pump designed for agricultural and domestic water supply. Highly efficient and reliable for deep water extraction.',
            'price' => 1800000,
            'color' => 'linear-gradient(135deg, #e0e7ff, #c7d2fe)',
            'rating' => '★★★★',
            'reviews' => '(21 reviews)',
            'specs' => json_encode([
                'Power: 3HP',
                'Flow Rate: 15-20 m³/h',
                'Head: 50-80m',
                'Voltage: 380V AC',
                'IP Rating: IP68',
                'Warranty: 2 years'
            ]),
            'category' => 'water-pumps',
            'is_active' => true
        ]);

        \App\Models\Product::create([
            'name' => 'Mounting Structure',
            'description' => 'Durable aluminum mounting structure for solar panel installation. Corrosion-resistant and designed for easy installation on various roof types.',
            'price' => 280000,
            'color' => 'linear-gradient(135deg, #fce7f3, #fbcfe8)',
            'rating' => '★★★★',
            'reviews' => '(9 reviews)',
            'specs' => json_encode([
                'Material: Aluminum',
                'Panels: Up to 6x',
                'Type: Roof Mount',
                'Weight Capacity: 200kg',
                'Finish: Anodized',
                'Warranty: 10 years'
            ]),
            'category' => 'accessories',
            'is_active' => true
        ]);
    }
}
