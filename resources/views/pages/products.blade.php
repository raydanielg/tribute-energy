@extends('layouts.landing')

@section('title', 'Shop')
@section('meta_description', 'Shop Tribute Energy drinks, powders, and bundle packs. Premium energy supplements for peak performance.')

@section('content')

    {{-- Page Hero --}}
    <section class="relative pt-24 pb-12 lg:pt-32 lg:pb-16 overflow-hidden">
        <div class="absolute inset-0 z-0"
             style="background: url('{{ asset('hero-bg.jpg') }}') center/cover no-repeat; opacity: 0.05;"></div>
        <div class="absolute inset-0 z-0" style="background: linear-gradient(180deg, #0A0A0A 0%, rgba(10,10,10,0.9) 50%, #0A0A0A 100%);"></div>
        <div class="relative z-10 max-w-7xl mx-auto px-5 lg:px-8">
            <div class="section-label mb-2 lg:mb-3">Our Store</div>
            <h1 class="font-bebas text-5xl lg:text-7xl xl:text-8xl leading-none">
                SHOP <span class="text-gradient">ALL</span> PRODUCTS
            </h1>
            <div class="divider mt-3 lg:mt-4"></div>
            <p class="text-gray-400 mt-3 lg:mt-4 max-w-xl text-sm lg:text-base leading-relaxed">
                Premium energy drinks, performance powders, and bundle packs — engineered to fuel every kind of athlete.
            </p>
        </div>
    </section>

    {{-- Shop Section --}}
    <section class="py-8 lg:py-12 max-w-7xl mx-auto px-5 lg:px-8" x-data="shopFilters()">
        <div class="flex flex-col lg:flex-row gap-6 lg:gap-8">
            {{-- Sidebar Filters --}}
            <aside class="lg:w-56 xl:w-64 flex-shrink-0">
                <div class="bg-[#0D0D0D] border border-[#1E1E1E] rounded-lg p-5 lg:p-6 sticky top-20">
                    <div class="flex items-center justify-between mb-4 lg:mb-5">
                        <h3 class="font-rajdhani font-700 text-base lg:text-lg text-white">Filters</h3>
                        <button @click="resetFilters()" class="text-xs lg:text-sm text-[#FF6B00] hover:text-white transition-colors">Reset</button>
                    </div>
                    
                    {{-- Category Filter --}}
                    <div class="mb-5 lg:mb-6">
                        <h4 class="text-xs lg:text-sm font-rajdhani font-700 tracking-wider uppercase text-gray-500 mb-2 lg:mb-3">Category</h4>
                        <div class="space-y-1.5 lg:space-y-2">
                            <label class="flex items-center gap-2 lg:gap-3 cursor-pointer group">
                                <input type="radio" name="category" value="all" x-model="filters.category" @change="applyFilters()"
                                       class="w-3.5 h-3.5 lg:w-4 lg:h-4 text-[#FF6B00] border-gray-600 focus:ring-[#FF6B00] focus:ring-offset-0">
                                <span class="text-xs lg:text-sm text-gray-300 group-hover:text-white transition-colors">All Products</span>
                            </label>
                            <label class="flex items-center gap-2 lg:gap-3 cursor-pointer group">
                                <input type="radio" name="category" value="drink" x-model="filters.category" @change="applyFilters()"
                                       class="w-3.5 h-3.5 lg:w-4 lg:h-4 text-[#FF6B00] border-gray-600 focus:ring-[#FF6B00] focus:ring-offset-0">
                                <span class="text-xs lg:text-sm text-gray-300 group-hover:text-white transition-colors">Energy Drinks</span>
                            </label>
                            <label class="flex items-center gap-2 lg:gap-3 cursor-pointer group">
                                <input type="radio" name="category" value="powder" x-model="filters.category" @change="applyFilters()"
                                       class="w-3.5 h-3.5 lg:w-4 lg:h-4 text-[#FF6B00] border-gray-600 focus:ring-[#FF6B00] focus:ring-offset-0">
                                <span class="text-xs lg:text-sm text-gray-300 group-hover:text-white transition-colors">Powders</span>
                            </label>
                            <label class="flex items-center gap-2 lg:gap-3 cursor-pointer group">
                                <input type="radio" name="category" value="bundle" x-model="filters.category" @change="applyFilters()"
                                       class="w-3.5 h-3.5 lg:w-4 lg:h-4 text-[#FF6B00] border-gray-600 focus:ring-[#FF6B00] focus:ring-offset-0">
                                <span class="text-xs lg:text-sm text-gray-300 group-hover:text-white transition-colors">Bundles</span>
                            </label>
                        </div>
                    </div>

                    {{-- Price Range Filter --}}
                    <div class="mb-5 lg:mb-6">
                        <h4 class="text-xs lg:text-sm font-rajdhani font-700 tracking-wider uppercase text-gray-500 mb-2 lg:mb-3">Price Range</h4>
                        <div class="space-y-1.5 lg:space-y-2">
                            <label class="flex items-center gap-2 lg:gap-3 cursor-pointer group">
                                <input type="radio" name="price" value="all" x-model="filters.price" @change="applyFilters()"
                                       class="w-3.5 h-3.5 lg:w-4 lg:h-4 text-[#FF6B00] border-gray-600 focus:ring-[#FF6B00] focus:ring-offset-0">
                                <span class="text-xs lg:text-sm text-gray-300 group-hover:text-white transition-colors">All Prices</span>
                            </label>
                            <label class="flex items-center gap-2 lg:gap-3 cursor-pointer group">
                                <input type="radio" name="price" value="0-50" x-model="filters.price" @change="applyFilters()"
                                       class="w-3.5 h-3.5 lg:w-4 lg:h-4 text-[#FF6B00] border-gray-600 focus:ring-[#FF6B00] focus:ring-offset-0">
                                <span class="text-xs lg:text-sm text-gray-300 group-hover:text-white transition-colors">Under $50</span>
                            </label>
                            <label class="flex items-center gap-2 lg:gap-3 cursor-pointer group">
                                <input type="radio" name="price" value="50-100" x-model="filters.price" @change="applyFilters()"
                                       class="w-3.5 h-3.5 lg:w-4 lg:h-4 text-[#FF6B00] border-gray-600 focus:ring-[#FF6B00] focus:ring-offset-0">
                                <span class="text-xs lg:text-sm text-gray-300 group-hover:text-white transition-colors">$50 - $100</span>
                            </label>
                            <label class="flex items-center gap-2 lg:gap-3 cursor-pointer group">
                                <input type="radio" name="price" value="100-200" x-model="filters.price" @change="applyFilters()"
                                       class="w-3.5 h-3.5 lg:w-4 lg:h-4 text-[#FF6B00] border-gray-600 focus:ring-[#FF6B00] focus:ring-offset-0">
                                <span class="text-xs lg:text-sm text-gray-300 group-hover:text-white transition-colors">$100 - $200</span>
                            </label>
                            <label class="flex items-center gap-2 lg:gap-3 cursor-pointer group">
                                <input type="radio" name="price" value="200+" x-model="filters.price" @change="applyFilters()"
                                       class="w-3.5 h-3.5 lg:w-4 lg:h-4 text-[#FF6B00] border-gray-600 focus:ring-[#FF6B00] focus:ring-offset-0">
                                <span class="text-xs lg:text-sm text-gray-300 group-hover:text-white transition-colors">$200+</span>
                            </label>
                        </div>
                    </div>

                    {{-- Special Filters --}}
                    <div class="mb-5 lg:mb-6">
                        <h4 class="text-xs lg:text-sm font-rajdhani font-700 tracking-wider uppercase text-gray-500 mb-2 lg:mb-3">Special</h4>
                        <div class="space-y-1.5 lg:space-y-2">
                            <label class="flex items-center gap-2 lg:gap-3 cursor-pointer group">
                                <input type="checkbox" x-model="filters.featured" @change="applyFilters()"
                                       class="w-3.5 h-3.5 lg:w-4 lg:h-4 text-[#FF6B00] border-gray-600 focus:ring-[#FF6B00] focus:ring-offset-0 rounded">
                                <span class="text-xs lg:text-sm text-gray-300 group-hover:text-white transition-colors">Featured</span>
                            </label>
                            <label class="flex items-center gap-2 lg:gap-3 cursor-pointer group">
                                <input type="checkbox" x-model="filters.new" @change="applyFilters()"
                                       class="w-3.5 h-3.5 lg:w-4 lg:h-4 text-[#FF6B00] border-gray-600 focus:ring-[#FF6B00] focus:ring-offset-0 rounded">
                                <span class="text-xs lg:text-sm text-gray-300 group-hover:text-white transition-colors">New Arrivals</span>
                            </label>
                            <label class="flex items-center gap-2 lg:gap-3 cursor-pointer group">
                                <input type="checkbox" x-model="filters.sale" @change="applyFilters()"
                                       class="w-3.5 h-3.5 lg:w-4 lg:h-4 text-[#FF6B00] border-gray-600 focus:ring-[#FF6B00] focus:ring-offset-0 rounded">
                                <span class="text-xs lg:text-sm text-gray-300 group-hover:text-white transition-colors">On Sale</span>
                            </label>
                        </div>
                    </div>
                </div>
            </aside>

            {{-- Products Grid --}}
            <main class="flex-1 min-w-0">
                {{-- Sort Bar --}}
                <div class="flex items-center justify-between mb-4 lg:mb-6 pb-3 lg:pb-4 border-b border-[#1E1E1E]">
                    <div class="text-xs lg:text-sm text-gray-500">
                        Showing <span class="text-white font-rajdhani font-700" x-text="filteredProducts.length"></span> products
                    </div>
                    <div class="flex items-center gap-2 lg:gap-3">
                        <span class="text-gray-600 text-[10px] lg:text-xs font-rajdhani font-700 tracking-wider uppercase">Sort:</span>
                        <select x-model="filters.sort" @change="applyFilters()"
                                class="bg-[#0D0D0D] border border-[#252525] text-gray-300 text-xs lg:text-sm px-3 lg:px-4 py-1.5 lg:py-2 focus:outline-none focus:border-[#FF6B00] transition-colors cursor-pointer rounded">
                            <option value="featured">Featured</option>
                            <option value="price-asc">Price: Low to High</option>
                            <option value="price-desc">Price: High to Low</option>
                            <option value="newest">Newest</option>
                            <option value="rating">Top Rated</option>
                        </select>
                    </div>
                </div>

                {{-- Loading State --}}
                <div x-show="loading" class="py-16 lg:py-20 text-center">
                    <div class="inline-block w-10 h-10 lg:w-12 lg:h-12 border-4 border-[#FF6B00] border-t-transparent rounded-full animate-spin"></div>
                    <p class="text-gray-500 mt-3 lg:mt-4 font-rajdhani font-600 text-sm lg:text-base">Loading products...</p>
                </div>

                {{-- Product Grid --}}
                <div x-show="!loading" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 lg:gap-6">
                    <template x-for="product in filteredProducts" :key="product.id">
                        <div class="card group" data-aos="fade-up">
                            {{-- Product Visual --}}
                            <div class="relative overflow-hidden" style="height:220px; background: linear-gradient(145deg, product.color_start, product.color_end);" class="lg:!h-[280px]">
                                <div class="absolute inset-0 flex flex-col items-center justify-center text-white select-none">
                                    <div class="font-bebas text-6xl lg:text-8xl opacity-10 absolute top-1/2 -translate-y-1/2">TE</div>
                                    <i class="fas fa-bolt text-5xl lg:text-6xl opacity-60 drop-shadow-2xl relative z-10"></i>
                                    <span class="font-bebas text-lg lg:text-xl mt-2 lg:mt-3 tracking-wider relative z-10" x-text="product.name"></span>
                                    <span class="text-[10px] lg:text-xs opacity-60 relative z-10 font-rajdhani mt-0.5 lg:mt-1" x-text="product.flavor"></span>
                                </div>

                                {{-- Tags --}}
                                <div class="absolute top-2 lg:top-3 left-2 lg:left-3 flex flex-col gap-1 lg:gap-1.5">
                                    <template x-if="product.is_new">
                                        <div class="product-tag text-white bg-green-600/80 backdrop-blur-sm px-2 lg:px-3 py-0.5 lg:py-1 text-[10px] lg:text-xs font-rajdhani font-700 tracking-wider uppercase rounded">
                                            New
                                        </div>
                                    </template>
                                    <template x-if="product.is_sale">
                                        <div class="product-tag text-white bg-red-600/80 backdrop-blur-sm px-2 lg:px-3 py-0.5 lg:py-1 text-[10px] lg:text-xs font-rajdhani font-700 tracking-wider uppercase rounded">
                                            Sale
                                        </div>
                                    </template>
                                    <template x-if="product.is_featured">
                                        <div class="product-tag text-white bg-[#FF6B00]/80 backdrop-blur-sm px-2 lg:px-3 py-0.5 lg:py-1 text-[10px] lg:text-xs font-rajdhani font-700 tracking-wider uppercase rounded">
                                            Featured
                                        </div>
                                    </template>
                                </div>

                                {{-- Wishlist --}}
                                <button class="absolute top-2 lg:top-3 right-2 lg:right-3 w-7 h-7 lg:w-8 lg:h-8 rounded-full bg-black/40 flex items-center justify-center text-white/60 hover:text-[#FF6B00] hover:bg-black/70 transition-all text-xs lg:text-sm backdrop-blur-sm">
                                    <i class="fas fa-heart"></i>
                                </button>

                                {{-- Quick Add Slide-up --}}
                                <div class="absolute bottom-0 inset-x-0 bg-[#FF6B00] py-2.5 lg:py-3.5 translate-y-full group-hover:translate-y-0 transition-transform duration-300 text-center">
                                    <button class="font-rajdhani font-700 text-[11px] lg:text-sm tracking-wider uppercase text-white w-full"
                                            @click="addToCart(product)">
                                        <i class="fas fa-shopping-bag mr-1.5 lg:mr-2"></i> Add to Cart
                                    </button>
                                </div>
                            </div>

                            {{-- Card Body --}}
                            <div class="p-4 lg:p-5">
                                <div class="flex items-start justify-between mb-1 lg:mb-2">
                                    <div>
                                        <h3 class="font-rajdhani font-700 text-sm lg:text-base leading-tight" x-text="product.name"></h3>
                                        <p class="text-gray-500 text-[10px] lg:text-xs mt-0.5 lg:mt-1" x-text="product.flavor"></p>
                                    </div>
                                    <div class="text-right">
                                        <template x-if="product.original_price">
                                            <span class="font-bebas text-xs lg:text-sm text-gray-500 line-through block" x-text="'$' + product.original_price"></span>
                                        </template>
                                        <span class="font-bebas text-xl lg:text-2xl text-[#FF6B00]" x-text="'$' + product.price"></span>
                                    </div>
                                </div>
                                <p class="text-gray-600 text-[10px] lg:text-xs font-rajdhani font-600 tracking-wider uppercase mt-1 lg:mt-2" x-text="product.size"></p>
                                <div class="flex items-center justify-between mt-2 lg:mt-3 pt-2 lg:pt-3 border-t border-[#1A1A1A]">
                                    <div class="flex items-center gap-1 lg:gap-1.5">
                                        <div class="stars text-[10px] lg:text-xs">
                                            <template x-for="i in 5">
                                                <i class="fas fa-star" :style="i <= product.rating ? '' : 'opacity:0.2'"></i>
                                            </template>
                                        </div>
                                        <span class="text-gray-500 text-[10px] lg:text-xs" x-text="product.reviews"></span>
                                    </div>
                                    <button @click="addToCart(product)" class="w-7 h-7 lg:w-8 lg:h-8 flex items-center justify-center bg-[#1A1A1A] hover:bg-[#FF6B00] transition-colors text-gray-400 hover:text-white text-xs lg:text-sm rounded">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>

                {{-- Empty State --}}
                <div x-show="!loading && filteredProducts.length === 0" class="py-16 lg:py-20 text-center">
                    <i class="fas fa-search text-3xl lg:text-4xl text-[#252525] mb-3 lg:mb-4 block"></i>
                    <p class="text-gray-500 font-rajdhani font-600 text-sm lg:text-base">No products found</p>
                    <button @click="resetFilters()" class="mt-3 lg:mt-4 text-[#FF6B00] hover:text-white transition-colors text-xs lg:text-sm font-rajdhani font-700 tracking-wider uppercase">
                        Clear Filters
                    </button>
                </div>
            </main>
        </div>
    </section>

    {{-- Promo Banner --}}
    <section class="my-8 lg:my-12 mx-5 lg:mx-auto max-w-7xl">
        <div class="relative overflow-hidden border border-[#252525] p-6 lg:p-10 flex flex-col sm:flex-row items-center gap-4 lg:gap-6 justify-between"
             style="background: linear-gradient(135deg, #111 0%, #1A0800 100%);">
            <div class="absolute right-0 top-0 bottom-0 w-48 lg:w-64 pointer-events-none"
                 style="background: radial-gradient(ellipse at right, rgba(255,107,0,0.12), transparent 70%);"></div>
            <div class="z-10">
                <div class="section-label mb-1 lg:mb-2 text-xs lg:text-sm">Bundle &amp; Save</div>
                <h3 class="font-bebas text-2xl lg:text-4xl">BUY 3, GET 1 <span class="text-gradient">FREE</span></h3>
                <p class="text-gray-400 text-xs lg:text-sm mt-1 lg:mt-2">Mix and match any flavors. Applied automatically at checkout.</p>
            </div>
            <a href="{{ route('products') }}" class="btn-primary flex-shrink-0 z-10 text-sm lg:text-base">
                <span>Build My Bundle</span>
                <i class="fas fa-boxes"></i>
            </a>
        </div>
    </section>

