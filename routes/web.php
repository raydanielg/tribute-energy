<?php

use Illuminate\Support\Facades\Route;

// Landing page
Route::get('/', function () {
    return view('landing');
})->name('home');

// Products page
Route::get('/products', function () {
    return view('products');
})->name('products');

// Gallery page
Route::get('/gallery', function () {
    return view('gallery');
})->name('gallery');

// Product detail page (SEO-friendly)
Route::get('/product/{id}', function ($id) {
    // Product data (in production, this would come from a database)
    $products = [
        1 => [
            'name' => 'Solar Panel 300W',
            'price' => 450000,
            'color' => 'linear-gradient(135deg, #fff7ed, #ffedd5)',
            'rating' => '★★★★★',
            'reviews' => '(24 reviews)',
            'description' => 'High-efficiency monocrystalline solar panel designed for both residential and commercial applications. Features advanced PERC technology for maximum power output and durability in all weather conditions.',
            'specs' => [
                'Power Output: 300W',
                'Type: Monocrystalline',
                'Efficiency: 18.5%',
                'Dimensions: 1650 x 992 x 35mm',
                'Weight: 18.5kg',
                'Warranty: 25 years'
            ]
        ],
        2 => [
            'name' => 'Solar Water Pump 2HP',
            'price' => 1200000,
            'color' => 'linear-gradient(135deg, #dbeafe, #bfdbfe)',
            'rating' => '★★★★★',
            'reviews' => '(18 reviews)',
            'description' => 'Efficient solar-powered water pump perfect for irrigation and domestic water supply. Works directly with solar panels without batteries, making it cost-effective and environmentally friendly.',
            'specs' => [
                'Power: 2HP',
                'Flow Rate: 10-15 m³/h',
                'Head: 30-50m',
                'Voltage: 24V DC',
                'IP Rating: IP68',
                'Warranty: 2 years'
            ]
        ],
        3 => [
            'name' => 'Hybrid Inverter 5kW',
            'price' => 2500000,
            'color' => 'linear-gradient(135deg, #dcfce7, #bbf7d0)',
            'rating' => '★★★★★',
            'reviews' => '(32 reviews)',
            'description' => 'Advanced hybrid inverter for seamless switching between solar and grid power. Features MPPT technology for maximum solar harvest and pure sine wave output for sensitive electronics.',
            'specs' => [
                'Capacity: 5kW',
                'Type: Hybrid',
                'Input Voltage: 48V DC',
                'Output: 230V AC',
                'Efficiency: 95%',
                'Warranty: 5 years'
            ]
        ],
        4 => [
            'name' => 'Solar Battery 200Ah',
            'price' => 850000,
            'color' => 'linear-gradient(135deg, #f3e8ff, #e9d5ff)',
            'rating' => '★★★★',
            'reviews' => '(15 reviews)',
            'description' => 'Deep cycle solar battery designed for energy storage and backup power. Features long cycle life and maintenance-free operation for reliable performance.',
            'specs' => [
                'Capacity: 200Ah',
                'Voltage: 12V',
                'Type: Deep Cycle',
                'Cycle Life: 1500 cycles',
                'Weight: 55kg',
                'Warranty: 3 years'
            ]
        ],
        5 => [
            'name' => 'Solar Controller 30A',
            'price' => 350000,
            'color' => 'linear-gradient(135deg, #fef9c3, #fef08a)',
            'rating' => '★★★★',
            'reviews' => '(12 reviews)',
            'description' => 'MPPT solar charge controller for optimal battery charging efficiency. Maximizes power harvest from solar panels and protects batteries from overcharging.',
            'specs' => [
                'Current: 30A',
                'Type: MPPT',
                'Voltage: 12V/24V',
                'Efficiency: 98%',
                'Display: LCD',
                'Warranty: 2 years'
            ]
        ],
        6 => [
            'name' => 'Complete Solar Kit',
            'price' => 4200000,
            'color' => 'linear-gradient(135deg, #fee2e2, #fecaca)',
            'rating' => '★★★★★',
            'reviews' => '(45 reviews)',
            'description' => 'All-in-one solar kit with everything you need for a complete solar installation. Includes panels, inverter, battery, controller, and mounting hardware.',
            'specs' => [
                'Solar Panels: 4x 300W',
                'Inverter: 3kW Hybrid',
                'Battery: 200Ah',
                'Controller: 40A MPPT',
                'Mounting: Complete set',
                'Warranty: 2-5 years'
            ]
        ],
        7 => [
            'name' => 'Submersible Pump 3HP',
            'price' => 1800000,
            'color' => 'linear-gradient(135deg, #e0e7ff, #c7d2fe)',
            'rating' => '★★★★',
            'reviews' => '(21 reviews)',
            'description' => 'Deep well submersible pump designed for agricultural and domestic water supply. Highly efficient and reliable for deep water extraction.',
            'specs' => [
                'Power: 3HP',
                'Flow Rate: 15-20 m³/h',
                'Head: 50-80m',
                'Voltage: 380V AC',
                'IP Rating: IP68',
                'Warranty: 2 years'
            ]
        ],
        8 => [
            'name' => 'Mounting Structure',
            'price' => 280000,
            'color' => 'linear-gradient(135deg, #fce7f3, #fbcfe8)',
            'rating' => '★★★★',
            'reviews' => '(9 reviews)',
            'description' => 'Durable aluminum mounting structure for solar panel installation. Corrosion-resistant and designed for easy installation on various roof types.',
            'specs' => [
                'Material: Aluminum',
                'Panels: Up to 6x',
                'Type: Roof Mount',
                'Weight Capacity: 200kg',
                'Finish: Anodized',
                'Warranty: 10 years'
            ]
        ]
    ];

    $product = $products[$id] ?? null;
    
    if (!$product) {
        abort(404);
    }
    
    return view('product-detail', compact('product'));
})->name('product.detail');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('user.home')->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    
    // Admin routes
    Route::prefix('admin')->name('admin.')->group(function () {
        // Users management
        Route::prefix('users')->name('users.')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('index');
            Route::get('/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('create');
            Route::post('/', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('store');
            Route::get('/{user}', [App\Http\Controllers\Admin\UserController::class, 'show'])->name('show');
            Route::get('/{user}/edit', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('edit');
            Route::put('/{user}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('update');
            Route::delete('/{user}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('destroy');
        });
        
        // Products management
        Route::prefix('products')->name('products.')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('index');
            Route::get('/create', [App\Http\Controllers\Admin\ProductController::class, 'create'])->name('create');
            Route::post('/', [App\Http\Controllers\Admin\ProductController::class, 'store'])->name('store');
            Route::get('/{product}', [App\Http\Controllers\Admin\ProductController::class, 'show'])->name('show');
            Route::get('/{product}/edit', [App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('edit');
            Route::put('/{product}', [App\Http\Controllers\Admin\ProductController::class, 'update'])->name('update');
            Route::delete('/{product}', [App\Http\Controllers\Admin\ProductController::class, 'destroy'])->name('destroy');
        });
        
        // Gallery management
        Route::prefix('gallery')->name('gallery.')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\GalleryController::class, 'index'])->name('index');
            Route::get('/create', [App\Http\Controllers\Admin\GalleryController::class, 'create'])->name('create');
            Route::post('/', [App\Http\Controllers\Admin\GalleryController::class, 'store'])->name('store');
            Route::get('/{gallery}', [App\Http\Controllers\Admin\GalleryController::class, 'show'])->name('show');
            Route::get('/{gallery}/edit', [App\Http\Controllers\Admin\GalleryController::class, 'edit'])->name('edit');
            Route::put('/{gallery}', [App\Http\Controllers\Admin\GalleryController::class, 'update'])->name('update');
            Route::delete('/{gallery}', [App\Http\Controllers\Admin\GalleryController::class, 'destroy'])->name('destroy');
        });
    });
});
