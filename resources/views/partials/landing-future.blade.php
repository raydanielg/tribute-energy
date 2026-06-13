<section id="future" class="py-20 bg-white">
    <div class="max-w-screen-xl mx-auto px-4 lg:px-8">
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-1.5 text-xs font-bold tracking-wider uppercase rounded-full mb-4" style="background: #fff7ed; color: #FF8C00; border: 1px solid #ffedd5;">Looking Ahead</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4">Future Growth Strategies</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Positioned for continued growth through innovation and expansion.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="future-card p-6 rounded-2xl border border-gray-100 hover:border-orange-200 transition-all duration-300 hover:shadow-xl hover:-translate-y-2 text-center">
                <div class="w-12 h-12 rounded-full mx-auto mb-4 flex items-center justify-center" style="background: linear-gradient(135deg, #fff7ed, #ffedd5);">
                    <svg class="w-6 h-6" style="color: #FF8C00;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Product Expansion</h3>
                <p class="text-gray-600 text-sm">Introducing energy storage solutions and smart grid technologies to complement existing offerings.</p>
            </div>

            <div class="future-card p-6 rounded-2xl border border-gray-100 hover:border-orange-200 transition-all duration-300 hover:shadow-xl hover:-translate-y-2 text-center">
                <div class="w-12 h-12 rounded-full mx-auto mb-4 flex items-center justify-center" style="background: linear-gradient(135deg, #fff7ed, #ffedd5);">
                    <svg class="w-6 h-6" style="color: #FF8C00;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Geographic Expansion</h3>
                <p class="text-gray-600 text-sm">Entering new markets, particularly in countries with high demand for renewable energy solutions.</p>
            </div>

            <div class="future-card p-6 rounded-2xl border border-gray-100 hover:border-orange-200 transition-all duration-300 hover:shadow-xl hover:-translate-y-2 text-center">
                <div class="w-12 h-12 rounded-full mx-auto mb-4 flex items-center justify-center" style="background: linear-gradient(135deg, #fff7ed, #ffedd5);">
                    <svg class="w-6 h-6" style="color: #FF8C00;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Research & Development</h3>
                <p class="text-gray-600 text-sm">Investing in R&D to stay at the forefront of technological advancements in energy solutions.</p>
            </div>

            <div class="future-card p-6 rounded-2xl border border-gray-100 hover:border-orange-200 transition-all duration-300 hover:shadow-xl hover:-translate-y-2 text-center">
                <div class="w-12 h-12 rounded-full mx-auto mb-4 flex items-center justify-center" style="background: linear-gradient(135deg, #fff7ed, #ffedd5);">
                    <svg class="w-6 h-6" style="color: #FF8C00;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Strategic Partnerships</h3>
                <p class="text-gray-600 text-sm">Pursuing acquisitions and collaborations to enhance capabilities and broaden market reach.</p>
            </div>
        </div>
    </div>
</section>

<style>
    .future-card {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.6s ease, transform 0.6s ease;
    }
    .future-card.visible {
        opacity: 1;
        transform: translateY(0);
    }
</style>

<script>
(function () {
    const cards = document.querySelectorAll('.future-card');
    if (!cards.length) return;
    const io = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                const card = entry.target;
                const idx = Array.from(cards).indexOf(card);
                setTimeout(() => card.classList.add('visible'), idx * 100);
                io.unobserve(card);
            }
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });
    cards.forEach(card => io.observe(card));
})();
</script>