@endsection

@section('scripts')
<script>
function shopFilters() {
    return {
        products: @json($products),
        filteredProducts: [],
        loading: false,
        filters: {
            category: 'all',
            price: 'all',
            sort: 'featured',
            featured: false,
            new: false,
            sale: false
        },
        
        init() {
            this.applyFilters();
        },
        
        applyFilters() {
            this.loading = true;
            
            // Simulate AJAX delay for better UX
            setTimeout(() => {
                let filtered = [...this.products];
                
                // Category filter
                if (this.filters.category !== 'all') {
                    filtered = filtered.filter(p => p.category === this.filters.category);
                }
                
                // Price filter
                if (this.filters.price !== 'all') {
                    filtered = filtered.filter(p => {
                        const price = parseFloat(p.price);
                        switch(this.filters.price) {
                            case '0-50': return price < 50;
                            case '50-100': return price >= 50 && price < 100;
                            case '100-200': return price >= 100 && price < 200;
                            case '200+': return price >= 200;
                            default: return true;
                        }
                    });
                }
                
                // Special filters
                if (this.filters.featured) {
                    filtered = filtered.filter(p => p.is_featured);
                }
                if (this.filters.new) {
                    filtered = filtered.filter(p => p.is_new);
                }
                if (this.filters.sale) {
                    filtered = filtered.filter(p => p.is_sale);
                }
                
                // Sort
                switch(this.filters.sort) {
                    case 'price-asc':
                        filtered.sort((a, b) => parseFloat(a.price) - parseFloat(b.price));
                        break;
                    case 'price-desc':
                        filtered.sort((a, b) => parseFloat(b.price) - parseFloat(a.price));
                        break;
                    case 'newest':
                        filtered.sort((a, b) => b.id - a.id);
                        break;
                    case 'rating':
                        filtered.sort((a, b) => b.rating - a.rating);
                        break;
                    case 'featured':
                    default:
                        filtered.sort((a, b) => b.is_featured - a.is_featured);
                        break;
                }
                
                this.filteredProducts = filtered;
                this.loading = false;
            }, 300);
        },
        
        resetFilters() {
            this.filters = {
                category: 'all',
                price: 'all',
                sort: 'featured',
                featured: false,
                new: false,
                sale: false
            };
            this.applyFilters();
        },
        
        addToCart(product) {
            // Add to cart logic
            console.log('Adding to cart:', product);
            // You can integrate with your cart system here
        }
    }
}
</script>
@endsection
