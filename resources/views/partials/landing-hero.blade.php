<section class="relative min-h-screen flex flex-col justify-center overflow-hidden hero-section" style="padding-top: 68px;">

    {{-- Animated wave/grid background --}}
    <div class="absolute inset-0 hero-bg">
        {{-- Deep gradient base --}}
        <div class="absolute inset-0" style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 30%, #0f3460 55%, #1a5f7a 75%, #FF8C00 100%);"></div>

        {{-- Animated grid lines --}}
        <div class="absolute inset-0 hero-grid"></div>

        {{-- Glowing orbs --}}
        <div class="absolute top-1/4 left-1/4 w-96 h-96 rounded-full orb-1" style="background: radial-gradient(circle, rgba(255, 140, 0, 0.25) 0%, transparent 70%);"></div>
        <div class="absolute bottom-1/3 right-1/4 w-80 h-80 rounded-full orb-2" style="background: radial-gradient(circle, rgba(255, 107, 0, 0.2) 0%, transparent 70%);"></div>
        <div class="absolute top-1/2 right-1/3 w-64 h-64 rounded-full orb-3" style="background: radial-gradient(circle, rgba(255, 179, 71, 0.15) 0%, transparent 70%);"></div>

        {{-- Animated flowing lines SVG --}}
        <svg class="absolute inset-0 w-full h-full" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice">
            <defs>
                <linearGradient id="lineGrad1" x1="0%" y1="0%" x2="100%" y2="0%">
                    <stop offset="0%" style="stop-color:rgba(255, 140, 0, 0);"/>
                    <stop offset="50%" style="stop-color:rgba(255, 140, 0, 0.5);"/>
                    <stop offset="100%" style="stop-color:rgba(255, 140, 0, 0);"/>
                </linearGradient>
                <linearGradient id="lineGrad2" x1="0%" y1="0%" x2="100%" y2="0%">
                    <stop offset="0%" style="stop-color:rgba(255, 179, 71, 0);"/>
                    <stop offset="50%" style="stop-color:rgba(255, 179, 71, 0.35);"/>
                    <stop offset="100%" style="stop-color:rgba(255, 179, 71, 0);"/>
                </linearGradient>
                <linearGradient id="lineGrad3" x1="0%" y1="0%" x2="100%" y2="0%">
                    <stop offset="0%" style="stop-color:rgba(255, 107, 0, 0);"/>
                    <stop offset="50%" style="stop-color:rgba(255, 107, 0, 0.3);"/>
                    <stop offset="100%" style="stop-color:rgba(255, 107, 0, 0);"/>
                </linearGradient>
            </defs>

            {{-- Horizontal flowing lines --}}
            <line class="flow-line-h" x1="-100%" y1="25%" x2="200%" y2="25%" stroke="url(#lineGrad1)" stroke-width="1"/>
            <line class="flow-line-h delay-1" x1="-100%" y1="40%" x2="200%" y2="40%" stroke="url(#lineGrad2)" stroke-width="0.5"/>
            <line class="flow-line-h delay-2" x1="-100%" y1="60%" x2="200%" y2="60%" stroke="url(#lineGrad1)" stroke-width="1"/>
            <line class="flow-line-h delay-3" x1="-100%" y1="75%" x2="200%" y2="75%" stroke="url(#lineGrad3)" stroke-width="0.5"/>
            <line class="flow-line-h delay-4" x1="-100%" y1="15%" x2="200%" y2="15%" stroke="url(#lineGrad2)" stroke-width="0.7"/>
            <line class="flow-line-h delay-5" x1="-100%" y1="85%" x2="200%" y2="85%" stroke="url(#lineGrad1)" stroke-width="0.6"/>

            {{-- Diagonal flowing lines --}}
            <line class="flow-line-d" x1="-20%" y1="0%" x2="120%" y2="100%" stroke="url(#lineGrad1)" stroke-width="0.6"/>
            <line class="flow-line-d delay-2" x1="0%" y1="0%" x2="140%" y2="100%" stroke="url(#lineGrad2)" stroke-width="0.4"/>
            <line class="flow-line-d delay-4" x1="-40%" y1="0%" x2="100%" y2="100%" stroke="url(#lineGrad3)" stroke-width="0.5"/>
            <line class="flow-line-d delay-1" x1="20%" y1="0%" x2="160%" y2="100%" stroke="url(#lineGrad1)" stroke-width="0.3"/>

            {{-- Wave paths --}}
            <path class="wave-path" d="M-100,200 Q100,120 300,200 T700,200 T1100,200 T1500,200 T1900,200 T2300,200" fill="none" stroke="rgba(255, 140, 0, 0.2)" stroke-width="1.5"/>
            <path class="wave-path delay-2" d="M-100,350 Q150,270 350,350 T750,350 T1150,350 T1550,350 T1950,350" fill="none" stroke="rgba(255, 179, 71, 0.15)" stroke-width="1"/>
            <path class="wave-path delay-4" d="M-100,500 Q200,420 400,500 T800,500 T1200,500 T1600,500" fill="none" stroke="rgba(255, 107, 0, 0.12)" stroke-width="1"/>
        </svg>

        {{-- Dot pattern overlay --}}
        <div class="absolute inset-0 hero-dots"></div>

        {{-- Bottom wave --}}
        <div class="absolute bottom-0 left-0 right-0">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" preserveAspectRatio="none" class="w-full">
                <path fill="white" fill-opacity="1" d="M0,64L48,69.3C96,75,192,85,288,80C384,75,480,53,576,48C672,43,768,53,864,64C960,75,1056,85,1152,80C1248,75,1344,53,1392,42.7L1440,32L1440,120L1392,120C1344,120,1248,120,1152,120C1056,120,960,120,864,120C768,120,672,120,576,120C480,120,384,120,288,120C192,120,96,120,48,120L0,120Z"></path>
            </svg>
        </div>
    </div>

    {{-- Hero Content --}}
    <div class="relative z-10 py-20 px-4 mx-auto max-w-screen-xl text-center lg:py-28 lg:px-12">

        {{-- Badge --}}
        <a href="#features" class="hero-badge inline-flex justify-between items-center py-1.5 px-2 pr-5 mb-8 text-sm text-orange-100 rounded-full border border-orange-400/30 hover:border-orange-400/60 transition-all duration-300" style="background: rgba(255,255,255,0.08); backdrop-filter: blur(10px);">
            <span class="text-xs font-semibold rounded-full text-white px-3 py-1 mr-3" style="background: #FF8C00;">New</span>
            <span class="font-medium">Tribute Energy Platform is live — See what's new</span>
            <svg class="ml-2 w-4 h-4 text-orange-300" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
            </svg>
        </a>

        {{-- Main Headline --}}
        <h1 class="hero-title mb-6 text-4xl font-extrabold tracking-tight leading-tight text-white md:text-5xl lg:text-6xl xl:text-7xl">
            Transform Your Energy<br>
            <span class="hero-gradient-text">with Tribute Energy</span>
        </h1>

        {{-- Subheadline --}}
        <p class="hero-subtitle mb-10 text-lg font-normal text-orange-100/80 lg:text-xl max-w-2xl mx-auto leading-relaxed">
            The complete energy management solution for modern businesses. Streamline operations, boost efficiency, and delight customers — all in one powerful platform.
        </p>

        {{-- CTA Buttons --}}
        <div class="hero-cta flex flex-col sm:flex-row items-center justify-center gap-4 mb-16">
            <a href="{{ route('register') }}" class="group w-full sm:w-auto inline-flex justify-center items-center py-3.5 px-8 text-base font-semibold text-white rounded-xl shadow-lg hover:shadow-xl hover:-translate-y-0.5 transition-all duration-200" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">
                Get Started Free
                <svg class="ml-2 w-5 h-5 group-hover:translate-x-0.5 transition-transform" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                </svg>
            </a>
            <a href="#features" class="group w-full sm:w-auto inline-flex justify-center items-center py-3.5 px-8 text-base font-semibold text-white rounded-xl border border-white/20 hover:border-white/40 hover:-translate-y-0.5 transition-all duration-200" style="background: rgba(255,255,255,0.08); backdrop-filter: blur(10px);">
                <svg class="mr-2 w-5 h-5 text-orange-300" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"/>
                </svg>
                See How It Works
            </a>
        </div>

        {{-- Stats bar --}}
        <div class="hero-stats inline-flex flex-wrap justify-center gap-8 md:gap-12 py-6 px-8 rounded-2xl border border-white/10" style="background: rgba(255,255,255,0.05); backdrop-filter: blur(10px);">
            <div class="text-center">
                <div class="text-2xl font-bold text-white">5,000+</div>
                <div class="text-xs text-orange-200/70 mt-0.5 font-medium uppercase tracking-wide">Active Businesses</div>
            </div>
            <div class="hidden sm:block w-px bg-white/10 self-stretch"></div>
            <div class="text-center">
                <div class="text-2xl font-bold text-white">99.9%</div>
                <div class="text-xs text-orange-200/70 mt-0.5 font-medium uppercase tracking-wide">Uptime SLA</div>
            </div>
            <div class="hidden sm:block w-px bg-white/10 self-stretch"></div>
            <div class="text-center">
                <div class="text-2xl font-bold text-white">2M+</div>
                <div class="text-xs text-orange-200/70 mt-0.5 font-medium uppercase tracking-wide">Transactions/Month</div>
            </div>
            <div class="hidden sm:block w-px bg-white/10 self-stretch"></div>
            <div class="text-center">
                <div class="text-2xl font-bold text-white">4.9 ★</div>
                <div class="text-xs text-orange-200/70 mt-0.5 font-medium uppercase tracking-wide">Customer Rating</div>
            </div>
        </div>
    </div>

    {{-- Scroll indicator --}}
    <div class="absolute bottom-28 left-1/2 -translate-x-1/2 z-10 scroll-indicator">
        <div class="flex flex-col items-center gap-1.5 text-orange-200/50">
            <span class="text-xs font-medium tracking-widest uppercase">Scroll</span>
            <div class="w-5 h-8 rounded-full border border-orange-200/30 flex items-start justify-center p-1">
                <div class="w-1 h-2 bg-orange-200/50 rounded-full scroll-dot"></div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Grid lines */
    .hero-grid {
        background-image:
            linear-gradient(rgba(255, 140, 0, 0.07) 1px, transparent 1px),
            linear-gradient(90deg, rgba(255, 140, 0, 0.07) 1px, transparent 1px);
        background-size: 60px 60px;
        animation: gridMove 20s linear infinite;
    }

    @keyframes gridMove {
        0% { background-position: 0 0; }
        100% { background-position: 60px 60px; }
    }

    /* Dot pattern */
    .hero-dots {
        background-image: radial-gradient(rgba(255, 179, 71, 0.15) 1px, transparent 1px);
        background-size: 30px 30px;
        animation: dotsMove 15s linear infinite;
    }

    @keyframes dotsMove {
        0% { background-position: 0 0; }
        100% { background-position: 30px 30px; }
    }

    /* Orb animations */
    .orb-1 { animation: orbFloat 8s ease-in-out infinite; }
    .orb-2 { animation: orbFloat 10s ease-in-out infinite reverse; }
    .orb-3 { animation: orbFloat 12s ease-in-out infinite 2s; }

    @keyframes orbFloat {
        0%, 100% { transform: translate(0, 0) scale(1); }
        33% { transform: translate(20px, -20px) scale(1.05); }
        66% { transform: translate(-15px, 15px) scale(0.95); }
    }

    /* Flowing horizontal lines */
    .flow-line-h {
        animation: flowRight 6s linear infinite;
    }
    .flow-line-h.delay-1 { animation-delay: -1s; }
    .flow-line-h.delay-2 { animation-delay: -2s; }
    .flow-line-h.delay-3 { animation-delay: -3s; }
    .flow-line-h.delay-4 { animation-delay: -4s; }
    .flow-line-h.delay-5 { animation-delay: -5s; }

    @keyframes flowRight {
        0% { transform: translateX(-50%); opacity: 0; }
        10% { opacity: 1; }
        90% { opacity: 1; }
        100% { transform: translateX(50%); opacity: 0; }
    }

    /* Diagonal lines */
    .flow-line-d {
        animation: flowDiag 9s linear infinite;
    }
    .flow-line-d.delay-1 { animation-delay: -2.25s; }
    .flow-line-d.delay-2 { animation-delay: -4.5s; }
    .flow-line-d.delay-4 { animation-delay: -6.75s; }

    @keyframes flowDiag {
        0% { transform: translateX(-30%) translateY(-10%); opacity: 0; }
        15% { opacity: 0.6; }
        85% { opacity: 0.6; }
        100% { transform: translateX(30%) translateY(10%); opacity: 0; }
    }

    /* Wave paths */
    .wave-path {
        animation: waveMove 12s linear infinite;
    }
    .wave-path.delay-2 { animation-delay: -4s; }
    .wave-path.delay-4 { animation-delay: -8s; }

    @keyframes waveMove {
        0% { transform: translateX(-10%); }
        100% { transform: translateX(10%); }
    }

    /* Gradient text */
    .hero-gradient-text {
        background: linear-gradient(90deg, #FFB347 0%, #FF8C00 50%, #FF6B00 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    /* Scroll dot animation */
    .scroll-dot {
        animation: scrollBounce 2s ease-in-out infinite;
    }

    @keyframes scrollBounce {
        0%, 100% { transform: translateY(0); opacity: 1; }
        50% { transform: translateY(12px); opacity: 0.3; }
    }

    /* Hero content entrance animations */
    .hero-badge {
        animation: fadeInDown 0.7s ease-out both;
    }
    .hero-title {
        animation: fadeInUp 0.7s ease-out 0.15s both;
    }
    .hero-subtitle {
        animation: fadeInUp 0.7s ease-out 0.3s both;
    }
    .hero-cta {
        animation: fadeInUp 0.7s ease-out 0.45s both;
    }
    .hero-stats {
        animation: fadeInUp 0.7s ease-out 0.6s both;
    }
    .scroll-indicator {
        animation: fadeIn 1s ease-out 1s both;
    }

    @keyframes fadeInDown {
        from { opacity: 0; transform: translateY(-16px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(24px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    @keyframes fadeIn {
        from { opacity: 0; }
        to   { opacity: 1; }
    }
</style>
