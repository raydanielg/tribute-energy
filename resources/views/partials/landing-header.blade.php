<div id="topbar" class="fixed top-0 left-0 right-0 z-[60] transition-all duration-500" style="background: linear-gradient(135deg, #0a0a0a, #1a1a1a); border-bottom: 1px solid rgba(255,107,0,0.1);">
    <div class="max-w-screen-xl mx-auto px-4 lg:px-8 flex items-center justify-between h-[36px]">
        <div class="flex items-center gap-4 text-xs">
            <a href="mailto:info@tributenergy.com" class="flex items-center gap-1.5 text-gray-400 hover:text-[#FF6B00] transition-colors">
                <i class="fas fa-envelope text-[10px]"></i>
                <span class="hidden sm:inline">info@tributenergy.com</span>
            </a>
            <span class="text-gray-700 hidden sm:block">|</span>
            <a href="mailto:tributenergy@gmail.com" class="flex items-center gap-1.5 text-gray-400 hover:text-[#FF6B00] transition-colors">
                <i class="fas fa-envelope text-[10px]"></i>
                <span class="hidden sm:inline">tributenergy@gmail.com</span>
            </a>
        </div>
        <div class="flex items-center gap-4 text-xs">
            <a href="tel:+255787822735" class="flex items-center gap-1.5 text-gray-400 hover:text-[#FF6B00] transition-colors">
                <i class="fas fa-phone text-[10px]"></i>
                <span class="hidden sm:inline">+255 787 822 735</span>
            </a>
            <span class="text-gray-700 hidden sm:block">|</span>
            <a href="https://wa.me/255787822735" target="_blank" class="flex items-center gap-1.5 text-gray-400 hover:text-[#25D366] transition-colors">
                <i class="fab fa-whatsapp text-[11px]"></i>
                <span class="hidden sm:inline">WhatsApp</span>
            </a>
        </div>
    </div>
</div>

