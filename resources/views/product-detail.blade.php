<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $product['name'] ?? 'Product' }} - {{ config('app.name', 'Tribute Energy') }}</title>
    <meta name="description" content="{{ $product['description'] ?? 'High-quality solar energy products from Tribute Energy' }}">
    <meta name="keywords" content="{{ $product['name'] ?? 'solar' }}, solar energy, Tanzania, Tribute Energy, {{ implode(', array_slice($product['specs'] ?? [], 0, 3)) }}">
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
        {{-- Breadcrumb --}}
        <div class="bg-white border-b border-gray-200">
            <div class="max-w-screen-xl mx-auto px-4 lg:px-8 py-4">
                <nav class="flex items-center text-sm">
                    <a href="/" class="text-gray-500 hover:text-gray-900">Home</a>
                    <span class="mx-2 text-gray-400">/</span>
                    <a href="/products" class="text-gray-500 hover:text-gray-900">Products</a>
                    <span class="mx-2 text-gray-400">/</span>
                    <span class="text-gray-900 font-medium">{{ $product['name'] ?? 'Product' }}</span>
                </nav>
            </div>
        </div>

        {{-- Product Detail Section --}}
        <section class="py-12">
            <div class="max-w-screen-xl mx-auto px-4 lg:px-8">
                <div class="grid md:grid-cols-2 gap-12">
                    {{-- Product Image --}}
                    <div class="relative">
                        <div class="aspect-square rounded-2xl flex items-center justify-center" style="background: {{ $product['color'] ?? 'linear-gradient(135deg, #fff7ed, #ffedd5)' }};">
                            <div class="w-48 h-48 rounded-full flex items-center justify-center" style="background: {{ $product['color'] ?? 'linear-gradient(135deg, #fff7ed, #ffedd5)' }};">
                                <svg class="w-24 h-24 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    {{-- Product Info --}}
                    <div>
                        <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4">{{ $product['name'] ?? 'Product' }}</h1>
                        
                        <div class="flex items-center mb-4">
                            <span class="text-yellow-400 text-xl">{{ $product['rating'] ?? '★★★★★' }}</span>
                            <span class="text-sm text-gray-500 ml-2">{{ $product['reviews'] ?? '(0 reviews)' }}</span>
                        </div>

                        <div class="mb-6">
                            <span class="text-4xl font-extrabold" style="color: #FF8C00;">TZS {{ number_format($product['price'] ?? 0) }}</span>
                        </div>

                        <p class="text-gray-600 text-lg mb-8 leading-relaxed">{{ $product['description'] ?? 'Product description' }}</p>

                        {{-- Specifications --}}
                        <div class="mb-8">
                            <h2 class="text-xl font-bold text-gray-900 mb-4">Specifications</h2>
                            <ul class="space-y-3">
                                @foreach($product['specs'] ?? [] as $spec)
                                    <li class="flex items-start">
                                        <svg class="w-5 h-5 mr-3 mt-0.5" style="color: #FF8C00;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        <span class="text-gray-600">{{ $spec }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        {{-- Quantity and Add to Cart --}}
                        <form action="{{ route('cart.add', $product->id) }}" method="POST" class="flex items-center gap-4 mb-8">
                            @csrf
                            <div class="flex items-center gap-3">
                                <input type="number" name="quantity" value="1" min="1" class="w-16 h-12 rounded-lg border border-gray-300 text-center font-semibold text-xl focus:outline-none focus:ring-2 focus:ring-orange-500">
                            </div>
                            <button type="submit" class="flex-1 py-4 text-white font-bold rounded-xl transition-all duration-200 hover:shadow-lg" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">
                                Add to Cart
                            </button>
                        </form>

                        {{-- Social Sharing --}}
                        <div>
                            <h2 class="text-lg font-bold text-gray-900 mb-3">Share this product</h2>
                            <div class="flex gap-3">
                                <a id="shareFacebook" href="#" target="_blank" class="flex items-center justify-center py-3 px-6 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors font-medium">
                                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                    </svg>
                                    Facebook
                                </a>
                                <a id="shareTwitter" href="#" target="_blank" class="flex items-center justify-center py-3 px-6 bg-sky-500 text-white rounded-lg hover:bg-sky-600 transition-colors font-medium">
                                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                    </svg>
                                    Twitter
                                </a>
                                <a id="shareWhatsApp" href="#" target="_blank" class="flex items-center justify-center py-3 px-6 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors font-medium">
                                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 6.557 5.335 11.892 11.892 11.892a11.813 11.813 0 008.413-3.48z"/>
                                    </svg>
                                    WhatsApp
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Related Products --}}
        <section class="py-12 bg-white">
            <div class="max-w-screen-xl mx-auto px-4 lg:px-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-8">Related Products</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    {{-- Related products would be loaded here --}}
                    <div class="bg-gray-100 rounded-xl p-8 text-center text-gray-500">
                        More products coming soon
                    </div>
                </div>
            </div>
        </section>
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
        // Product data
        const product = @json($product ?? []);
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        let productQuantity = 1;

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

        // Add to cart button
        document.getElementById('addToCartBtn').addEventListener('click', () => {
            for (let i = 0; i < productQuantity; i++) {
                addToCart(product.name, product.price, product.color);
            }
            alert(`${productQuantity} x ${product.name} added to cart!`);
        });

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
            
            console.log('Order submitted:', { email, phone, cart });
            
            alert('Order submitted successfully! We will contact you soon.');
            
            cart = [];
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartCount();
            updateCartDisplay();
            
            orderModal.classList.add('hidden');
            orderModal.classList.remove('flex');
            cartSidebar.classList.add('translate-x-full');
            cartOverlay.classList.add('hidden');
            
            orderForm.reset();
        });

        // Social sharing
        const productUrl = window.location.href;
        const shareText = `Check out ${product.name} at Tribute Energy - TZS ${product.price.toLocaleString()}`;
        
        document.getElementById('shareFacebook').href = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(productUrl)}`;
        document.getElementById('shareTwitter').href = `https://twitter.com/intent/tweet?text=${encodeURIComponent(shareText)}&url=${encodeURIComponent(productUrl)}`;
        document.getElementById('shareWhatsApp').href = `https://wa.me/?text=${encodeURIComponent(shareText + ' ' + productUrl)}`;

        // Initialize
        updateCartCount();
        updateCartDisplay();
    </script>
</body>
</html>
