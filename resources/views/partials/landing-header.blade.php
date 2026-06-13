<header id="main-header" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 bg-white/95 backdrop-blur-md border-b border-gray-100 shadow-sm">
    <nav class="max-w-screen-xl mx-auto px-4 lg:px-8">
        <div class="flex items-center justify-between h-16 lg:h-[68px]">

            {{-- Logo --}}
            <a href="/" class="flex items-center flex-shrink-0">
                <img src="{{ asset('logo.png') }}" alt="Tribute Energy Logo" class="h-12 w-auto object-contain">
            </a>

            {{-- Center Nav Links --}}
            <div class="hidden md:flex items-center space-x-1" id="navbar-sticky">
                <a href="/" class="px-4 py-2 text-sm font-medium rounded-lg hover:bg-orange-50 transition-colors" style="color: #FF8C00;">Home</a>
                <a href="#features" class="px-4 py-2 text-sm font-medium text-gray-600 hover:text-gray-900 rounded-lg hover:bg-gray-50 transition-colors">Features</a>
                <a href="#projects" class="px-4 py-2 text-sm font-medium text-gray-600 hover:text-gray-900 rounded-lg hover:bg-gray-50 transition-colors">Projects</a>
                <a href="/products" class="px-4 py-2 text-sm font-medium text-gray-600 hover:text-gray-900 rounded-lg hover:bg-gray-50 transition-colors">Products</a>
                <a href="/gallery" class="px-4 py-2 text-sm font-medium text-gray-600 hover:text-gray-900 rounded-lg hover:bg-gray-50 transition-colors">Gallery</a>
                <a href="#partnerships" class="px-4 py-2 text-sm font-medium text-gray-600 hover:text-gray-900 rounded-lg hover:bg-gray-50 transition-colors">Partners</a>
                <a href="#contact" class="px-4 py-2 text-sm font-medium text-gray-600 hover:text-gray-900 rounded-lg hover:bg-gray-50 transition-colors">Contact</a>
            </div>

            {{-- Right Actions --}}
            <div class="flex items-center space-x-1">
                {{-- Talk to sales - hidden on small --}}
                <a href="tel:+255000000000" class="hidden lg:flex items-center space-x-1.5 px-3 py-2 text-sm font-medium text-gray-600 hover:text-gray-900 rounded-lg hover:bg-gray-50 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                    <span>Talk to sales</span>
                </a>

                <div class="hidden md:block w-px h-5 bg-gray-200 mx-1"></div>

                @auth
                    <a href="{{ route('cart') }}" class="relative px-4 py-2 text-sm font-medium text-gray-700 hover:text-gray-900 rounded-lg hover:bg-gray-50 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                        @if(session('cart'))
                            <span class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 text-white text-xs font-bold rounded-full flex items-center justify-center">{{ count(session('cart')) }}</span>
                        @endif
                    </a>
                    <a href="{{ route('user.dashboard') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-gray-900 rounded-lg hover:bg-gray-50 transition-colors">Dashboard</a>
                @else
                    <a href="{{ route('cart') }}" class="relative px-4 py-2 text-sm font-medium text-gray-700 hover:text-gray-900 rounded-lg hover:bg-gray-50 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                        @if(session('cart'))
                            <span class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 text-white text-xs font-bold rounded-full flex items-center justify-center">{{ count(session('cart')) }}</span>
                        @endif
                    </a>
                    <a href="{{ route('login') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-gray-900 rounded-lg hover:bg-gray-50 transition-colors">Login</a>
                    <a href="{{ route('register') }}" class="px-4 py-2 text-sm font-semibold text-white rounded-lg shadow-sm hover:shadow-md transition-all duration-200 ml-1" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">
                        Sign up
                    </a>
                @endauth

                {{-- Mobile menu toggle --}}
                <button id="mobileMenuToggle" type="button" class="md:hidden p-2 text-gray-500 hover:text-gray-700 rounded-lg hover:bg-gray-100 transition-colors ml-1">
                    <svg class="w-5 h-5" id="menu-open-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg class="w-5 h-5 hidden" id="menu-close-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        {{-- Mobile Menu --}}
        <div class="md:hidden hidden pb-4 border-t border-gray-100 mt-1" id="mobile-menu">
            <div class="pt-3 space-y-1">
                <a href="/" class="block px-4 py-2.5 text-sm font-medium rounded-lg" style="color: #FF8C00; background: #fff7ed;">Home</a>
                <a href="#features" class="block px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 rounded-lg transition-colors">Features</a>
                <a href="#projects" class="block px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 rounded-lg transition-colors">Projects</a>
                <a href="/products" class="block px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 rounded-lg transition-colors">Products</a>
                <a href="/gallery" class="block px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 rounded-lg transition-colors">Gallery</a>
                <a href="#partnerships" class="block px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 rounded-lg transition-colors">Partners</a>
                <a href="#contact" class="block px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 rounded-lg transition-colors">Contact</a>
                <div class="pt-2 border-t border-gray-100 flex items-center space-x-3 px-1">
                    <a href="{{ route('login') }}" class="flex-1 text-center py-2.5 text-sm font-medium text-gray-700 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">Login</a>
                    <a href="{{ route('register') }}" class="flex-1 text-center py-2.5 text-sm font-semibold text-white rounded-lg transition-colors" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">Sign up</a>
                </div>
            </div>
        </div>
    </nav>
</header>

<script>
    (function () {
        const toggle = document.getElementById('mobileMenuToggle');
        const menu = document.getElementById('mobile-menu');
        const openIcon = document.getElementById('menu-open-icon');
        const closeIcon = document.getElementById('menu-close-icon');

        toggle && toggle.addEventListener('click', function () {
            menu.classList.toggle('hidden');
            openIcon.classList.toggle('hidden');
            closeIcon.classList.toggle('hidden');
        });

        // Close mobile menu on nav link click
        menu && menu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                menu.classList.add('hidden');
                openIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
            });
        });

        // Scroll effect — add shadow when scrolled
        const header = document.getElementById('main-header');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 10) {
                header.classList.add('shadow-md');
                header.classList.remove('shadow-sm');
            } else {
                header.classList.remove('shadow-md');
                header.classList.add('shadow-sm');
            }
        }, { passive: true });
    })();
</script>
