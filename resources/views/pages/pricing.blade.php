@extends('layouts.landing')

@section('title', 'Pricing & Plans')
@section('meta_description', 'Tribute Energy subscription plans. Save up to 30% with monthly delivery. Cancel anytime.')

@section('content')

    {{-- Hero --}}
    <section class="relative pt-32 pb-16 text-center overflow-hidden">
        <div class="absolute inset-0 z-0" style="background: linear-gradient(135deg, #0A0A0A, #150800, #0A0A0A);"></div>
        <div class="relative z-10 max-w-4xl mx-auto px-5 lg:px-8">
            <div class="section-label mb-4">Flexible Plans</div>
            <h1 class="font-bebas text-7xl lg:text-[100px] leading-none">
                FUEL UP &amp;<br>
                <span class="text-gradient">SAVE MORE</span>
            </h1>
            <div class="divider mx-auto mt-5 mb-6"></div>
            <p class="text-gray-400 text-lg max-w-xl mx-auto">
                Subscribe and save on your favorite products. Free shipping on all plans.
                Cancel anytime, no questions asked.
            </p>
        </div>
    </section>

    {{-- Toggle: Monthly / Annual --}}
    <section class="py-16 max-w-7xl mx-auto px-5 lg:px-8" x-data="{ annual: false }">
        <div class="flex justify-center mb-12">
            <div class="flex items-center gap-4 bg-[#111] border border-[#252525] p-1.5 rounded-full">
                <span class="font-rajdhani font-700 text-sm px-4 py-2 rounded-full transition-all"
                      :class="!annual ? 'bg-[#FF6B00] text-white' : 'text-gray-500'"
                      x-on:click="annual = false" style="cursor:pointer">Monthly</span>
                <span class="font-rajdhani font-700 text-sm px-4 py-2 rounded-full transition-all flex items-center gap-2"
                      :class="annual ? 'bg-[#FF6B00] text-white' : 'text-gray-500'"
                      x-on:click="annual = true" style="cursor:pointer">
                    Annual
                    <span class="text-[10px] bg-[#FFB800] text-black px-1.5 py-0.5 rounded-full font-bold" x-show="!annual">Save 25%</span>
                </span>
            </div>
        </div>

        {{-- Plans --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-5xl mx-auto">
            @php
            $plans = [
                [
                    'name'     => 'Starter',
                    'sub'      => 'Perfect for beginners',
                    'price_m'  => 19.99,
                    'price_a'  => 14.99,
                    'color'    => '#444',
                    'featured' => false,
                    'items'    => ['6 Cans / Month', '1 Flavor Choice', 'Free Shipping', 'Basic Nutrition Guide', 'Email Support'],
                ],
                [
                    'name'     => 'Performance',
                    'sub'      => 'Most popular plan',
                    'price_m'  => 39.99,
                    'price_a'  => 29.99,
                    'color'    => '#FF6B00',
                    'featured' => true,
                    'items'    => ['14 Cans / Month', '3 Flavor Choices', 'Free Priority Shipping', 'Full Nutrition Guide', 'Priority Support', 'Early Access to New Flavors', '10% Off One-Time Purchases'],
                ],
                [
                    'name'     => 'Elite',
                    'sub'      => 'For serious athletes',
                    'price_m'  => 69.99,
                    'price_a'  => 52.99,
                    'color'    => '#FFB800',
                    'featured' => false,
                    'items'    => ['30 Cans / Month', 'All Flavors Unlocked', 'Free Express Shipping', 'Personalized Program', 'Dedicated Support Line', 'Exclusive Member Events', '20% Off One-Time Purchases', 'Monthly Mystery Box'],
                ],
            ];
            @endphp

            @foreach($plans as $i => $plan)
            <div class="relative card {{ $plan['featured'] ? 'border-[#FF6B00]/50 glow-orange' : '' }} flex flex-col"
                 data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                @if($plan['featured'])
                    <div class="absolute -top-3 left-1/2 -translate-x-1/2 bg-[#FF6B00] product-tag text-white px-6 py-1 whitespace-nowrap">
                        Most Popular
                    </div>
                @endif

                <div class="p-7 flex-1">
                    {{-- Plan header --}}
                    <div class="mb-6">
                        <div class="w-10 h-1 mb-4" style="background: {{ $plan['color'] }};"></div>
                        <h3 class="font-bebas text-3xl tracking-wider">{{ $plan['name'] }}</h3>
                        <p class="text-gray-500 text-sm">{{ $plan['sub'] }}</p>
                    </div>

                    {{-- Price --}}
                    <div class="mb-8">
                        <div class="flex items-end gap-2">
                            <span class="font-bebas text-6xl" style="color: {{ $plan['color'] }}">
                                $<span x-text="annual ? '{{ $plan['price_a'] }}' : '{{ $plan['price_m'] }}'"></span>
                            </span>
                            <span class="text-gray-500 text-sm mb-2 font-rajdhani font-600">/month</span>
                        </div>
                        <p class="text-gray-600 text-xs font-rajdhani font-600 tracking-wider uppercase mt-1"
                           x-show="annual">Billed annually</p>
                        <p class="text-gray-600 text-xs font-rajdhani font-600 tracking-wider uppercase mt-1"
                           x-show="!annual">Billed monthly</p>
                    </div>

                    {{-- Features --}}
                    <ul class="space-y-3 mb-8">
                        @foreach($plan['items'] as $item)
                        <li class="flex items-center gap-3 text-sm text-gray-300">
                            <i class="fas fa-check text-[#FF6B00] text-xs flex-shrink-0"></i>
                            {{ $item }}
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="p-7 pt-0">
                    <a href="{{ route('register') }}"
                       class="{{ $plan['featured'] ? 'btn-primary' : 'btn-outline' }} w-full">
                        <span>Get Started</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Enterprise --}}
        <div class="max-w-5xl mx-auto mt-6" data-aos="fade-up">
            <div class="card p-8 flex flex-col md:flex-row items-center justify-between gap-6 border-[#252525]">
                <div>
                    <div class="section-label mb-2">For Teams &amp; Gyms</div>
                    <h3 class="font-bebas text-3xl">ENTERPRISE PLAN</h3>
                    <p class="text-gray-400 text-sm mt-1 max-w-md">
                        Custom quantities, private labeling options, and dedicated account management.
                        Perfect for gyms, sports teams, and corporate wellness programs.
                    </p>
                </div>
                <a href="#" class="btn-outline flex-shrink-0">Contact Sales <i class="fas fa-external-link-alt ml-2 text-xs"></i></a>
            </div>
        </div>
    </section>

    {{-- FAQ --}}
    <section class="py-20 bg-[#0D0D0D] border-y border-[#1A1A1A]">
        <div class="max-w-3xl mx-auto px-5 lg:px-8">
            <div class="text-center mb-12" data-aos="fade-up">
                <div class="section-label mb-3">Got Questions?</div>
                <h2 class="font-bebas text-5xl lg:text-6xl">SUBSCRIPTION <span class="text-gradient">FAQ</span></h2>
            </div>

            @php
            $faqs = [
                ['q' => 'Can I cancel my subscription anytime?',
                 'a' => 'Yes, absolutely. Cancel anytime with no fees. Your subscription will remain active until the end of the current billing period.'],
                ['q' => 'Can I change my flavors each month?',
                 'a' => 'Yes! You can update your flavor preferences up to 5 days before your next billing date through your account dashboard.'],
                ['q' => 'When does my order ship?',
                 'a' => 'Orders ship within 1-2 business days after billing. Most US customers receive their orders within 3-5 business days.'],
                ['q' => 'Is there a minimum subscription commitment?',
                 'a' => 'No minimum. You can cancel after your first month. Annual plans are billed upfront but include a 30-day money-back guarantee.'],
                ['q' => 'Can I pause my subscription?',
                 'a' => 'Yes! You can pause your subscription for 1-3 months from your account settings. Great for travel or when you have extra stock.'],
            ];
            @endphp

            <div class="space-y-3" x-data="{ open: null }">
                @foreach($faqs as $i => $faq)
                <div class="card" data-aos="fade-up" data-aos-delay="{{ $i * 60 }}">
                    <button class="w-full flex items-center justify-between p-5 text-left"
                            x-on:click="open = open === {{ $i }} ? null : {{ $i }}">
                        <span class="font-rajdhani font-700 text-base pr-4">{{ $faq['q'] }}</span>
                        <i class="fas text-[#FF6B00] flex-shrink-0 transition-transform duration-300"
                           :class="open === {{ $i }} ? 'fa-minus rotate-180' : 'fa-plus'"></i>
                    </button>
                    <div x-show="open === {{ $i }}"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 -translate-y-2"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         class="px-5 pb-5 text-gray-400 text-sm leading-relaxed border-t border-[#1A1A1A]">
                        <p class="pt-4">{{ $faq['a'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Guarantee --}}
    <section class="py-16">
        <div class="max-w-5xl mx-auto px-5 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-center">
                @php
                $guarantees = [
                    ['icon' => 'fa-undo',        'title' => '30-Day Guarantee', 'desc' => "Not happy? Full refund within 30 days, no questions."],
                    ['icon' => 'fa-lock',        'title' => 'Secure Payments',  'desc' => 'PCI-compliant checkout. Your payment data is always protected.'],
                    ['icon' => 'fa-headset',     'title' => '24/7 Support',     'desc' => 'Real humans ready to help anytime you need us.'],
                ];
                @endphp
                @foreach($guarantees as $i => $g)
                <div data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                    <div class="w-16 h-16 rounded-full bg-[#FF6B00]/10 border border-[#FF6B00]/20 flex items-center justify-center mx-auto mb-4">
                        <i class="fas {{ $g['icon'] }} text-[#FF6B00] text-xl"></i>
                    </div>
                    <h4 class="font-rajdhani font-700 text-base mb-2">{{ $g['title'] }}</h4>
                    <p class="text-gray-500 text-sm">{{ $g['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
