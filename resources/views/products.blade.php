<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Products - {{ config('app.name', 'Tribute Energy') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: {
                            "50":"#fff7ed",
                            "100":"#ffedd5",
                            "200":"#fed7aa",
                            "300":"#fdba74",
                            "400":"#fb923c",
                            "500":"#f97316",
                            "600":"#ea580c",
                            "700":"#c2410c",
                            "800":"#9a3412",
                            "900":"#7c2d12",
                            "950":"#431407"
                        }
                    },
                    fontFamily: {
                        'body': [
                            'Inter',
                            'ui-sans-serif',
                            'system-ui',
                            '-apple-system',
                            'system-ui',
                            'Segoe UI',
                            'Roboto',
                            'Helvetica Neue',
                            'Arial',
                            'Noto Sans',
                            'sans-serif',
                            'Apple Color Emoji',
                            'Segoe UI Emoji',
                            'Segoe UI Symbol',
                            'Noto Color Emoji'
                        ],
                        'sans': [
                            'Inter',
                            'ui-sans-serif',
                            'system-ui',
                            '-apple-system',
                            'system-ui',
                            'Segoe UI',
                            'Roboto',
                            'Helvetica Neue',
                            'Arial',
                            'Noto Sans',
                            'sans-serif',
                            'Apple Color Emoji',
                            'Segoe UI Emoji',
                            'Segoe UI Symbol',
                            'Noto Color Emoji'
                        ]
                    }
                }
            }
        }
    </script>
    <style>
        html {
            scroll-behavior: smooth;
        }
        .filter-sidebar {
            transform: translateX(-100%);
            transition: transform 0.3s ease;
        }
        .filter-sidebar.open {
            transform: translateX(0);
        }
        .product-grid-view {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.5rem;
        }
        .product-card-view {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }
    </style>
