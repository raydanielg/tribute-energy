<section id="contact" class="py-20" style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);">
    <div class="max-w-screen-xl mx-auto px-4 lg:px-8">
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-1.5 text-xs font-bold tracking-wider uppercase rounded-full mb-4" style="background: rgba(255, 140, 0, 0.2); color: #FF8C00; border: 1px solid rgba(255, 140, 0, 0.3);">Get In Touch</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-4">Contact Us</h2>
            <p class="text-lg text-gray-300 max-w-2xl mx-auto">Ready to transform your energy management? Let's talk.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="contact-card p-8 rounded-2xl border border-gray-700 bg-white/5 backdrop-blur-sm text-center">
                <div class="w-14 h-14 rounded-full mx-auto mb-4 flex items-center justify-center" style="background: linear-gradient(135deg, #FF8C00, #FF6B00);">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">Location</h3>
                <p class="text-gray-300">Dar es Salaam, Tanzania</p>
            </div>

            <div class="contact-card p-8 rounded-2xl border border-gray-700 bg-white/5 backdrop-blur-sm text-center">
                <div class="w-14 h-14 rounded-full mx-auto mb-4 flex items-center justify-center" style="background: linear-gradient(135deg, #FF8C00, #FF6B00);">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">Phone</h3>
                <p class="text-gray-300">+255 713 808 848</p>
            </div>

            <div class="contact-card p-8 rounded-2xl border border-gray-700 bg-white/5 backdrop-blur-sm text-center">
                <div class="w-14 h-14 rounded-full mx-auto mb-4 flex items-center justify-center" style="background: linear-gradient(135deg, #FF8C00, #FF6B00);">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">Email</h3>
                <p class="text-gray-300">info@tributenergy.com </p>
            </div>
        </div>
    </div>
</section>

<style>
    .contact-card {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 0.6s ease, transform 0.6s ease;
    }
    .contact-card.visible {
        opacity: 1;
        transform: translateY(0);
    }
</style>

<script>
(function () {
    const cards = document.querySelectorAll('.contact-card');
    if (!cards.length) return;
    const io = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                const card = entry.target;
                const idx = Array.from(cards).indexOf(card);
                setTimeout(() => card.classList.add('visible'), idx * 150);
                io.unobserve(card);
            }
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });
    cards.forEach(card => io.observe(card));
})();
</script>
