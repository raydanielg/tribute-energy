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
                        @foreach($products as $product)
                        <div class="product-card bg-white rounded-2xl border border-gray-200 overflow-hidden hover:shadow-xl hover:-translate-y-2 transition-all duration-300 cursor-pointer" data-product-id="{{ $product->id }}" data-product-name="{{ $product->name }}" data-product-price="{{ $product->price }}" data-product-color="{{ $product->color ?? 'linear-gradient(135deg, #fff7ed, #ffedd5)' }}">
                            <div class="relative h-56 flex items-center justify-center" style="background: {{ $product->color ?? 'linear-gradient(135deg, #fff7ed, #ffedd5)' }};">
                                <div class="w-32 h-32 rounded-full flex items-center justify-center" style="background: {{ $product->color ?? 'linear-gradient(135deg, #fff7ed, #ffedd5)' }};">
                                    <svg class="w-16 h-16" style="color: #FF8C00;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                                    </svg>
                                </div>
                                @if($product->is_new)
                                    <span class="absolute top-3 right-3 px-3 py-1 text-xs font-bold text-white rounded-full" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">New</span>
                                @endif
                                @if($product->is_featured)
                                    <span class="absolute top-3 right-3 px-3 py-1 text-xs font-bold text-white rounded-full bg-green-500">Featured</span>
                                @endif
                                @if($product->is_sale)
                                    <span class="absolute top-3 right-3 px-3 py-1 text-xs font-bold text-white rounded-full bg-red-500">Sale</span>
                                @endif
                            </div>
                            <div class="p-5">
                                <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $product->name }}</h3>
                                <p class="text-sm text-gray-600 mb-3">{{ Str::limit($product->description, 80) }}</p>
                                <div class="flex items-center mb-3">
                                    <span class="text-yellow-400">{{ $product->rating ?? '★★★★★' }}</span>
                                    <span class="text-sm text-gray-500 ml-2">{{ $product->reviews ?? '(0 reviews)' }}</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div>
                                        @if($product->is_sale && $product->original_price)
                                            <span class="text-sm text-gray-400 line-through mr-2">TZS {{ number_format($product->original_price) }}</span>
                                        @endif
                                        <span class="text-xl font-bold" style="color: #FF8C00;">TZS {{ number_format($product->price) }}</span>
                                    </div>
                                    <form action="{{ route('cart.add', $product->id) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="px-4 py-2 text-sm font-semibold text-white rounded-lg transition-all duration-200 hover:shadow-lg" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">
                                            Add to Cart
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
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

    {{-- Product Details Modal --}}
    <div id="productModal" class="fixed inset-0 z-50 hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/60" id="productModalOverlay"></div>
        <div class="relative bg-white rounded-2xl shadow-2xl max-w-4xl w-full max-h-[90vh] overflow-y-auto">
            <button id="closeProductModal" class="absolute top-4 right-4 z-10 p-2 bg-white rounded-full shadow-lg text-gray-500 hover:text-gray-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
            
            <div class="grid md:grid-cols-2">
                {{-- Product Image --}}
                <div class="relative h-64 md:h-auto" id="productModalImage">
                    <div class="absolute inset-0 flex items-center justify-center" id="productModalImageBg"></div>
                </div>
                
                {{-- Product Details --}}
                <div class="p-8">
                    <h2 id="productModalTitle" class="text-3xl font-bold text-gray-900 mb-2"></h2>
                    <div class="flex items-center mb-4">
                        <span id="productModalRating" class="text-yellow-400 text-lg"></span>
                        <span id="productModalReviews" class="text-sm text-gray-500 ml-2"></span>
                    </div>
                    
                    <div class="mb-6">
                        <span id="productModalPrice" class="text-3xl font-bold" style="color: #FF8C00;"></span>
                    </div>
                    
                    <p id="productModalDescription" class="text-gray-600 mb-6 leading-relaxed"></p>
                    
                    <div class="mb-6">
                        <h3 class="font-semibold text-gray-900 mb-3">Specifications</h3>
                        <ul id="productModalSpecs" class="space-y-2 text-sm text-gray-600"></ul>
                    </div>
                    
                    <div class="mb-6">
                        <h3 class="font-semibold text-gray-900 mb-3">Quantity</h3>
                        <div class="flex items-center gap-3">
                            <button id="decreaseQty" class="w-10 h-10 rounded-lg bg-gray-100 hover:bg-gray-200 flex items-center justify-center font-semibold">-</button>
                            <span id="productQty" class="w-12 text-center font-semibold text-lg">1</span>
                            <button id="increaseQty" class="w-10 h-10 rounded-lg bg-gray-100 hover:bg-gray-200 flex items-center justify-center font-semibold">+</button>
                        </div>
                    </div>
                    
                    <button id="productModalAddToCart" class="w-full py-4 text-white font-semibold rounded-xl transition-all duration-200 hover:shadow-lg mb-4" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">
                        Add to Cart
                    </button>
                    
                    <a id="productModalViewDetails" href="#" class="block w-full py-4 text-center font-semibold rounded-xl border-2 transition-all duration-200 hover:shadow-lg" style="border-color: #FF8C00; color: #FF8C00;">
                        View Full Details
                    </a>
                    
                    {{-- Social Media Sharing --}}
                    <div>
                        <h3 class="font-semibold text-gray-900 mb-3">Share this product</h3>
                        <div class="flex gap-3">
                            <a id="shareFacebook" href="#" target="_blank" class="flex-1 flex items-center justify-center py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                                Facebook
                            </a>
                            <a id="shareTwitter" href="#" target="_blank" class="flex-1 flex items-center justify-center py-3 bg-sky-500 text-white rounded-lg hover:bg-sky-600 transition-colors">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                </svg>
                                Twitter
                            </a>
                            <a id="shareWhatsApp" href="#" target="_blank" class="flex-1 flex items-center justify-center py-3 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                                </svg>
                                WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </div>
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
        document.querySelectorAll('.add-to-cart-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                const card = this.closest('.product-card');
                const name = card.querySelector('h3').textContent;
                const priceText = card.querySelector('.text-xl.font-bold').textContent.replace('TZS ', '').replace(/,/g, '');
                const price = parseInt(priceText);
                const color = card.querySelector('.relative > div').style.background;
                
                addToCart(name, price, color);
            });
        });

        // Product Details Modal
        const productModal = document.getElementById('productModal');
        const closeProductModal = document.getElementById('closeProductModal');
        const productModalOverlay = document.getElementById('productModalOverlay');
        let currentProduct = null;
        let productQuantity = 1;

        // Product data (simulated database)
        const productsData = {
            1: {
                name: 'Solar Panel 300W',
                price: 450000,
                color: 'linear-gradient(135deg, #fff7ed, #ffedd5)',
                rating: '★★★★★',
                reviews: '(24 reviews)',
                description: 'High-efficiency monocrystalline solar panel designed for both residential and commercial applications. Features advanced PERC technology for maximum power output and durability in all weather conditions.',
                specs: [
                    'Power Output: 300W',
                    'Type: Monocrystalline',
                    'Efficiency: 18.5%',
                    'Dimensions: 1650 x 992 x 35mm',
                    'Weight: 18.5kg',
                    'Warranty: 25 years'
                ]
            },
            2: {
                name: 'Solar Water Pump 2HP',
                price: 1200000,
                color: 'linear-gradient(135deg, #dbeafe, #bfdbfe)',
                rating: '★★★★★',
                reviews: '(18 reviews)',
                description: 'Efficient solar-powered water pump perfect for irrigation and domestic water supply. Works directly with solar panels without batteries, making it cost-effective and environmentally friendly.',
                specs: [
                    'Power: 2HP',
                    'Flow Rate: 10-15 m³/h',
                    'Head: 30-50m',
                    'Voltage: 24V DC',
                    'IP Rating: IP68',
                    'Warranty: 2 years'
                ]
            },
            3: {
                name: 'Hybrid Inverter 5kW',
                price: 2500000,
                color: 'linear-gradient(135deg, #dcfce7, #bbf7d0)',
                rating: '★★★★★',
                reviews: '(32 reviews)',
                description: 'Advanced hybrid inverter for seamless switching between solar and grid power. Features MPPT technology for maximum solar harvest and pure sine wave output for sensitive electronics.',
                specs: [
                    'Capacity: 5kW',
                    'Type: Hybrid',
                    'Input Voltage: 48V DC',
                    'Output: 230V AC',
                    'Efficiency: 95%',
                    'Warranty: 5 years'
                ]
            },
            4: {
                name: 'Solar Battery 200Ah',
                price: 850000,
                color: 'linear-gradient(135deg, #f3e8ff, #e9d5ff)',
                rating: '★★★★',
                reviews: '(15 reviews)',
                description: 'Deep cycle solar battery designed for energy storage and backup power. Features long cycle life and maintenance-free operation for reliable performance.',
                specs: [
                    'Capacity: 200Ah',
                    'Voltage: 12V',
                    'Type: Deep Cycle',
                    'Cycle Life: 1500 cycles',
                    'Weight: 55kg',
                    'Warranty: 3 years'
                ]
            },
            5: {
                name: 'Solar Controller 30A',
                price: 350000,
                color: 'linear-gradient(135deg, #fef9c3, #fef08a)',
                rating: '★★★★',
                reviews: '(12 reviews)',
                description: 'MPPT solar charge controller for optimal battery charging efficiency. Maximizes power harvest from solar panels and protects batteries from overcharging.',
                specs: [
                    'Current: 30A',
                    'Type: MPPT',
                    'Voltage: 12V/24V',
                    'Efficiency: 98%',
                    'Display: LCD',
                    'Warranty: 2 years'
                ]
            },
            6: {
                name: 'Complete Solar Kit',
                price: 4200000,
                color: 'linear-gradient(135deg, #fee2e2, #fecaca)',
                rating: '★★★★★',
                reviews: '(45 reviews)',
                description: 'All-in-one solar kit with everything you need for a complete solar installation. Includes panels, inverter, battery, controller, and mounting hardware.',
                specs: [
                    'Solar Panels: 4x 300W',
                    'Inverter: 3kW Hybrid',
                    'Battery: 200Ah',
                    'Controller: 40A MPPT',
                    'Mounting: Complete set',
                    'Warranty: 2-5 years'
                ]
            },
            7: {
                name: 'Submersible Pump 3HP',
                price: 1800000,
                color: 'linear-gradient(135deg, #e0e7ff, #c7d2fe)',
                rating: '★★★★',
                reviews: '(21 reviews)',
                description: 'Deep well submersible pump designed for agricultural and domestic water supply. Highly efficient and reliable for deep water extraction.',
                specs: [
                    'Power: 3HP',
                    'Flow Rate: 15-20 m³/h',
                    'Head: 50-80m',
                    'Voltage: 380V AC',
                    'IP Rating: IP68',
                    'Warranty: 2 years'
                ]
            },
            8: {
                name: 'Mounting Structure',
                price: 280000,
                color: 'linear-gradient(135deg, #fce7f3, #fbcfe8)',
                rating: '★★★★',
                reviews: '(9 reviews)',
                description: 'Durable aluminum mounting structure for solar panel installation. Corrosion-resistant and designed for easy installation on various roof types.',
                specs: [
                    'Material: Aluminum',
                    'Panels: Up to 6x',
                    'Type: Roof Mount',
                    'Weight Capacity: 200kg',
                    'Finish: Anodized',
                    'Warranty: 10 years'
                ]
            }
        };

        // Open product modal
        document.querySelectorAll('.product-card').forEach(card => {
            card.addEventListener('click', function() {
                const productId = this.getAttribute('data-product-id');
                const product = productsData[productId];
                
                if (product) {
                    currentProduct = product;
                    productQuantity = 1;
                    
                    // Populate modal
                    document.getElementById('productModalTitle').textContent = product.name;
                    document.getElementById('productModalRating').textContent = product.rating;
                    document.getElementById('productModalReviews').textContent = product.reviews;
                    document.getElementById('productModalPrice').textContent = `TZS ${product.price.toLocaleString()}`;
                    document.getElementById('productModalDescription').textContent = product.description;
                    document.getElementById('productModalImageBg').style.background = product.color;
                    document.getElementById('productQty').textContent = productQuantity;
                    
                    // Populate specs
                    const specsList = document.getElementById('productModalSpecs');
                    specsList.innerHTML = product.specs.map(spec => `<li>• ${spec}</li>`).join('');
                    
                    // Update social sharing links
                    const productUrl = window.location.origin + '/product/' + productId;
                    const shareText = `Check out ${product.name} at Tribute Energy - TZS ${product.price.toLocaleString()}`;
                    
                    document.getElementById('shareFacebook').href = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(productUrl)}`;
                    document.getElementById('shareTwitter').href = `https://twitter.com/intent/tweet?text=${encodeURIComponent(shareText)}&url=${encodeURIComponent(productUrl)}`;
                    document.getElementById('shareWhatsApp').href = `https://wa.me/?text=${encodeURIComponent(shareText + ' ' + productUrl)}`;
                    document.getElementById('productModalViewDetails').href = productUrl;
                    
                    // Show modal
                    productModal.classList.remove('hidden');
                    productModal.classList.add('flex');
                }
            });
        });

        // Close product modal
        closeProductModal.addEventListener('click', () => {
            productModal.classList.add('hidden');
            productModal.classList.remove('flex');
        });

        productModalOverlay.addEventListener('click', () => {
            productModal.classList.add('hidden');
            productModal.classList.remove('flex');
        });

        // Quantity controls
        document.getElementById('decreaseQty').addEventListener('click', () => {
            if (productQuantity > 1) {
                productQuantity--;
                document.getElementById('productQty').textContent = productQuantity;
            }
        });

        document.getElementById('increaseQty').addEventListener('click', () => {
            productQuantity++;
            document.getElementById('productQty').textContent = productQuantity;
        });

        // Add to cart from modal
        document.getElementById('productModalAddToCart').addEventListener('click', () => {
            if (currentProduct) {
                for (let i = 0; i < productQuantity; i++) {
                    addToCart(currentProduct.name, currentProduct.price, currentProduct.color);
                }
                
                // Close modal
                productModal.classList.add('hidden');
                productModal.classList.remove('flex');
                
                // Show success message
                alert(`${productQuantity} x ${currentProduct.name} added to cart!`);
            }
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