</head>
<body class="bg-gray-50">
    @include('partials.landing-header')

    <main class="pt-20 min-h-screen">
        <div class="max-w-screen-2xl mx-auto px-4 lg:px-8 py-8">
            <div class="flex flex-col lg:flex-row gap-8">
                
                {{-- Mobile Filter Button --}}
                <button id="mobileFilterBtn" class="lg:hidden fixed bottom-6 right-6 z-50 w-14 h-14 rounded-full shadow-lg flex items-center justify-center" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                    </svg>
                </button>

                {{-- Left Sidebar - Filters --}}
                <aside id="filterSidebar" class="filter-sidebar lg:transform-none lg:translate-x-0 fixed inset-y-0 left-0 z-40 w-80 bg-white shadow-2xl lg:static lg:shadow-none lg:w-72 overflow-y-auto">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-xl font-bold text-gray-900">Filters</h2>
                            <button id="closeFilterBtn" class="lg:hidden p-2 text-gray-500 hover:text-gray-700">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>

                        {{-- Category Filter --}}
                        <div class="mb-6">
                            <h3 class="text-sm font-semibold text-gray-900 mb-3">Category</h3>
                            <div class="space-y-2">
                                <label class="flex items-center cursor-pointer">
                                    <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" checked>
                                    <span class="ml-3 text-sm text-gray-700">Solar Panels</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" checked>
                                    <span class="ml-3 text-sm text-gray-700">Water Pumps</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" checked>
                                    <span class="ml-3 text-sm text-gray-700">Inverters</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" checked>
                                    <span class="ml-3 text-sm text-gray-700">Batteries</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" checked>
                                    <span class="ml-3 text-sm text-gray-700">Accessories</span>
                                </label>
                            </div>
                        </div>

                        {{-- Price Range --}}
                        <div class="mb-6">
                            <h3 class="text-sm font-semibold text-gray-900 mb-3">Price Range</h3>
                            <div class="space-y-3">
                                <input type="range" min="0" max="5000000" value="5000000" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-orange-600">
                                <div class="flex justify-between text-sm text-gray-600">
                                    <span>TZS 0</span>
                                    <span>TZS 5,000,000</span>
                                </div>
                            </div>
                        </div>

                        {{-- Rating --}}
                        <div class="mb-6">
                            <h3 class="text-sm font-semibold text-gray-900 mb-3">Rating</h3>
                            <div class="space-y-2">
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="rating" class="w-4 h-4 border-gray-300 text-orange-600 focus:ring-orange-500">
                                    <span class="ml-3 text-sm text-gray-700 flex items-center">
                                        <span class="text-yellow-400">★★★★★</span>
                                        <span class="ml-2">& up</span>
                                    </span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="rating" class="w-4 h-4 border-gray-300 text-orange-600 focus:ring-orange-500">
                                    <span class="ml-3 text-sm text-gray-700 flex items-center">
                                        <span class="text-yellow-400">★★★★</span><span class="text-gray-300">★</span>
                                        <span class="ml-2">& up</span>
                                    </span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="rating" class="w-4 h-4 border-gray-300 text-orange-600 focus:ring-orange-500">
                                    <span class="ml-3 text-sm text-gray-700 flex items-center">
                                        <span class="text-yellow-400">★★★</span><span class="text-gray-300">★★</span>
                                        <span class="ml-2">& up</span>
                                    </span>
                                </label>
                            </div>
                        </div>

                        {{-- Availability --}}
                        <div class="mb-6">
                            <h3 class="text-sm font-semibold text-gray-900 mb-3">Availability</h3>
                            <div class="space-y-2">
                                <label class="flex items-center cursor-pointer">
                                    <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" checked>
                                    <span class="ml-3 text-sm text-gray-700">In Stock</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500">
                                    <span class="ml-3 text-sm text-gray-700">Out of Stock</span>
                                </label>
                            </div>
                        </div>

                        <button class="w-full py-3 text-white font-semibold rounded-lg transition-all duration-200 hover:shadow-lg" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">
                            Apply Filters
                        </button>
                    </div>
                </aside>

                {{-- Overlay for mobile filter --}}
                <div id="filterOverlay" class="fixed inset-0 bg-black/50 z-30 hidden lg:hidden"></div>

                {{-- Right Column - Products --}}
                <div class="flex-1">
                    {{-- Search and View Toggle --}}
                    <div class="flex flex-col sm:flex-row gap-4 mb-6">
                        <div class="flex-1 relative">
                            <input type="text" placeholder="Search products..." class="w-full px-4 py-3 pl-12 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                            <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                        <div class="flex items-center gap-2">
                            <button id="gridViewBtn" class="p-3 rounded-lg border-2 transition-all duration-200" style="border-color: #FF8C00; background: #fff7ed;">
                                <svg class="w-5 h-5" style="color: #FF8C00;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                                </svg>
                            </button>
                            <button id="cardViewBtn" class="p-3 rounded-lg border-2 border-gray-200 text-gray-400 hover:border-gray-300 transition-all duration-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    {{-- Results Count --}}
                    <div class="flex items-center justify-between mb-6">
                        <p class="text-sm text-gray-600">Showing <span class="font-semibold text-gray-900">8</span> products</p>
                        <select class="px-4 py-2 rounded-lg border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500">
                            <option>Sort by: Featured</option>
                            <option>Price: Low to High</option>
                            <option>Price: High to Low</option>
                            <option>Newest</option>
                            <option>Best Selling</option>
                        </select>
                    </div>

                    {{-- Products Grid --}}
                    <div id="productsContainer" class="product-grid-view">
                        
                        {{-- Product 1 --}}
                        <div class="product-card bg-white rounded-2xl border border-gray-200 overflow-hidden hover:shadow-xl hover:-translate-y-2 transition-all duration-300 cursor-pointer" data-product-id="1" data-product-name="Solar Panel 300W" data-product-price="450000" data-product-color="linear-gradient(135deg, #fff7ed, #ffedd5)">
                            <div class="relative h-56 bg-gradient-to-br from-orange-50 to-orange-100 flex items-center justify-center">
                                <div class="w-32 h-32 rounded-full flex items-center justify-center" style="background: linear-gradient(135deg, #fff7ed, #ffedd5);">
                                    <svg class="w-16 h-16" style="color: #FF8C00;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                                    </svg>
                                </div>
                                <span class="absolute top-3 right-3 px-3 py-1 text-xs font-bold text-white rounded-full" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">New</span>
                            </div>
                            <div class="p-5">
                                <h3 class="text-lg font-bold text-gray-900 mb-2">Solar Panel 300W</h3>
                                <p class="text-sm text-gray-600 mb-3">High-efficiency monocrystalline solar panel for residential and commercial use.</p>
                                <div class="flex items-center mb-3">
                                    <span class="text-yellow-400">★★★★★</span>
                                    <span class="text-sm text-gray-500 ml-2">(24 reviews)</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-xl font-bold" style="color: #FF8C00;">TZS 450,000</span>
                                    <button class="add-to-cart-btn px-4 py-2 text-sm font-semibold text-white rounded-lg transition-all duration-200 hover:shadow-lg" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>

                        {{-- Product 2 --}}
                        <div class="product-card bg-white rounded-2xl border border-gray-200 overflow-hidden hover:shadow-xl hover:-translate-y-2 transition-all duration-300 cursor-pointer" data-product-id="2" data-product-name="Solar Water Pump 2HP" data-product-price="1200000" data-product-color="linear-gradient(135deg, #dbeafe, #bfdbfe)">
                            <div class="relative h-56 bg-gradient-to-br from-blue-50 to-blue-100 flex items-center justify-center">
                                <div class="w-32 h-32 rounded-full flex items-center justify-center" style="background: linear-gradient(135deg, #dbeafe, #bfdbfe);">
                                    <svg class="w-16 h-16 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="p-5">
                                <h3 class="text-lg font-bold text-gray-900 mb-2">Solar Water Pump 2HP</h3>
                                <p class="text-sm text-gray-600 mb-3">Efficient solar-powered water pump for irrigation and domestic water supply.</p>
                                <div class="flex items-center mb-3">
                                    <span class="text-yellow-400">★★★★★</span>
                                    <span class="text-sm text-gray-500 ml-2">(18 reviews)</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-xl font-bold" style="color: #FF8C00;">TZS 1,200,000</span>
                                    <button class="add-to-cart-btn px-4 py-2 text-sm font-semibold text-white rounded-lg transition-all duration-200 hover:shadow-lg" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>

                        {{-- Product 3 --}}
                        <div class="product-card bg-white rounded-2xl border border-gray-200 overflow-hidden hover:shadow-xl hover:-translate-y-2 transition-all duration-300 cursor-pointer" data-product-id="3" data-product-name="Hybrid Inverter 5kW" data-product-price="2500000" data-product-color="linear-gradient(135deg, #dcfce7, #bbf7d0)">
                            <div class="relative h-56 bg-gradient-to-br from-green-50 to-green-100 flex items-center justify-center">
                                <div class="w-32 h-32 rounded-full flex items-center justify-center" style="background: linear-gradient(135deg, #dcfce7, #bbf7d0);">
                                    <svg class="w-16 h-16 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                    </svg>
                                </div>
                                <span class="absolute top-3 right-3 px-3 py-1 text-xs font-bold text-white rounded-full bg-green-500">Best Seller</span>
                            </div>
                            <div class="p-5">
                                <h3 class="text-lg font-bold text-gray-900 mb-2">Hybrid Inverter 5kW</h3>
                                <p class="text-sm text-gray-600 mb-3">Hybrid inverter for seamless switching between solar and grid power.</p>
                                <div class="flex items-center mb-3">
                                    <span class="text-yellow-400">★★★★★</span>
                                    <span class="text-sm text-gray-500 ml-2">(32 reviews)</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-xl font-bold" style="color: #FF8C00;">TZS 2,500,000</span>
                                    <button class="add-to-cart-btn px-4 py-2 text-sm font-semibold text-white rounded-lg transition-all duration-200 hover:shadow-lg" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>

                        {{-- Product 4 --}}
                        <div class="product-card bg-white rounded-2xl border border-gray-200 overflow-hidden hover:shadow-xl hover:-translate-y-2 transition-all duration-300 cursor-pointer" data-product-id="4" data-product-name="Solar Battery 200Ah" data-product-price="850000" data-product-color="linear-gradient(135deg, #f3e8ff, #e9d5ff)">
                            <div class="relative h-56 bg-gradient-to-br from-purple-50 to-purple-100 flex items-center justify-center">
                                <div class="w-32 h-32 rounded-full flex items-center justify-center" style="background: linear-gradient(135deg, #f3e8ff, #e9d5ff);">
                                    <svg class="w-16 h-16 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="p-5">
                                <h3 class="text-lg font-bold text-gray-900 mb-2">Solar Battery 200Ah</h3>
                                <p class="text-sm text-gray-600 mb-3">Deep cycle solar battery for energy storage and backup power.</p>
                                <div class="flex items-center mb-3">
                                    <span class="text-yellow-400">★★★★</span><span class="text-gray-300">★</span>
                                    <span class="text-sm text-gray-500 ml-2">(15 reviews)</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-xl font-bold" style="color: #FF8C00;">TZS 850,000</span>
                                    <button class="add-to-cart-btn px-4 py-2 text-sm font-semibold text-white rounded-lg transition-all duration-200 hover:shadow-lg" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>

                        {{-- Product 5 --}}
                        <div class="product-card bg-white rounded-2xl border border-gray-200 overflow-hidden hover:shadow-xl hover:-translate-y-2 transition-all duration-300 cursor-pointer" data-product-id="5" data-product-name="Solar Controller 30A" data-product-price="350000" data-product-color="linear-gradient(135deg, #fef9c3, #fef08a)">
                            <div class="relative h-56 bg-gradient-to-br from-yellow-50 to-yellow-100 flex items-center justify-center">
                                <div class="w-32 h-32 rounded-full flex items-center justify-center" style="background: linear-gradient(135deg, #fef9c3, #fef08a);">
                                    <svg class="w-16 h-16 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="p-5">
                                <h3 class="text-lg font-bold text-gray-900 mb-2">Solar Controller 30A</h3>
                                <p class="text-sm text-gray-600 mb-3">MPPT solar charge controller for optimal battery charging efficiency.</p>
                                <div class="flex items-center mb-3">
                                    <span class="text-yellow-400">★★★★</span><span class="text-gray-300">★</span>
                                    <span class="text-sm text-gray-500 ml-2">(12 reviews)</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-xl font-bold" style="color: #FF8C00;">TZS 350,000</span>
                                    <button class="add-to-cart-btn px-4 py-2 text-sm font-semibold text-white rounded-lg transition-all duration-200 hover:shadow-lg" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>

                        {{-- Product 6 --}}
                        <div class="product-card bg-white rounded-2xl border border-gray-200 overflow-hidden hover:shadow-xl hover:-translate-y-2 transition-all duration-300 cursor-pointer" data-product-id="6" data-product-name="Complete Solar Kit" data-product-price="4200000" data-product-color="linear-gradient(135deg, #fee2e2, #fecaca)">
                            <div class="relative h-56 bg-gradient-to-br from-red-50 to-red-100 flex items-center justify-center">
                                <div class="w-32 h-32 rounded-full flex items-center justify-center" style="background: linear-gradient(135deg, #fee2e2, #fecaca);">
                                    <svg class="w-16 h-16 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                    </svg>
                                </div>
                                <span class="absolute top-3 right-3 px-3 py-1 text-xs font-bold text-white rounded-full bg-red-500">Sale</span>
                            </div>
                            <div class="p-5">
                                <h3 class="text-lg font-bold text-gray-900 mb-2">Complete Solar Kit</h3>
                                <p class="text-sm text-gray-600 mb-3">All-in-one solar kit with panels, inverter, battery and mounting hardware.</p>
                                <div class="flex items-center mb-3">
                                    <span class="text-yellow-400">★★★★★</span>
                                    <span class="text-sm text-gray-500 ml-2">(45 reviews)</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div>
                                        <span class="text-sm text-gray-400 line-through">TZS 5,000,000</span>
                                        <span class="text-xl font-bold ml-2" style="color: #FF8C00;">TZS 4,200,000</span>
                                    </div>
                                    <button class="add-to-cart-btn px-4 py-2 text-sm font-semibold text-white rounded-lg transition-all duration-200 hover:shadow-lg" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>

                        {{-- Product 7 --}}
                        <div class="product-card bg-white rounded-2xl border border-gray-200 overflow-hidden hover:shadow-xl hover:-translate-y-2 transition-all duration-300 cursor-pointer" data-product-id="7" data-product-name="Submersible Pump 3HP" data-product-price="1800000" data-product-color="linear-gradient(135deg, #e0e7ff, #c7d2fe)">
                            <div class="relative h-56 bg-gradient-to-br from-indigo-50 to-indigo-100 flex items-center justify-center">
                                <div class="w-32 h-32 rounded-full flex items-center justify-center" style="background: linear-gradient(135deg, #e0e7ff, #c7d2fe);">
                                    <svg class="w-16 h-16 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="p-5">
                                <h3 class="text-lg font-bold text-gray-900 mb-2">Submersible Pump 3HP</h3>
                                <p class="text-sm text-gray-600 mb-3">Deep well submersible pump for agricultural and domestic water supply.</p>
                                <div class="flex items-center mb-3">
                                    <span class="text-yellow-400">★★★★</span><span class="text-gray-300">★</span>
                                    <span class="text-sm text-gray-500 ml-2">(21 reviews)</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-xl font-bold" style="color: #FF8C00;">TZS 1,800,000</span>
                                    <button class="add-to-cart-btn px-4 py-2 text-sm font-semibold text-white rounded-lg transition-all duration-200 hover:shadow-lg" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>

                        {{-- Product 8 --}}
                        <div class="product-card bg-white rounded-2xl border border-gray-200 overflow-hidden hover:shadow-xl hover:-translate-y-2 transition-all duration-300 cursor-pointer" data-product-id="8" data-product-name="Mounting Structure" data-product-price="280000" data-product-color="linear-gradient(135deg, #fce7f3, #fbcfe8)">
                            <div class="relative h-56 bg-gradient-to-br from-pink-50 to-pink-100 flex items-center justify-center">
                                <div class="w-32 h-32 rounded-full flex items-center justify-center" style="background: linear-gradient(135deg, #fce7f3, #fbcfe8);">
                                    <svg class="w-16 h-16 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="p-5">
                                <h3 class="text-lg font-bold text-gray-900 mb-2">Mounting Structure</h3>
                                <p class="text-sm text-gray-600 mb-3">Durable aluminum mounting structure for solar panel installation.</p>
                                <div class="flex items-center mb-3">
                                    <span class="text-yellow-400">★★★★</span><span class="text-gray-300">★</span>
                                    <span class="text-sm text-gray-500 ml-2">(9 reviews)</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-xl font-bold" style="color: #FF8C00;">TZS 280,000</span>
                                    <button class="add-to-cart-btn px-4 py-2 text-sm font-semibold text-white rounded-lg transition-all duration-200 hover:shadow-lg" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>

    @include('partials.landing-footer')

    {{-- Floating Cart Button --}}
    <button id="floatingCartBtn" class="fixed bottom-6 right-6 z-50 w-16 h-16 rounded-full shadow-2xl flex items-center justify-center transition-all duration-300 hover:scale-110" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">
        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
        </svg>
        <span id="cartCount" class="absolute -top-2 -right-2 w-6 h-6 bg-red-500 text-white text-xs font-bold rounded-full flex items-center justify-center">0</span>
    </button>

    {{-- Cart Sidebar --}}
    <div id="cartSidebar" class="fixed inset-y-0 right-0 z-50 w-full md:w-96 bg-white shadow-2xl transform translate-x-full transition-transform duration-300">
        <div class="h-full flex flex-col">
            <div class="p-6 border-b border-gray-200 flex items-center justify-between">
                <h2 class="text-xl font-bold text-gray-900">Your Cart</h2>
                <button id="closeCartBtn" class="p-2 text-gray-500 hover:text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            
            <div id="cartItems" class="flex-1 overflow-y-auto p-6">
                <p class="text-gray-500 text-center py-8">Your cart is empty</p>
            </div>
            
            <div class="p-6 border-t border-gray-200">
                <div class="flex justify-between mb-4">
                    <span class="text-lg font-semibold text-gray-900">Total:</span>
                    <span id="cartTotal" class="text-lg font-bold" style="color: #FF8C00;">TZS 0</span>
                </div>
                <button id="placeOrderBtn" class="w-full py-3 text-white font-semibold rounded-lg transition-all duration-200 hover:shadow-lg" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">
                    Place Order
                </button>
            </div>
        </div>
    </div>

    {{-- Cart Overlay --}}
    <div id="cartOverlay" class="fixed inset-0 bg-black/50 z-40 hidden"></div>

    {{-- Order Modal --}}
    <div id="orderModal" class="fixed inset-0 z-50 hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/50" id="orderModalOverlay"></div>
        <div class="relative bg-white rounded-2xl shadow-2xl max-w-md w-full p-8">
            <button id="closeOrderModal" class="absolute top-4 right-4 p-2 text-gray-500 hover:text-gray-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
            <h2 class="text-2xl font-bold text-gray-900 mb-2">Place Your Order</h2>
            <p class="text-gray-600 mb-6">Enter your contact details to complete your order.</p>
            
            <form id="orderForm">
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Email Address</label>
                    <input type="email" id="orderEmail" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" placeholder="your@email.com">
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Phone Number</label>
                    <input type="tel" id="orderPhone" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" placeholder="+255 XXX XXX XXX">
                </div>
                <button type="submit" class="w-full py-3 text-white font-semibold rounded-lg transition-all duration-200 hover:shadow-lg" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">
                    Submit Order
                </button>
            </form>
        </div>
    </div>

    <script>
        // Cart functionality
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        
        // Update cart count
        function updateCartCount() {
            const cartCount = document.getElementById('cartCount');
            const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
            cartCount.textContent = totalItems;
            cartCount.style.display = totalItems > 0 ? 'flex' : 'none';
        }
        
        // Update cart display
        function updateCartDisplay() {
            const cartItems = document.getElementById('cartItems');
            const cartTotal = document.getElementById('cartTotal');
            
            if (cart.length === 0) {
                cartItems.innerHTML = '<p class="text-gray-500 text-center py-8">Your cart is empty</p>';
                cartTotal.textContent = 'TZS 0';
                return;
            }
            
            let html = '';
            let total = 0;
            
            cart.forEach((item, index) => {
                const itemTotal = item.price * item.quantity;
                total += itemTotal;
                html += `
                    <div class="flex items-center gap-4 mb-4 pb-4 border-b border-gray-100">
                        <div class="w-16 h-16 rounded-lg flex items-center justify-center" style="background: ${item.color};">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-semibold text-gray-900 text-sm">${item.name}</h4>
                            <p class="text-sm" style="color: #FF8C00;">TZS ${item.price.toLocaleString()}</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <button onclick="updateQuantity(${index}, -1)" class="w-8 h-8 rounded-full bg-gray-100 hover:bg-gray-200 flex items-center justify-center">-</button>
                            <span class="w-8 text-center font-semibold">${item.quantity}</span>
                            <button onclick="updateQuantity(${index}, 1)" class="w-8 h-8 rounded-full bg-gray-100 hover:bg-gray-200 flex items-center justify-center">+</button>
                        </div>
                        <button onclick="removeFromCart(${index})" class="text-red-500 hover:text-red-700">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </button>
                    </div>
                `;
            });
            
            cartItems.innerHTML = html;
            cartTotal.textContent = `TZS ${total.toLocaleString()}`;
        }
        
        // Add to cart
        function addToCart(name, price, color) {
            const existingItem = cart.find(item => item.name === name);
            
            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                cart.push({ name, price, color, quantity: 1 });
            }
            
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartCount();
            updateCartDisplay();
            
            // Animation feedback
            const cartBtn = document.getElementById('floatingCartBtn');
            cartBtn.classList.add('scale-125');
            setTimeout(() => cartBtn.classList.remove('scale-125'), 200);
        }
        
        // Update quantity
        function updateQuantity(index, change) {
            cart[index].quantity += change;
            
            if (cart[index].quantity <= 0) {
                cart.splice(index, 1);
            }
            
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartCount();
            updateCartDisplay();
        }
        
        // Remove from cart
        function removeFromCart(index) {
            cart.splice(index, 1);
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartCount();
            updateCartDisplay();
        }
        
        // Cart sidebar toggle
        const floatingCartBtn = document.getElementById('floatingCartBtn');
        const cartSidebar = document.getElementById('cartSidebar');
        const closeCartBtn = document.getElementById('closeCartBtn');
        const cartOverlay = document.getElementById('cartOverlay');
        
        floatingCartBtn.addEventListener('click', () => {
            cartSidebar.classList.remove('translate-x-full');
            cartOverlay.classList.remove('hidden');
            updateCartDisplay();
        });
        
        closeCartBtn.addEventListener('click', () => {
            cartSidebar.classList.add('translate-x-full');
            cartOverlay.classList.add('hidden');
        });
        
        cartOverlay.addEventListener('click', () => {
            cartSidebar.classList.add('translate-x-full');
            cartOverlay.classList.add('hidden');
        });
        
        // Order modal
        const placeOrderBtn = document.getElementById('placeOrderBtn');
        const orderModal = document.getElementById('orderModal');
        const closeOrderModal = document.getElementById('closeOrderModal');
        const orderModalOverlay = document.getElementById('orderModalOverlay');
        const orderForm = document.getElementById('orderForm');
        
        placeOrderBtn.addEventListener('click', () => {
            if (cart.length === 0) {
                alert('Your cart is empty!');
                return;
            }
            orderModal.classList.remove('hidden');
            orderModal.classList.add('flex');
        });
        
        closeOrderModal.addEventListener('click', () => {
            orderModal.classList.add('hidden');
            orderModal.classList.remove('flex');
        });
        
        orderModalOverlay.addEventListener('click', () => {
            orderModal.classList.add('hidden');
            orderModal.classList.remove('flex');
        });
        
        orderForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            const email = document.getElementById('orderEmail').value;
            const phone = document.getElementById('orderPhone').value;
            
            // Here you would typically send the order to your backend
            console.log('Order submitted:', { email, phone, cart });
            
            alert('Order submitted successfully! We will contact you soon.');
            
            // Clear cart
            cart = [];
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartCount();
            updateCartDisplay();
            
            // Close modals
            orderModal.classList.add('hidden');
            orderModal.classList.remove('flex');
            cartSidebar.classList.add('translate-x-full');
            cartOverlay.classList.add('hidden');
            
            // Reset form
            orderForm.reset();
        });
        
        // Add event listeners to all "Add to Cart" buttons
        document.querySelectorAll('.product-card button').forEach(btn => {
            btn.addEventListener('click', function() {
                const card = this.closest('.product-card');
                const name = card.querySelector('h3').textContent;
                const priceText = card.querySelector('.text-xl.font-bold').textContent.replace('TZS ', '').replace(/,/g, '');
                const price = parseInt(priceText);
                const color = card.querySelector('.relative > div').style.background;
                
                addToCart(name, price, color);
            });
        });
        
        // Initialize cart on page load
        updateCartCount();
        updateCartDisplay();

        // Mobile filter sidebar toggle
        const mobileFilterBtn = document.getElementById('mobileFilterBtn');
        const filterSidebar = document.getElementById('filterSidebar');
        const closeFilterBtn = document.getElementById('closeFilterBtn');
        const filterOverlay = document.getElementById('filterOverlay');

        mobileFilterBtn.addEventListener('click', () => {
            filterSidebar.classList.add('open');
            filterOverlay.classList.remove('hidden');
        });

        closeFilterBtn.addEventListener('click', () => {
            filterSidebar.classList.remove('open');
            filterOverlay.classList.add('hidden');
        });

        filterOverlay.addEventListener('click', () => {
            filterSidebar.classList.remove('open');
            filterOverlay.classList.add('hidden');
        });

        // View toggle (grid/card)
        const gridViewBtn = document.getElementById('gridViewBtn');
        const cardViewBtn = document.getElementById('cardViewBtn');
        const productsContainer = document.getElementById('productsContainer');

        gridViewBtn.addEventListener('click', () => {
            productsContainer.classList.remove('product-card-view');
            productsContainer.classList.add('product-grid-view');
            gridViewBtn.style.borderColor = '#FF8C00';
            gridViewBtn.style.background = '#fff7ed';
            gridViewBtn.querySelector('svg').style.color = '#FF8C00';
            cardViewBtn.style.borderColor = '#e5e7eb';
            cardViewBtn.style.background = 'white';
            cardViewBtn.querySelector('svg').style.color = '#9ca3af';
        });

        cardViewBtn.addEventListener('click', () => {
            productsContainer.classList.remove('product-grid-view');
            productsContainer.classList.add('product-card-view');
            cardViewBtn.style.borderColor = '#FF8C00';
            cardViewBtn.style.background = '#fff7ed';
            cardViewBtn.querySelector('svg').style.color = '#FF8C00';
            gridViewBtn.style.borderColor = '#e5e7eb';
            gridViewBtn.style.background = 'white';
            gridViewBtn.querySelector('svg').style.color = '#9ca3af';
        });

        // Product card animations
        const productCards = document.querySelectorAll('.product-card');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    const card = entry.target;
                    const idx = Array.from(productCards).indexOf(card);
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, idx * 100);
                    observer.unobserve(card);
                }
            });
        }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

        productCards.forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(card);
        });
    </script>
</body>
</html>

