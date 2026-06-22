<footer class="bg-gray-900 text-gray-300">

    {{-- Newsletter --}}
    <div class="border-b border-white/10">
        <div class="max-w-screen-xl mx-auto px-4 lg:px-8 py-12">
            <div class="flex flex-col lg:flex-row items-center justify-between gap-6">
                <div class="text-center lg:text-left">
                    <h3 class="text-2xl font-extrabold text-white">Stay Updated</h3>
                    <p class="text-gray-400 text-sm mt-1">Get news on our latest projects and renewable energy insights.</p>
                </div>
                <form id="newsletter-form" class="flex w-full max-w-md gap-3">
                    @csrf
                    <input type="email" name="email" required placeholder="Your email address"
                           class="flex-1 bg-white/5 border border-white/10 rounded-lg px-4 py-3 text-sm text-white placeholder-gray-500 focus:outline-none focus:border-orange-400 transition-colors">
                    <button type="submit"
                            class="flex-shrink-0 px-6 py-3 text-sm font-semibold text-white rounded-lg transition-all duration-200 hover:-translate-y-0.5 hover:shadow-lg"
                            style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">
                        Subscribe
                    </button>
                </form>
            </div>
            <p id="newsletter-message" class="text-center lg:text-left text-sm mt-3 hidden"></p>
        </div>
    </div>

    {{-- Main --}}
    <div class="max-w-screen-xl mx-auto px-4 lg:px-8 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10">

            <div>
                <a href="{{ route('home') }}" class="inline-flex items-center mb-4">
                    <img src="{{ asset('logo.png') }}" alt="Tribute Energy" class="h-12 w-auto object-contain brightness-0 invert">
                </a>
            </div>
             <div class="lg:col-span-2">
                <p class="text-gray-400 text-sm leading-relaxed max-w-sm mb-6">
                    Tribute Energy delivers solar water pumping, hybrid power systems and water supply solutions
                    for homes, businesses and communities across Tanzania. Clean energy. Reliable water. Real impact.
                </p>
            </div>
             <div>
                <div class="flex items-center gap-3 mt-6">
                    <a href="https://www.instagram.com/tributenergy__?igsh=Y3lvYWY2NjN2a2Jx&utm_source=qr" target="_blank" class="w-9 h-9 rounded-full bg-white/5 hover:bg-orange-500 hover:text-white flex items-center justify-center transition-colors"><i class="fab fa-instagram"></i></a>
                    <a href="https://wa.me/255787822735" target="_blank" class="w-9 h-9 rounded-full bg-white/5 hover:bg-green-500 hover:text-white flex items-center justify-center transition-colors"><i class="fab fa-whatsapp"></i></a>
                    <a href="#" class="w-9 h-9 rounded-full bg-white/5 hover:bg-blue-500 hover:text-white flex items-center justify-center transition-colors"><i class="fab fa-envelope"></i></a>
                   <!-- 
                    <a href="#" class="w-9 h-9 rounded-full bg-white/5 hover:bg-blue-500 hover:text-white flex items-center justify-center transition-colors"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="w-9 h-9 rounded-full bg-white/5 hover:bg-blue-400 hover:text-white flex items-center justify-center transition-colors"><i class="fab fa-x-twitter"></i></a>
                    <a href="#" class="w-9 h-9 rounded-full bg-white/5 hover:bg-blue-600 hover:text-white flex items-center justify-center transition-colors"><i class="fab fa-linkedin-in"></i></a> 
                    -->
                </div>
            </div>
            <!--
            <div>
                <h4 class="text-sm font-bold tracking-wider uppercase text-white mb-5">Company</h4>
                <ul class="space-y-3 text-sm">
                    <li><a href="{{ route('about') }}" class="text-gray-400 hover:text-white transition-colors">About Us</a></li>
                    <li><a href="{{ route('careers') }}" class="text-gray-400 hover:text-white transition-colors">Careers</a></li>
                    <li><a href="{{ route('blog') }}" class="text-gray-400 hover:text-white transition-colors">Blog</a></li>
                    <li><a href="{{ route('contact') }}" class="text-gray-400 hover:text-white transition-colors">Contact Us</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-sm font-bold tracking-wider uppercase text-white mb-5">Solutions</h4>
                <ul class="space-y-3 text-sm">
                    <li><a href="{{ route('features') }}" class="text-gray-400 hover:text-white transition-colors">Features</a></li>
                    <li><a href="{{ route('products') }}" class="text-gray-400 hover:text-white transition-colors">Products</a></li>
                    <li><a href="{{ route('pricing') }}" class="text-gray-400 hover:text-white transition-colors">Get a Quote</a></li>
                    <li><a href="{{ route('gallery') }}" class="text-gray-400 hover:text-white transition-colors">Gallery</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-sm font-bold tracking-wider uppercase text-white mb-5">Our Work</h4>
                <ul class="space-y-3 text-sm">
                    <li><a href="{{ route('projects') }}" class="text-gray-400 hover:text-white transition-colors">Projects</a></li>
                    <li><a href="{{ route('partners') }}" class="text-gray-400 hover:text-white transition-colors">Partners</a></li>
                    <li><a href="{{ route('terms') }}" class="text-gray-400 hover:text-white transition-colors">Terms of Service</a></li>
                    <li><a href="{{ route('privacy') }}" class="text-gray-400 hover:text-white transition-colors">Privacy Policy</a></li>
                </ul>
            </div> -->
        </div>
    </div>

    <div class="border-t border-white/10">
        <div class="max-w-screen-xl mx-auto px-4 lg:px-8 py-6 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="text-gray-500 text-xs">&copy; {{ date('Y') }} {{ config('app.name', 'Tribute Energy') }}. All rights reserved.</p>
            <div class="flex gap-5 text-xs text-gray-500">
                <a href="{{ route('privacy') }}" class="hover:text-white transition-colors">Privacy</a>
                <a href="{{ route('terms') }}" class="hover:text-white transition-colors">Terms</a>
                <a href="{{ route('cookie.policy') }}" class="hover:text-white transition-colors">Cookie Policy</a>
                <a href="{{ route('gdpr') }}" class="hover:text-white transition-colors">GDPR</a>
            </div>
        </div>
    </div>
</footer>

<script>
document.getElementById('newsletter-form')?.addEventListener('submit', function(e) {
    e.preventDefault();
    var btn = this.querySelector('button[type="submit"]');
    var msg = document.getElementById('newsletter-message');
    btn.disabled = true;
    btn.textContent = 'Subscribing...';
    fetch('{{ route("newsletter.subscribe") }}', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value },
        body: JSON.stringify({ email: this.querySelector('input[name="email"]').value })
    })
    .then(function(r) { return r.json(); })
    .then(function(d) {
        msg.classList.remove('hidden', 'text-green-400', 'text-red-400');
        msg.classList.add(d.success ? 'text-green-400' : 'text-red-400');
        msg.textContent = d.message || (d.success ? 'Subscribed!' : 'Error occurred.');
        btn.disabled = false;
        btn.textContent = 'Subscribe';
        if (d.success) { document.getElementById('newsletter-form').querySelector('input').value = ''; }
    })
    .catch(function() {
        msg.classList.remove('hidden');
        msg.classList.add('text-red-400');
        msg.textContent = 'Network error. Please try again.';
        btn.disabled = false;
        btn.textContent = 'Subscribe';
    });
});
</script>
