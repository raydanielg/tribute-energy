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
    </style>
</head>
<body class="bg-gray-50">
    @include('partials.landing-header')

    <main class="pt-20">
        {{-- Hero Section --}}
        <section class="relative py-20 overflow-hidden" style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);">
            <div class="absolute inset-0 opacity-10">
                <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, rgba(255, 140, 0, 0.15) 1px, transparent 0); background-size: 40px 40px;"></div>
            </div>
            <div class="max-w-screen-xl mx-auto px-4 lg:px-8 relative z-10">
                <div class="text-center">
                    <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-4">Our Products</h1>
                    <p class="text-lg text-gray-300 max-w-2xl mx-auto mb-8">Discover our range of solar energy and water pumping solutions designed for efficiency and sustainability.</p>
                    
                    {{-- Search Bar --}}
                    <div class="max-w-2xl mx-auto">
                        <div class="relative">
                            <input type="text" placeholder="Search products..." class="w-full px-6 py-4 rounded-xl border border-gray-600 bg-white/10 backdrop-blur-sm text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                            <button class="absolute right-3 top-1/2 -translate-y-1/2 px-4 py-2 rounded-lg text-white font-semibold" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">
                                Search
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Categories --}}
        <section class="py-12 bg-white border-b border-gray-200">
            <div class="max-w-screen-xl mx-auto px-4 lg:px-8">
                <div class="flex flex-wrap gap-3 justify-center">
                    <button class="px-6 py-2.5 rounded-full text-sm font-semibold transition-all duration-200" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%); color: white;">All Products</button>
                    <button class="px-6 py-2.5 rounded-full text-sm font-semibold text-gray-600 border border-gray-200 hover:border-orange-300 hover:text-orange-600 transition-all duration-200">Solar Panels</button>
                    <button class="px-6 py-2.5 rounded-full text-sm font-semibold text-gray-600 border border-gray-200 hover:border-orange-300 hover:text-orange-600 transition-all duration-200">Water Pumps</button>
                    <button class="px-6 py-2.5 rounded-full text-sm font-semibold text-gray-600 border border-gray-200 hover:border-orange-300 hover:text-orange-600 transition-all duration-200">Inverters</button>
                    <button class="px-6 py-2.5 rounded-full text-sm font-semibold text-gray-600 border border-gray-200 hover:border-orange-300 hover:text-orange-600 transition-all duration-200">Batteries</button>
                    <button class="px-6 py-2.5 rounded-full text-sm font-semibold text-gray-600 border border-gray-200 hover:border-orange-300 hover:text-orange-600 transition-all duration-200">Accessories</button>
                </div>
            </div>
        </section>

        {{-- Products Grid --}}
        <section class="py-16">
            <div class="max-w-screen-xl mx-auto px-4 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    
                    {{-- Product Card 1 --}}
                    <div class="product-card bg-white rounded-2xl border border-gray-200 overflow-hidden hover:shadow-xl hover:-translate-y-2 transition-all duration-300">
                        <div class="relative h-48 bg-gradient-to-br from-orange-50 to-orange-100 flex items-center justify-center">
                            <div class="w-24 h-24 rounded-full flex items-center justify-center" style="background: linear-gradient(135deg, #fff7ed, #ffedd5);">
                                <svg class="w-12 h-12" style="color: #FF8C00;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                                </svg>
                            </div>
                            <span class="absolute top-3 right-3 px-3 py-1 text-xs font-bold text-white rounded-full" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">New</span>
                        </div>
                        <div class="p-5">
                            <h3 class="text-lg font-bold text-gray-900 mb-2">Solar Panel 300W</h3>
                            <p class="text-sm text-gray-600 mb-3">High-efficiency monocrystalline solar panel for residential and commercial use.</p>
                            <div class="flex items-center justify-between">
                                <span class="text-xl font-bold" style="color: #FF8C00;">TZS 450,000</span>
                                <button class="px-4 py-2 text-sm font-semibold text-white rounded-lg transition-all duration-200 hover:shadow-lg" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- Product Card 2 --}}
                    <div class="product-card bg-white rounded-2xl border border-gray-200 overflow-hidden hover:shadow-xl hover:-translate-y-2 transition-all duration-300">
                        <div class="relative h-48 bg-gradient-to-br from-blue-50 to-blue-100 flex items-center justify-center">
                            <div class="w-24 h-24 rounded-full flex items-center justify-center" style="background: linear-gradient(135deg, #dbeafe, #bfdbfe);">
                                <svg class="w-12 h-12 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="text-lg font-bold text-gray-900 mb-2">Solar Water Pump 2HP</h3>
                            <p class="text-sm text-gray-600 mb-3">Efficient solar-powered water pump for irrigation and domestic water supply.</p>
                            <div class="flex items-center justify-between">
                                <span class="text-xl font-bold" style="color: #FF8C00;">TZS 1,200,000</span>
                                <button class="px-4 py-2 text-sm font-semibold text-white rounded-lg transition-all duration-200 hover:shadow-lg" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- Product Card 3 --}}
                    <div class="product-card bg-white rounded-2xl border border-gray-200 overflow-hidden hover:shadow-xl hover:-translate-y-2 transition-all duration-300">
                        <div class="relative h-48 bg-gradient-to-br from-green-50 to-green-100 flex items-center justify-center">
                            <div class="w-24 h-24 rounded-full flex items-center justify-center" style="background: linear-gradient(135deg, #dcfce7, #bbf7d0);">
                                <svg class="w-12 h-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                            </div>
                            <span class="absolute top-3 right-3 px-3 py-1 text-xs font-bold text-white rounded-full bg-green-500">Best Seller</span>
                        </div>
                        <div class="p-5">
                            <h3 class="text-lg font-bold text-gray-900 mb-2">Hybrid Inverter 5kW</h3>
                            <p class="text-sm text-gray-600 mb-3">Hybrid inverter for seamless switching between solar and grid power.</p>
                            <div class="flex items-center justify-between">
                                <span class="text-xl font-bold" style="color: #FF8C00;">TZS 2,500,000</span>
                                <button class="px-4 py-2 text-sm font-semibold text-white rounded-lg transition-all duration-200 hover:shadow-lg" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- Product Card 4 --}}
                    <div class="product-card bg-white rounded-2xl border border-gray-200 overflow-hidden hover:shadow-xl hover:-translate-y-2 transition-all duration-300">
                        <div class="relative h-48 bg-gradient-to-br from-purple-50 to-purple-100 flex items-center justify-center">
                            <div class="w-24 h-24 rounded-full flex items-center justify-center" style="background: linear-gradient(135deg, #f3e8ff, #e9d5ff);">
                                <svg class="w-12 h-12 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="text-lg font-bold text-gray-900 mb-2">Solar Battery 200Ah</h3>
                            <p class="text-sm text-gray-600 mb-3">Deep cycle solar battery for energy storage and backup power.</p>
                            <div class="flex items-center justify-between">
                                <span class="text-xl font-bold" style="color: #FF8C00;">TZS 850,000</span>
                                <button class="px-4 py-2 text-sm font-semibold text-white rounded-lg transition-all duration-200 hover:shadow-lg" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- Product Card 5 --}}
                    <div class="product-card bg-white rounded-2xl border border-gray-200 overflow-hidden hover:shadow-xl hover:-translate-y-2 transition-all duration-300">
                        <div class="relative h-48 bg-gradient-to-br from-yellow-50 to-yellow-100 flex items-center justify-center">
                            <div class="w-24 h-24 rounded-full flex items-center justify-center" style="background: linear-gradient(135deg, #fef9c3, #fef08a);">
                                <svg class="w-12 h-12 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                </svg>
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="text-lg font-bold text-gray-900 mb-2">Solar Controller 30A</h3>
                            <p class="text-sm text-gray-600 mb-3">MPPT solar charge controller for optimal battery charging efficiency.</p>
                            <div class="flex items-center justify-between">
                                <span class="text-xl font-bold" style="color: #FF8C00;">TZS 350,000</span>
                                <button class="px-4 py-2 text-sm font-semibold text-white rounded-lg transition-all duration-200 hover:shadow-lg" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- Product Card 6 --}}
                    <div class="product-card bg-white rounded-2xl border border-gray-200 overflow-hidden hover:shadow-xl hover:-translate-y-2 transition-all duration-300">
                        <div class="relative h-48 bg-gradient-to-br from-red-50 to-red-100 flex items-center justify-center">
                            <div class="w-24 h-24 rounded-full flex items-center justify-center" style="background: linear-gradient(135deg, #fee2e2, #fecaca);">
                                <svg class="w-12 h-12 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                </svg>
                            </div>
                            <span class="absolute top-3 right-3 px-3 py-1 text-xs font-bold text-white rounded-full bg-red-500">Sale</span>
                        </div>
                        <div class="p-5">
                            <h3 class="text-lg font-bold text-gray-900 mb-2">Complete Solar Kit</h3>
                            <p class="text-sm text-gray-600 mb-3">All-in-one solar kit with panels, inverter, battery and mounting hardware.</p>
                            <div class="flex items-center justify-between">
                                <div>
                                    <span class="text-sm text-gray-400 line-through">TZS 5,000,000</span>
                                    <span class="text-xl font-bold ml-2" style="color: #FF8C00;">TZS 4,200,000</span>
                                </div>
                                <button class="px-4 py-2 text-sm font-semibold text-white rounded-lg transition-all duration-200 hover:shadow-lg" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- Product Card 7 --}}
                    <div class="product-card bg-white rounded-2xl border border-gray-200 overflow-hidden hover:shadow-xl hover:-translate-y-2 transition-all duration-300">
                        <div class="relative h-48 bg-gradient-to-br from-indigo-50 to-indigo-100 flex items-center justify-center">
                            <div class="w-24 h-24 rounded-full flex items-center justify-center" style="background: linear-gradient(135deg, #e0e7ff, #c7d2fe);">
                                <svg class="w-12 h-12 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="text-lg font-bold text-gray-900 mb-2">Submersible Pump 3HP</h3>
                            <p class="text-sm text-gray-600 mb-3">Deep well submersible pump for agricultural and domestic water supply.</p>
                            <div class="flex items-center justify-between">
                                <span class="text-xl font-bold" style="color: #FF8C00;">TZS 1,800,000</span>
                                <button class="px-4 py-2 text-sm font-semibold text-white rounded-lg transition-all duration-200 hover:shadow-lg" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- Product Card 8 --}}
                    <div class="product-card bg-white rounded-2xl border border-gray-200 overflow-hidden hover:shadow-xl hover:-translate-y-2 transition-all duration-300">
                        <div class="relative h-48 bg-gradient-to-br from-pink-50 to-pink-100 flex items-center justify-center">
                            <div class="w-24 h-24 rounded-full flex items-center justify-center" style="background: linear-gradient(135deg, #fce7f3, #fbcfe8);">
                                <svg class="w-12 h-12 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>
                                </svg>
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="text-lg font-bold text-gray-900 mb-2">Mounting Structure</h3>
                            <p class="text-sm text-gray-600 mb-3">Durable aluminum mounting structure for solar panel installation.</p>
                            <div class="flex items-center justify-between">
                                <span class="text-xl font-bold" style="color: #FF8C00;">TZS 280,000</span>
                                <button class="px-4 py-2 text-sm font-semibold text-white rounded-lg transition-all duration-200 hover:shadow-lg" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        {{-- CTA Section --}}
        <section class="py-16" style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);">
            <div class="max-w-screen-xl mx-auto px-4 lg:px-8 text-center">
                <h2 class="text-3xl font-extrabold text-white mb-4">Need a Custom Solution?</h2>
                <p class="text-gray-300 mb-8 max-w-2xl mx-auto">Contact us for customized solar and water pumping solutions tailored to your specific needs.</p>
                <a href="#contact" class="inline-flex items-center px-8 py-4 text-lg font-semibold text-white rounded-xl transition-all duration-200 hover:shadow-xl hover:-translate-y-0.5" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">
                    Get a Quote
                    <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>
        </section>
    </main>

    @include('partials.landing-footer')

    <script>
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

        // Category button active state
        const categoryButtons = document.querySelectorAll('section.py-12 button');
        categoryButtons.forEach(button => {
            button.addEventListener('click', function() {
                categoryButtons.forEach(btn => {
                    btn.style.background = '';
                    btn.style.color = '';
                    btn.classList.remove('text-white');
                    btn.classList.add('text-gray-600');
                });
                this.style.background = 'linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%)';
                this.style.color = 'white';
                this.classList.remove('text-gray-600');
                this.classList.add('text-white');
            });
        });
    </script>
</body>
</html>
