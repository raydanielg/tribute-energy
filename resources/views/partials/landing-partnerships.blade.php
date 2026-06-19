<section id="partnerships" class="py-20 bg-white">
    <div class="max-w-screen-xl mx-auto px-4 lg:px-8">
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-1.5 text-xs font-bold tracking-wider uppercase rounded-full mb-4" style="background: #fff7ed; color: #FF8C00; border: 1px solid #ffedd5;">Partnerships</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4">Key Partnerships</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Collaborating with leading organizations to drive sustainable development.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
            $partners = [
                ['logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/91/World_Vision_logo.svg/512px-World_Vision_logo.svg.png', 'name' => 'World Vision', 'desc' => 'Partnered on multiple solar water pumping projects including Karatu (2017), Kigoma (2018), and Hedaru (2016).'],
                ['logo' => null, 'name' => 'RUWASA', 'desc' => 'Rural Water and Sanitation Authority - Long-term partner for rural water supply projects across Tanzania.'],
                ['logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1e/Coat_of_arms_of_Tanzania.svg/512px-Coat_of_arms_of_Tanzania.svg.png', 'name' => 'Government of Tanzania', 'desc' => 'Strategic partner for national water infrastructure and renewable energy initiatives.'],
            ];
            @endphp
            @foreach($partners as $p)
            <div class="partnership-card p-6 rounded-2xl border border-gray-100 hover:border-orange-200 transition-all duration-300 hover:shadow-lg text-center bg-white">
                <div class="w-20 h-20 rounded-2xl mx-auto mb-5 flex items-center justify-center bg-gray-50 border border-gray-100 overflow-hidden">
                    @if($p['logo'])
                        <img src="{{ $p['logo'] }}" alt="{{ $p['name'] }} logo" class="w-full h-full object-contain p-2">
                    @else
                        <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-[#0f4c81] to-[#0a3a63] text-white">
                            <span class="text-[9px] font-bold tracking-wider uppercase leading-tight text-center">Rural Water<br>& Sanitation</span>
                            <span class="text-[7px] font-bold tracking-[0.15em] mt-0.5 opacity-80">AUTHORITY</span>
                        </div>
                    @endif
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $p['name'] }}</h3>
                <p class="text-gray-600 text-sm">{{ $p['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<style>
    .partnership-card {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.6s ease, transform 0.6s ease;
    }
    .partnership-card.visible {
        opacity: 1;
        transform: translateY(0);
    }
</style>

<script>
(function () {
    const cards = document.querySelectorAll('.partnership-card');
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
