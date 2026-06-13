@extends('layouts.landing')

@section('title', 'About Us')
@section('meta_description', 'The Tribute Energy story — born from a passion for performance. Meet our team and mission.')

@section('content')

    {{-- Hero --}}
    <section class="relative pt-32 pb-20 overflow-hidden">
        <div class="absolute inset-0 z-0" style="background: linear-gradient(135deg, #0A0A0A 0%, #180900 60%, #0A0A0A 100%);"></div>
        <div class="absolute right-0 top-0 bottom-0 w-1/2 z-0 opacity-20"
             style="background: url('{{ asset('hero-bg.jpg') }}') right/cover no-repeat;"></div>
        <div class="absolute right-0 top-0 bottom-0 w-1/2 z-0"
             style="background: linear-gradient(to right, #0A0A0A, transparent);"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-5 lg:px-8">
            <div class="max-w-2xl">
                <div class="section-label mb-4">Our Story</div>
                <h1 class="font-bebas text-7xl lg:text-[100px] leading-none mb-6">
                    BORN FROM<br>
                    <span class="text-gradient">PASSION.</span><br>
                    BUILT FOR<br>
                    CHAMPIONS.
                </h1>
                <div class="divider mt-2 mb-6"></div>
                <p class="text-gray-400 text-lg leading-relaxed max-w-lg">
                    Tribute Energy started in 2019 when two former athletes realized the energy
                    supplement market was full of hype and empty promises. They decided to do something about it.
                </p>
            </div>
        </div>
    </section>

    {{-- Mission / Vision --}}
    <section class="py-20 max-w-7xl mx-auto px-5 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            @php
            $mvv = [
                ['icon' => 'fa-bullseye',   'label' => 'Our Mission',  'color' => '#FF6B00', 'text' => 'To create the most effective, cleanest, and most transparent energy supplements on earth — and back every claim with independent science.'],
                ['icon' => 'fa-eye',        'label' => 'Our Vision',   'color' => '#8B00FF', 'text' => 'A world where peak performance is accessible to everyone, powered by supplements you can actually trust and ingredients you can understand.'],
                ['icon' => 'fa-hand-heart', 'label' => 'Our Values',   'color' => '#00C851', 'text' => 'Integrity in every formula. Transparency in every label. Excellence in every batch. We stand behind every product we put our name on, period.'],
            ];
            @endphp
            @foreach($mvv as $i => $v)
            <div class="card p-8 text-center" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                <div class="w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-5"
                     style="background: {{ $v['color'] }}15; border: 1px solid {{ $v['color'] }}25;">
                    <i class="fas {{ $v['icon'] }} text-2xl" style="color: {{ $v['color'] }};"></i>
                </div>
                <div class="section-label mb-3" style="color: {{ $v['color'] }}">{{ $v['label'] }}</div>
                <p class="text-gray-400 text-sm leading-relaxed">{{ $v['text'] }}</p>
            </div>
            @endforeach
        </div>
    </section>

    {{-- Story Timeline --}}
    <section class="py-20 bg-[#0D0D0D] border-y border-[#1A1A1A]">
        <div class="max-w-4xl mx-auto px-5 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <div class="section-label mb-3">The Journey</div>
                <h2 class="font-bebas text-6xl">OUR <span class="text-gradient">TIMELINE</span></h2>
                <div class="divider mx-auto mt-4"></div>
            </div>

            @php
            $timeline = [
                ['year' => '2019', 'title' => 'The Spark',            'desc' => 'Founders Alex Rivera and Jordan Chen, frustrated with the market\'s lack of transparency, begin 18 months of independent research in Austin, TX.'],
                ['year' => '2020', 'title' => 'The Formula',          'desc' => 'After testing 47 formulations and partnering with sports science researchers, the TriFuel™ Complex is developed and validated in clinical trials.'],
                ['year' => '2021', 'title' => 'Launch Day',           'desc' => 'Tribute Energy launches with 3 flavors and sells out in 48 hours. Community-driven growth begins with zero paid advertising.'],
                ['year' => '2022', 'title' => 'NSF Certification',    'desc' => 'Becomes one of the few energy brands to achieve NSF Sport certification. Expands to 8 flavors and launches the Performance Powder line.'],
                ['year' => '2023', 'title' => '50K Customers',        'desc' => 'Reaches 50,000 subscribers. Launches the Elite plan and partnership program with professional sports teams across 3 leagues.'],
                ['year' => '2024', 'title' => 'Global Expansion',     'desc' => 'Ships to 22 countries. Launches dedicated R&D lab and the Tribute Foundation for youth athletic programs.'],
            ];
            @endphp

            <div class="relative">
                <div class="absolute left-8 md:left-1/2 top-0 bottom-0 w-px bg-[#252525]"></div>

                @foreach($timeline as $i => $t)
                <div class="relative flex {{ $i % 2 === 0 ? 'md:flex-row' : 'md:flex-row-reverse' }} gap-8 mb-12 items-center"
                     data-aos="{{ $i % 2 === 0 ? 'fade-right' : 'fade-left' }}" data-aos-delay="{{ $i * 60 }}">
                    {{-- Year dot --}}
                    <div class="absolute left-8 md:left-1/2 w-4 h-4 rounded-full bg-[#FF6B00] border-4 border-[#0D0D0D] -translate-x-1/2 glow-orange z-10"></div>

                    <div class="{{ $i % 2 === 0 ? 'md:text-right md:pr-16 pl-20 md:pl-0 md:w-1/2' : 'pl-20 md:pl-16 md:w-1/2' }}">
                        <div class="font-bebas text-4xl text-[#FF6B00] leading-none">{{ $t['year'] }}</div>
                        <h3 class="font-rajdhani font-700 text-lg mt-1 mb-2">{{ $t['title'] }}</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">{{ $t['desc'] }}</p>
                    </div>

                    <div class="hidden md:block md:w-1/2"></div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Team --}}
    <section class="py-24 max-w-7xl mx-auto px-5 lg:px-8">
        <div class="text-center mb-14" data-aos="fade-up">
            <div class="section-label mb-3">The Humans Behind It</div>
            <h2 class="font-bebas text-6xl lg:text-7xl">MEET THE <span class="text-gradient">TEAM</span></h2>
            <div class="divider mx-auto mt-4"></div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
            $team = [
                ['name' => 'Alex Rivera',     'role' => 'Co-Founder & CEO',        'color_start' => '#FF6B00', 'color_end' => '#FFB800', 'bio' => 'Former D1 sprinter turned entrepreneur. 12 years in sports nutrition R&D.'],
                ['name' => 'Jordan Chen',     'role' => 'Co-Founder & CTO',        'color_start' => '#8B00FF', 'color_end' => '#CC00FF', 'bio' => 'PhD Biochemistry. Spent 8 years formulating for elite Olympic programs.'],
                ['name' => 'Maya Okonkwo',   'role' => 'Head of Product Science', 'color_start' => '#0066FF', 'color_end' => '#00AAFF', 'bio' => 'Sports dietitian with 200+ professional athlete clients and 15 publications.'],
                ['name' => 'Sam Torres',     'role' => 'VP of Operations',        'color_start' => '#00C851', 'color_end' => '#007E33', 'bio' => 'GMP manufacturing expert. Ensured zero quality incidents since day one.'],
            ];
            @endphp

            @foreach($team as $i => $member)
            <div class="card group text-center" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                <div class="relative overflow-hidden" style="height: 220px; background: linear-gradient(135deg, {{ $member['color_start'] }}33, {{ $member['color_end'] }}22);">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="w-24 h-24 rounded-full flex items-center justify-center font-bebas text-4xl text-white"
                             style="background: linear-gradient(135deg, {{ $member['color_start'] }}, {{ $member['color_end'] }});">
                            {{ strtoupper(substr($member['name'], 0, 1)) }}{{ strtoupper(substr(explode(' ', $member['name'])[1], 0, 1)) }}
                        </div>
                    </div>
                </div>
                <div class="p-5">
                    <h3 class="font-rajdhani font-700 text-base">{{ $member['name'] }}</h3>
                    <p class="section-label !text-xs mt-1 mb-3">{{ $member['role'] }}</p>
                    <p class="text-gray-500 text-xs leading-relaxed">{{ $member['bio'] }}</p>
                    <div class="flex justify-center gap-3 mt-4">
                        <a href="#" class="w-7 h-7 rounded-full bg-[#1A1A1A] hover:bg-[#FF6B00] transition-colors flex items-center justify-center text-gray-500 hover:text-white text-xs">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" class="w-7 h-7 rounded-full bg-[#1A1A1A] hover:bg-[#FF6B00] transition-colors flex items-center justify-center text-gray-500 hover:text-white text-xs">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    {{-- Certifications --}}
    <section class="py-16 bg-[#0D0D0D] border-y border-[#1A1A1A]">
        <div class="max-w-7xl mx-auto px-5 lg:px-8">
            <div class="text-center mb-10" data-aos="fade-up">
                <div class="section-label mb-2">Trust &amp; Compliance</div>
                <h2 class="font-bebas text-5xl">OUR <span class="text-gradient">CERTIFICATIONS</span></h2>
            </div>
            <div class="flex flex-wrap justify-center gap-6" data-aos="fade-up" data-aos-delay="100">
                @php
                $certs = ['NSF Sport Certified','Informed Choice','GMP Manufacturing','Vegan Certified','Non-GMO Project','ISO 17025 Tested'];
                @endphp
                @foreach($certs as $cert)
                <div class="bg-[#111] border border-[#252525] hover:border-[#FF6B00]/40 transition-colors px-7 py-4 text-center cursor-default">
                    <i class="fas fa-award text-[#FF6B00] text-xl mb-2 block"></i>
                    <span class="font-rajdhani font-700 text-xs tracking-wider uppercase text-gray-400">{{ $cert }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-20">
        <div class="max-w-3xl mx-auto px-5 text-center" data-aos="fade-up">
            <h2 class="font-bebas text-6xl mb-4">JOIN THE <span class="text-gradient">MOVEMENT</span></h2>
            <p class="text-gray-400 mb-8">Be part of the growing community of people who refuse to settle for ordinary.</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('register') }}" class="btn-primary"><span>Create Account</span> <i class="fas fa-user-plus"></i></a>
                <a href="{{ route('products') }}" class="btn-outline">Shop Now</a>
            </div>
        </div>
    </section>

@endsection
