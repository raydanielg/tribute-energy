<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Checkout - {{ config('app.name', 'Tribute Energy') }}</title>
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
</head>
<body class="bg-gray-50">
    @include('partials.landing-header')

    <main class="pt-20 min-h-screen">
        <div class="max-w-screen-xl mx-auto px-4 lg:px-8 py-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-8">Checkout</h1>

            <form action="{{ route('checkout.place') }}" method="POST">
                @csrf
                @error('shipping_address')
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        {{ $message }}
                    </div>
                @enderror
                @error('phone')
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        {{ $message }}
                    </div>
                @enderror

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <div class="lg:col-span-2">
                        <div class="bg-white rounded-xl shadow-sm border border-gray-100 mb-6">
                            <div class="p-6 border-b border-gray-100">
                                <h2 class="text-xl font-bold text-gray-900">Contact Information</h2>
                            </div>
                            <div class="p-6">
                                @auth
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div class="md:col-span-2">
                                            <label class="block text-sm font-semibold text-gray-700 mb-2">Full Name</label>
                                            <input type="text" value="{{ auth()->user()->name }}" disabled class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-gray-50 text-gray-500">
                                        </div>
                                        <div class="md:col-span-2">
                                            <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                                            <input type="email" value="{{ auth()->user()->email }}" disabled class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-gray-50 text-gray-500">
                                        </div>
                                    </div>
                                @else
                                    <div class="mb-4 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                                        <p class="text-sm text-blue-800">Create an account to track your orders and get better service!</p>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div class="md:col-span-2">
                                            <label class="block text-sm font-semibold text-gray-700 mb-2">Full Name *</label>
                                            <input type="text" name="guest_name" value="{{ old('guest_name') }}" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" placeholder="Enter your full name">
                                        </div>
                                        <div class="md:col-span-2">
                                            <label class="block text-sm font-semibold text-gray-700 mb-2">Email Address *</label>
                                            <input type="email" name="guest_email" value="{{ old('guest_email') }}" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" placeholder="Enter your email">
                                        </div>
                                        <div class="md:col-span-2">
                                            <label class="block text-sm font-semibold text-gray-700 mb-2">Phone Number *</label>
                                            <input type="tel" name="guest_phone" value="{{ old('guest_phone') }}" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" placeholder="Enter your phone number">
                                        </div>
                                        <div class="md:col-span-2">
                                            <label class="block text-sm font-semibold text-gray-700 mb-2">Password *</label>
                                            <input type="password" name="guest_password" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" placeholder="Create a password">
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="bg-white rounded-xl shadow-sm border border-gray-100 mb-6">
                            <div class="p-6 border-b border-gray-100">
                                <h2 class="text-xl font-bold text-gray-900">Shipping Information</h2>
                            </div>
                            <div class="p-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Phone Number</label>
                                        <input type="tel" name="phone" value="{{ auth()->check() ? (auth()->user()->phone ?? old('phone')) : old('phone') }}" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" placeholder="Enter your phone number">
                                    </div>
                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Shipping Address *</label>
                                        <textarea name="shipping_address" required rows="3" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" placeholder="Enter your full shipping address">{{ old('shipping_address') }}</textarea>
                                    </div>
                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Order Notes (Optional)</label>
                                        <textarea name="notes" rows="2" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" placeholder="Any special instructions for your order">{{ old('notes') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-xl shadow-sm border border-gray-100">
                            <div class="p-6 border-b border-gray-100">
                                <h2 class="text-xl font-bold text-gray-900">Order Items</h2>
                            </div>
                            <div class="p-6">
                                <div class="space-y-4">
                                    @foreach($cart as $productId => $item)
                                    <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-lg">
                                        <div class="w-16 h-16 rounded-lg flex items-center justify-center" style="background: linear-gradient(135deg, #fff7ed 0%, #ffedd5 100%);">
                                            <svg class="w-8 h-8" style="color: #FF8C00;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                                        </div>
                                        <div class="flex-1">
                                            <div class="font-semibold text-gray-900">{{ $item['name'] }}</div>
                                            <div class="text-sm text-gray-500">Qty: {{ $item['quantity'] }}</div>
                                        </div>
                                        <div class="text-right">
                                            <div class="font-semibold" style="color: #FF8C00;">TZS {{ number_format($item['price'] * $item['quantity']) }}</div>
                                            <div class="text-sm text-gray-500">TZS {{ number_format($item['price']) }} each</div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="bg-white rounded-xl shadow-sm border border-gray-100">
                            <div class="p-6 border-b border-gray-100">
                                <h2 class="text-xl font-bold text-gray-900">Order Summary</h2>
                            </div>
                            <div class="p-6">
                                <div class="space-y-3">
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Subtotal</span>
                                        <span class="font-semibold text-gray-900">TZS {{ number_format($total) }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Shipping</span>
                                        <span class="font-semibold text-gray-900">TZS 0</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Tax</span>
                                        <span class="font-semibold text-gray-900">TZS 0</span>
                                    </div>
                                    <div class="border-t border-gray-200 pt-3 flex justify-between">
                                        <span class="font-bold text-gray-900">Total</span>
                                        <span class="font-bold text-xl" style="color: #FF8C00;">TZS {{ number_format($total) }}</span>
                                    </div>
                                </div>
                                <button type="submit" class="mt-6 w-full px-6 py-3 text-white font-semibold rounded-lg transition-all duration-200 hover:shadow-lg" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">
                                    Place Order
                                </button>
                                <a href="{{ route('cart') }}" class="mt-4 block w-full px-6 py-3 text-center text-gray-700 font-semibold rounded-lg border border-gray-300 hover:bg-gray-50 transition-colors">
                                    Back to Cart
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>

    @include('partials.landing-footer')
</body>
</html>
