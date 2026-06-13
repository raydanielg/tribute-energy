<section id="csr" class="py-20 bg-gray-50">
    <div class="max-w-screen-xl mx-auto px-4 lg:px-8">
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-1.5 text-xs font-bold tracking-wider uppercase rounded-full mb-4" style="background: #fff7ed; color: #FF8C00; border: 1px solid #ffedd5;">Giving Back</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4">Corporate Social Responsibility</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Tribute Energy is deeply committed to giving back to the communities we serve.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="csr-card bg-white p-8 rounded-2xl border border-gray-100 hover:border-orange-200 transition-all duration-300 hover:shadow-xl">
                <div class="w-14 h-14 rounded-xl mb-6 flex items-center justify-center" style="background: linear-gradient(135deg, #fff7ed, #ffedd5);">
                    <svg class="w-7 h-7" style="color: #FF8C00;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M12 14l9-5-9-5-9 5 9 5z"/>
                        <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Education & Training</h3>
                <p class="text-gray-600">Providing renewable energy education and training programs to empower local communities with knowledge and skills.</p>
            </div>

            <div class="csr-card bg-white p-8 rounded-2xl border border-gray-100 hover:border-orange-200 transition-all duration-300 hover:shadow-xl">
                <div class="w-14 h-14 rounded-xl mb-6 flex items-center justify-center" style="background: linear-gradient(135deg, #fff7ed, #ffedd5);">
                    <svg class="w-7 h-7" style="color: #FF8C00;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Community Development</h3>
                <p class="text-gray-600">Partnering with NGOs to develop and implement projects that improve local infrastructure and access to resources.</p>
            </div>

            <div class="csr-card bg-white p-8 rounded-2xl border border-gray-100 hover:border-orange-200 transition-all duration-300 hover:shadow-xl">
                <div class="w-14 h-14 rounded-xl mb-6 flex items-center justify-center" style="background: linear-gradient(135deg, #fff7ed, #ffedd5);">
                    <svg class="w-7 h-7" style="color: #FF8C00;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Environmental Conservation</h3>
                <p class="text-gray-600">Engaging in activities that promote reforestation, water conservation, and biodiversity protection for sustainable futures.</p>
            </div>
        </div>
    </div>
</section>

<style>
    .csr-card {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 0.6s ease, transform 0.6s ease;
    }
    .csr-card.visible {
        opacity: 1;
        transform: translateY(0);
    }
</style>

<script>
(function () {
    const cards = document.querySelectorAll('.csr-card');
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
