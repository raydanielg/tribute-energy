<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('meta_description', 'Tribute Energy — solar water pumping, hybrid power systems and water supply solutions for communities across Tanzania.')">
    <title>@yield('title', 'Tribute Energy') | Tribute Energy</title>
    <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inter:wght@300;400;500;600;700;800;900&family=Rajdhani:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.14.1/dist/cdn.min.js"></script>

    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: {
                            "50":"#fff7ed","100":"#ffedd5","200":"#fed7aa","300":"#fdba74",
                            "400":"#fb923c","500":"#f97316","600":"#ea580c","700":"#c2410c",
                            "800":"#9a3412","900":"#7c2d12","950":"#431407"
                        }
                    },
                    fontFamily: {
                        bebas: ['"Bebas Neue"', 'cursive'],
                        rajdhani: ['Rajdhani', 'sans-serif'],
                        body: ['Inter','ui-sans-serif','system-ui','-apple-system','Segoe UI','Roboto','Helvetica Neue','Arial','Noto Sans','sans-serif'],
                        sans: ['Inter','ui-sans-serif','system-ui','-apple-system','Segoe UI','Roboto','Helvetica Neue','Arial','Noto Sans','sans-serif']
                    }
                }
            }
        }
    </script>

    <style>
        :root {
            --orange: #FF6B00;
            --gold:   #FFB800;
            --card:   #ffffff;
            --bdr:    #e5e7eb;
        }
        *, *::before, *::after { box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body { font-family: 'Inter', sans-serif; overflow-x: hidden; }

        ::-webkit-scrollbar { width: 3px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: var(--orange); border-radius: 4px; }

        .font-bebas   { font-family: 'Bebas Neue', cursive; }
        .font-rajdhani { font-family: 'Rajdhani', sans-serif; }

        .text-gradient {
            background: linear-gradient(135deg, #FF6B00 0%, #FFB800 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .section-label {
            font-family: 'Rajdhani', sans-serif;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 5px;
            text-transform: uppercase;
            color: var(--orange);
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 14px 34px;
            background: linear-gradient(135deg, #FF6B00, #FF9000);
            color: #fff;
            font-family: 'Rajdhani', sans-serif;
            font-weight: 700;
            font-size: 15px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            text-decoration: none;
            border: none;
            cursor: pointer;
            clip-path: polygon(10px 0%, 100% 0%, calc(100% - 10px) 100%, 0% 100%);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        .btn-primary::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, #FF9000, #FFB800);
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .btn-primary:hover::before { opacity: 1; }
        .btn-primary:hover { transform: translateY(-3px); box-shadow: 0 15px 40px rgba(255,107,0,0.45); }
        .btn-primary span, .btn-primary i { position: relative; z-index: 1; }

        .btn-outline {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 12px 34px;
            background: transparent;
            color: #333;
            font-family: 'Rajdhani', sans-serif;
            font-weight: 700;
            font-size: 15px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            text-decoration: none;
            border: 1.5px solid rgba(255,107,0,0.5);
            cursor: pointer;
            clip-path: polygon(10px 0%, 100% 0%, calc(100% - 10px) 100%, 0% 100%);
            transition: all 0.3s ease;
        }
        .btn-outline:hover {
            border-color: var(--orange);
            background: rgba(255,107,0,0.08);
            color: #FF6B00;
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(255,107,0,0.2);
        }

        .card {
            background: var(--card);
            border: 1px solid var(--bdr);
            border-radius: 16px;
            transition: all 0.35s cubic-bezier(0.4,0,0.2,1);
        }
        .card:hover {
            border-color: rgba(255,107,0,0.35);
            transform: translateY(-4px);
            box-shadow: 0 20px 50px rgba(0,0,0,0.08);
        }

        .nav-link {
            position: relative;
            font-family: 'Rajdhani', sans-serif;
            font-weight: 600;
            font-size: 15px;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: rgba(0,0,0,0.6);
            text-decoration: none;
            transition: color 0.25s ease;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -3px; left: 0;
            width: 0; height: 2px;
            background: var(--orange);
            transition: width 0.3s ease;
        }
        .nav-link:hover { color: #000; }
        .nav-link:hover::after, .nav-link.active::after { width: 100%; }
        .nav-link.active { color: #000; }

        .cart-panel {
            transform: translateX(100%);
            transition: transform 0.4s cubic-bezier(0.4,0,0.2,1);
        }
        .cart-panel.open { transform: translateX(0); }

        #te-toast {
            position: fixed;
            bottom: 28px; right: 28px;
            z-index: 9999;
            background: #fff;
            border-left: 3px solid var(--orange);
            padding: 14px 22px;
            min-width: 280px;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.12);
            transform: translateY(80px);
            opacity: 0;
            transition: all 0.4s cubic-bezier(0.4,0,0.2,1);
            pointer-events: none;
        }
        #te-toast.show { transform: translateY(0); opacity: 1; }

        .glow-orange { box-shadow: 0 0 40px rgba(255,107,0,0.25); }
        .text-glow   { text-shadow: 0 0 40px rgba(255,107,0,0.5); }
        .stars { color: #FFB800; font-size: 12px; letter-spacing: 1px; }

        .product-tag {
            font-family: 'Rajdhani', sans-serif;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            padding: 3px 10px;
        }

        [x-cloak] { display: none !important; }

        @keyframes gradientShift {
            0%   { background-position: 0% 50%; }
            50%  { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .divider {
            width: 60px; height: 3px;
            background: linear-gradient(90deg, var(--orange), var(--gold));
            margin: 16px 0;
        }
    </style>

    @yield('head')
</head>
<body x-data="cartApp()" x-cloak class="bg-white text-gray-900 antialiased">

    {{-- Cookie Overlay --}}
    <div id="cookie-overlay" class="cookie-overlay">
        <div class="cookie-overlay-bg"></div>
    </div>
    <script>
    (function(){
        if (localStorage.getItem('te_cookie_consent')) {
            var el = document.getElementById('cookie-overlay');
            if (el) el.style.display = 'none';
        }
    })();
    </script>

    @include('partials.landing-header')

    <main class="pt-20">
        @yield('content')
    </main>

    @include('partials.landing-footer')

    {{-- Cart Sidebar --}}
    <div x-show="open" class="fixed inset-0 z-[60]" x-cloak>
        <div class="absolute inset-0 bg-black/40 backdrop-blur-sm"
             x-on:click="open = false"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"></div>

        <div class="absolute right-0 top-0 h-full w-full max-w-[420px] bg-white border-l border-gray-200 flex flex-col cart-panel"
             :class="{'open': open}">

            <div class="flex items-center justify-between p-6 border-b border-gray-100">
                <h2 class="font-bebas text-2xl tracking-widest text-gray-900">
                    CART <span class="text-[#FF6B00]" x-text="'(' + count + ')'"></span>
                </h2>
                <button x-on:click="open = false"
                        class="w-9 h-9 rounded-full bg-gray-100 hover:bg-[#FF6B00] hover:text-white transition-colors flex items-center justify-center text-sm">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div class="flex-1 overflow-y-auto p-6 space-y-4">
                <template x-if="items.length === 0">
                    <div class="text-center py-16">
                        <div class="w-16 h-16 rounded-full bg-gray-100 flex items-center justify-center mx-auto mb-5">
                            <i class="fas fa-shopping-bag text-2xl text-gray-300"></i>
                        </div>
                        <p class="text-gray-400 font-rajdhani font-600 text-lg mb-6">Your cart is empty</p>
                        <a href="{{ route('products') }}" x-on:click="open = false" class="btn-primary">
                            <span>Shop Now</span> <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </template>

                <template x-for="(item, i) in items" :key="i">
                    <div class="flex gap-4 p-4 bg-gray-50 border border-gray-100 group rounded-xl">
                        <div class="w-[72px] h-[72px] flex-shrink-0 flex items-center justify-center text-white font-bebas text-xl rounded-lg"
                             :style="'background: linear-gradient(135deg,' + item.cs + ',' + item.ce + ')'">
                            TE
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="font-rajdhani font-700 text-sm text-gray-900 truncate" x-text="item.name"></p>
                            <p class="text-gray-500 text-xs" x-text="item.flavor"></p>
                            <p class="text-[#FF6B00] font-rajdhani font-bold mt-1" x-text="'$' + item.price.toFixed(2)"></p>
                            <div class="flex items-center gap-2 mt-2">
                                <button x-on:click="dec(i)"
                                        class="w-6 h-6 bg-gray-100 hover:bg-[#FF6B00] hover:text-white transition-colors text-xs flex items-center justify-center rounded">-</button>
                                <span class="font-bold text-sm w-5 text-center text-gray-900" x-text="item.qty"></span>
                                <button x-on:click="inc(i)"
                                        class="w-6 h-6 bg-gray-100 hover:bg-[#FF6B00] hover:text-white transition-colors text-xs flex items-center justify-center rounded">+</button>
                                <button x-on:click="remove(i)"
                                        class="ml-auto text-gray-400 hover:text-red-500 transition-colors opacity-0 group-hover:opacity-100">
                                    <i class="fas fa-trash text-xs"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            <div x-show="items.length > 0" class="p-6 border-t border-gray-100 space-y-4">
                <div class="flex justify-between items-center">
                    <span class="font-rajdhani font-700 text-base text-gray-500 tracking-wider uppercase">Total</span>
                    <span class="font-bebas text-4xl text-[#FF6B00]" x-text="'$' + total.toFixed(2)"></span>
                </div>
                <a href="{{ route('login') }}" class="btn-primary w-full">
                    <span>Checkout</span> <i class="fas fa-arrow-right"></i>
                </a>
                <button x-on:click="open = false" class="btn-outline w-full">Continue Shopping</button>
            </div>
        </div>
    </div>

    {{-- Toast --}}
    <div id="te-toast">
        <div class="flex items-center gap-3">
            <i class="fas fa-check-circle text-[#FF6B00]"></i>
            <span id="te-toast-msg" class="font-rajdhani font-600 text-sm text-gray-800"></span>
        </div>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        AOS.init({ duration: 750, once: true, easing: 'ease-out-cubic', offset: 60 });

        function cartApp() {
            return {
                open: false,
                items: JSON.parse(localStorage.getItem('te_cart') || '[]'),

                get count() { return this.items.reduce((s, i) => s + i.qty, 0); },
                get total() { return this.items.reduce((s, i) => s + i.price * i.qty, 0); },

                add(product) {
                    const found = this.items.find(i => i.id === product.id);
                    if (found) { found.qty++; }
                    else { this.items.push({ ...product, qty: 1 }); }
                    this.save();
                    this.toast(product.name + ' added to cart!');
                },

                inc(i)    { this.items[i].qty++; this.save(); },
                dec(i)    { if (this.items[i].qty > 1) { this.items[i].qty--; } else { this.items.splice(i, 1); } this.save(); },
                remove(i) { this.items.splice(i, 1); this.save(); },
                save()    { localStorage.setItem('te_cart', JSON.stringify(this.items)); },

                toast(msg) {
                    const el = document.getElementById('te-toast');
                    document.getElementById('te-toast-msg').textContent = msg;
                    el.classList.add('show');
                    setTimeout(() => el.classList.remove('show'), 3200);
                }
            }
        }
    </script>

    <style>
        .cookie-overlay {
            position: fixed;
            inset: 0;
            z-index: 99999;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .cookie-overlay-bg {
            position: absolute;
            inset: 0;
            background: rgba(0,0,0,0.55);
        }
        body.cookie-blocked {
            overflow: hidden !important;
            height: 100vh !important;
        }
        .swal2-popup.cookie-swal {
            border: 1px solid rgba(255,107,0,0.2) !important;
            box-shadow: 0 0 80px rgba(255,107,0,0.15) !important;
        }
        .cookie-swal-title {
            font-family: 'Bebas Neue', cursive !important;
            font-size: 2.2rem !important;
            letter-spacing: 2px !important;
        }
        .cookie-swal-text {
            font-family: 'Inter', sans-serif !important;
            font-size: 0.9rem !important;
            color: #9ca3af !important;
            line-height: 1.6 !important;
        }
        .cookie-swal-btn {
            font-family: 'Rajdhani', sans-serif !important;
            font-weight: 700 !important;
            letter-spacing: 1.5px !important;
            text-transform: uppercase !important;
            font-size: 0.9rem !important;
            padding: 12px 36px !important;
            border-radius: 50px !important;
            transition: all 0.3s ease !important;
        }
        .cookie-swal-btn:hover {
            transform: translateY(-2px) !important;
            box-shadow: 0 10px 40px rgba(255,107,0,0.4) !important;
        }
        .cookie-icon {
            width: 70px;
            height: 70px;
            margin: 0 auto 0.5rem;
            background: linear-gradient(135deg, #FF6B00, #FFB800);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: #fff;
            animation: cookie-pulse 2s ease-in-out infinite;
        }
        @keyframes cookie-pulse {
            0%, 100% { box-shadow: 0 0 20px rgba(255,107,0,0.3); transform: scale(1); }
            50% { box-shadow: 0 0 50px rgba(255,107,0,0.6); transform: scale(1.05); }
        }
    </style>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const COOKIE_KEY = 'te_cookie_consent';
        if (localStorage.getItem(COOKIE_KEY)) return;
        document.body.classList.add('cookie-blocked');
        Swal.fire({
            html: `
                <div class="cookie-icon">
                    <i class="fas fa-cookie-bite"></i>
                </div>
                <h2 class="cookie-swal-title" style="margin-top:1rem;background:linear-gradient(135deg,#FF6B00,#FFB800);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">
                    THIS SITE USES COOKIES
                </h2>
                <p class="cookie-swal-text" style="margin-top:0.5rem;max-width:420px;margin-left:auto;margin-right:auto;">
                    We use cookies to enhance your browsing experience, analyze site traffic,
                    and deliver personalized content. By clicking <strong style="color:#fff;">Accept</strong>,
                    you consent to our use of cookies.
                </p>
                <div style="margin-top:1rem;display:flex;gap:0.75rem;justify-content:center;font-size:0.75rem;color:#555;font-family:Inter,sans-serif;">
                    <a href="{{ route('terms') }}" style="color:#6b7280;text-decoration:underline;transition:color 0.3s;" onmouseover="this.style.color='#FF6B00'" onmouseout="this.style.color='#6b7280'">Privacy Policy</a>
                    <span style="color:#333;">|</span>
                    <a href="{{ route('terms') }}" style="color:#6b7280;text-decoration:underline;transition:color 0.3s;" onmouseover="this.style.color='#FF6B00'" onmouseout="this.style.color='#6b7280'">Terms of Service</a>
                </div>
            `,
            icon: null,
            showConfirmButton: true,
            confirmButtonText: '<i class="fas fa-check-circle mr-2"></i> ACCEPT & CONTINUE',
            confirmButtonColor: '#FF6B00',
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: true,
            backdrop: false,
            background: '#0F0F0F',
            color: '#fff',
            customClass: {
                popup: 'cookie-swal',
                confirmButton: 'cookie-swal-btn',
            },
            showClass: {
                popup: 'animate__animated animate__zoomIn animate__faster'
            },
            hideClass: {
                popup: 'animate__animated animate__zoomOut animate__faster'
            },
        }).then(function(result) {
            if (result.isConfirmed) {
                localStorage.setItem(COOKIE_KEY, 'accepted');
                document.body.classList.remove('cookie-blocked');
                const overlay = document.getElementById('cookie-overlay');
                if (overlay) overlay.style.display = 'none';
            }
        });
    });
    </script>

    {{-- Floating WhatsApp --}}
    <a href="https://wa.me/255787822735" target="_blank"
       class="fixed bottom-6 right-6 z-[999] w-16 h-16 rounded-full flex items-center justify-center shadow-xl hover:shadow-2xl transition-all duration-300 hover:scale-110 animate__animated animate__fadeInUp animate__delay-1s"
       style="background: linear-gradient(135deg, #25D366, #128C7E); box-shadow: 0 8px 32px rgba(37,211,102,0.4);"
       aria-label="Chat on WhatsApp">
        <i class="fab fa-whatsapp text-3xl text-white"></i>
        <span class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 rounded-full flex items-center justify-center animate__animated animate__pulse animate__infinite animate__slower">
            <span class="text-white text-[9px] font-bold">&#9679;</span>
        </span>
    </a>

    @yield('scripts')
</body>
</html>