<header id="main-header" class="fixed left-0 right-0 z-50 transition-all duration-500 bg-white/95 backdrop-blur-md border-b border-gray-100 shadow-sm"
        style="top: 36px;">
    @if(session('success'))
        <div class="bg-green-500 text-white px-4 py-2 text-center text-sm font-semibold">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="bg-red-500 text-white px-4 py-2 text-center text-sm font-semibold">{{ session('error') }}</div>
    @endif
    @if(session('info'))
        <div class="bg-blue-500 text-white px-4 py-2 text-center text-sm font-semibold">{{ session('info') }}</div>
    @endif
    <nav class="max-w-screen-xl mx-auto px-4 lg:px-8">
        <div class="flex items-center justify-between h-16 lg:h-[68px]">

            <a href="{{ route('home') }}" class="flex items-center flex-shrink-0">
                <img src="{{ asset('logo.png') }}" alt="Tribute Energy Logo" class="h-12 w-auto object-contain">
            </a>

            <div class="hidden md:flex items-center space-x-1">
                <a href="{{ route('home') }}" class="nav-link px-4 py-2 {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                <a href="{{ route('features') }}" class="nav-link px-4 py-2 {{ request()->routeIs('features') ? 'active' : '' }}">Features</a>
                <a href="{{ route('products') }}" class="nav-link px-4 py-2 {{ request()->routeIs('products') ? 'active' : '' }}">Products</a>
                <a href="{{ route('projects') }}" class="nav-link px-4 py-2 {{ request()->routeIs('projects') ? 'active' : '' }}">Projects</a>
                <a href="{{ route('gallery') }}" class="nav-link px-4 py-2 {{ request()->routeIs('gallery') ? 'active' : '' }}">Gallery</a>
                <a href="{{ route('partners') }}" class="nav-link px-4 py-2 {{ request()->routeIs('partners') ? 'active' : '' }}">Partners</a>
                <a href="{{ route('contact') }}" class="nav-link px-4 py-2 {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
            </div>

            <div class="flex items-center space-x-0.5">
                <button class="hidden lg:flex p-2 text-gray-500 hover:text-[#FF6B00] rounded-lg hover:bg-orange-50 transition-colors" onclick="document.getElementById('search-input').focus()">
                    <i class="fas fa-search text-lg"></i>
                </button>

                <button x-on:click="open = !open" class="relative p-2 text-gray-500 hover:text-[#FF6B00] rounded-lg hover:bg-orange-50 transition-colors">
                    <i class="fas fa-shopping-bag text-lg"></i>
                    <span x-show="count > 0" class="absolute -top-0.5 -right-0.5 w-5 h-5 bg-[#FF6B00] text-white text-[10px] font-bold rounded-full flex items-center justify-center" x-text="count"></span>
                </button>

                <a href="https://wa.me/255787822735" target="_blank" class="p-2 text-gray-500 hover:text-[#25D366] rounded-lg hover:bg-green-50 transition-colors">
                    <i class="fab fa-whatsapp text-lg"></i>
                </a>

                @auth
                    <a href="{{ route('user.dashboard') }}" class="p-2 text-gray-500 hover:text-[#FF6B00] rounded-lg hover:bg-orange-50 transition-colors">
                        <i class="fas fa-user text-lg"></i>
                    </a>
                @else
                    <a href="{{ route('login') }}" class="p-2 text-gray-500 hover:text-[#FF6B00] rounded-lg hover:bg-orange-50 transition-colors">
                        <i class="fas fa-user text-lg"></i>
                    </a>
                @endauth

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

        <div class="md:hidden hidden pb-4 border-t border-gray-100 mt-1" id="mobile-menu">
            <div class="pt-3 space-y-1">
                <a href="{{ route('home') }}" class="nav-link block px-4 py-2.5 {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                <a href="{{ route('features') }}" class="nav-link block px-4 py-2.5 {{ request()->routeIs('features') ? 'active' : '' }}">Features</a>
                <a href="{{ route('products') }}" class="nav-link block px-4 py-2.5 {{ request()->routeIs('products') ? 'active' : '' }}"><span class="flex items-center gap-2">Products <span class="text-[10px] font-rajdhani font-700 text-[#FF6B00] tracking-widest">LIVE</span></span></a>
                <a href="{{ route('projects') }}" class="nav-link block px-4 py-2.5 {{ request()->routeIs('projects') ? 'active' : '' }}">Projects</a>
                <a href="{{ route('gallery') }}" class="nav-link block px-4 py-2.5 {{ request()->routeIs('gallery') ? 'active' : '' }}">Gallery</a>
                <a href="{{ route('partners') }}" class="nav-link block px-4 py-2.5 {{ request()->routeIs('partners') ? 'active' : '' }}">Partners</a>
                <a href="{{ route('contact') }}" class="nav-link block px-4 py-2.5 {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
                @auth
                    <div class="pt-2 border-t border-gray-100 space-y-1">
                        <a href="{{ route('user.dashboard') }}" class="block px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 rounded-lg transition-colors">Dashboard</a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2.5 text-sm font-medium text-red-600 hover:bg-red-50 rounded-lg transition-colors">Logout</button>
                        </form>
                    </div>
                @else
                    <div class="pt-2 border-t border-gray-100">
                        <a href="https://wa.me/255787822735" target="_blank" class="flex items-center justify-center gap-1.5 py-2.5 text-sm font-semibold text-white rounded-lg" style="background: linear-gradient(135deg, #25D366, #128C7E);">
                            <i class="fab fa-whatsapp"></i>
                            WhatsApp Us
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </nav>
</header>

<script>
(function(){
    var toggle = document.getElementById('mobileMenuToggle');
    var menu = document.getElementById('mobile-menu');
    var openIcon = document.getElementById('menu-open-icon');
    var closeIcon = document.getElementById('menu-close-icon');
    toggle && toggle.addEventListener('click', function() {
        menu.classList.toggle('hidden');
        openIcon.classList.toggle('hidden');
        closeIcon.classList.toggle('hidden');
    });
    menu && menu.querySelectorAll('a').forEach(function(link) {
        link.addEventListener('click', function() {
            menu.classList.add('hidden');
            openIcon.classList.remove('hidden');
            closeIcon.classList.add('hidden');
        });
    });
    var header = document.getElementById('main-header');
    var topbar = document.getElementById('topbar');
    window.addEventListener('scroll', function() {
        if (window.scrollY > 20) {
            header.classList.add('shadow-md');
            header.classList.remove('shadow-sm');
            header.style.top = '0px';
            if (topbar) topbar.style.transform = 'translateY(-100%)';
        } else {
            header.classList.remove('shadow-md');
            header.classList.add('shadow-sm');
            header.style.top = '36px';
            if (topbar) topbar.style.transform = 'translateY(0)';
        }
    }, { passive: true });
})();
</script>
