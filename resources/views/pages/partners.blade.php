@extends('layouts.site')

@section('title', 'Our Partners')
@section('meta_description', 'Tribute Energy partners with World Vision, RUWASA and the Government of Tanzania to deliver sustainable energy and water projects.')

@section('content')

    {{-- Hero --}}
    <section class="relative pt-20 pb-20 overflow-hidden bg-white">
        <div class="absolute inset-0 opacity-5" style="background: url('{{ asset('hero-bg.jpg') }}') center/cover no-repeat;"></div>
        <div class="relative z-10 max-w-screen-xl mx-auto px-4 lg:px-8 text-center">
            <span class="inline-block px-4 py-1.5 text-xs font-bold tracking-wider uppercase rounded-full mb-5" style="background: #fff7ed; color: #FF8C00; border: 1px solid #ffedd5;">Partnerships</span>
            <h1 class="text-4xl md:text-6xl font-extrabold text-gray-900 leading-tight mb-5">Key <span style="background: linear-gradient(90deg,#FFB347,#FF8C00); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">Partnerships</span></h1>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto leading-relaxed">
                Collaborating with leading organizations to drive sustainable development across Tanzania.
            </p>
        </div>
    </section>

    {{-- Partners grid --}}
    <section class="py-20 bg-white">
        <div class="max-w-screen-xl mx-auto px-4 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @php
                $partners = [
                    ['logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/91/World_Vision_logo.svg/512px-World_Vision_logo.svg.png', 'name' => 'World Vision', 'desc' => 'Partnered on multiple solar water pumping projects including Karatu (2017), Kigoma (2018), and Hedaru (2016).'],
                    ['logo' => null, 'name' => 'RUWASA', 'desc' => 'Rural Water and Sanitation Agency — a long-term partner for rural water supply projects across Tanzania.'],
                    ['logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1e/Coat_of_arms_of_Tanzania.svg/512px-Coat_of_arms_of_Tanzania.svg.png', 'name' => 'Government of Tanzania', 'desc' => 'Strategic partner for national water infrastructure and renewable energy initiatives.'],
                ];
                @endphp
                @foreach($partners as $p)
                <div class="p-6 rounded-2xl border border-gray-100 hover:border-orange-200 transition-all duration-300 hover:shadow-lg text-center bg-white">
                    <div class="w-20 h-20 rounded-2xl mx-auto mb-5 flex items-center justify-center bg-gray-50 border border-gray-100 overflow-hidden">
                        @if($p['logo'])
                            <img src="{{ $p['logo'] }}" alt="{{ $p['name'] }} logo" class="w-full h-full object-contain p-2">
                        @else
                            <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-[#0f4c81] to-[#0a3a63] text-white">
                                <span class="text-[9px] font-bold tracking-wider uppercase leading-tight text-center">Rural Water<br>& Sanitation</span>
                                <span class="text-[7px] font-bold tracking-[0.15em] mt-0.5 opacity-80">AGENCY</span>
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

    {{-- Why partner with us --}}
    <section class="py-20 bg-gray-50">
        <div class="max-w-screen-xl mx-auto px-4 lg:px-8">
            <div class="text-center mb-16">
                <span class="inline-block px-4 py-1.5 text-xs font-bold tracking-wider uppercase rounded-full mb-4" style="background: #fff7ed; color: #FF8C00; border: 1px solid #ffedd5;">Why Partner With Us</span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900">Built for Long-Term Collaboration</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @php
                $reasons = [
                    ['icon' => 'fa-award', 'title' => 'Proven Track Record', 'desc' => '15+ years delivering projects on time and on budget for NGOs and government agencies.'],
                    ['icon' => 'fa-map-location-dot', 'title' => 'National Reach', 'desc' => 'Active project experience across 7+ regions of Tanzania, from Dar es Salaam to Kigoma.'],
                    ['icon' => 'fa-file-contract', 'title' => 'Procurement-Ready', 'desc' => 'Comfortable working within NGO and government tender, reporting and compliance processes.'],
                ];
                @endphp
                @foreach($reasons as $r)
                <div class="bg-white p-6 rounded-2xl border border-gray-100 text-center hover:shadow-lg transition-all">
                    <div class="w-14 h-14 rounded-xl mx-auto mb-4 flex items-center justify-center" style="background: linear-gradient(135deg, #fff7ed, #ffedd5);">
                        <i class="fas {{ $r['icon'] }} text-xl" style="color: #FF8C00;"></i>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">{{ $r['title'] }}</h3>
                    <p class="text-gray-600 text-sm">{{ $r['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-16 bg-white">
        <div class="max-w-3xl mx-auto px-4 text-center">
            <h2 class="text-2xl md:text-3xl font-extrabold text-gray-900 mb-5">Interested in partnering with Tribute Energy?</h2>
            <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-7 py-3.5 rounded-xl font-semibold text-white transition-all hover:-translate-y-0.5 hover:shadow-xl" style="background: linear-gradient(135deg, #FF8C00, #FF6B00);">Contact Our Partnerships Team <i class="fas fa-arrow-right"></i></a>
        </div>
    </section>

@endsection
