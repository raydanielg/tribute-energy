@extends('layouts.site')

@section('title', 'Contact Us')
@section('meta_description', 'Get in touch with the Tribute Energy team. We\'d love to hear from you.')

@section('content')

    <section class="relative pt-32 pb-20 overflow-hidden bg-white">
        <div class="relative z-10 max-w-7xl mx-auto px-5 lg:px-8">
            <div class="max-w-2xl">
                <div class="section-label mb-4">Get In Touch</div>
                <h1 class="font-bebas text-7xl lg:text-[100px] leading-none">
                    WE'D LOVE TO<br>
                    <span class="text-gradient">HEAR FROM YOU</span>
                </h1>
                <div class="divider mt-4 mb-6"></div>
                <p class="text-gray-600 text-lg leading-relaxed max-w-lg">Questions about our products, your order, or anything else? Our team is ready to help.</p>
            </div>
        </div>
    </section>

    <section class="py-16 max-w-7xl mx-auto px-5 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            @php
            $channels = [
                ['icon' => 'fa-envelope', 'title' => 'Email Us', 'color' => '#FF6B00', 'detail' => 'info@tributeenergy.com', 'sub' => 'We reply within 24 hours'],
                ['icon' => 'fa-comment', 'title' => 'Live Chat', 'color' => '#00C851', 'detail' => 'Chat available 8AM-8PM EST', 'sub' => 'Monday through Friday'],
                ['icon' => 'fa-phone', 'title' => 'Call Us', 'color' => '#0066FF', 'detail' => '+255 787 822 735', 'sub' => 'Mon-Fri, 8AM-8PM EST'],
            ];
            @endphp
            @foreach($channels as $c)
            <div class="card p-6 text-center" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="w-14 h-14 rounded-2xl flex items-center justify-center mx-auto mb-4" style="background: {{ $c['color'] }}15; border: 1px solid {{ $c['color'] }}25;">
                    <i class="fas {{ $c['icon'] }} text-xl" style="color: {{ $c['color'] }}"></i>
                </div>
                <h3 class="font-rajdhani font-700 text-base">{{ $c['title'] }}</h3>
                <p class="text-[#FF6B00] text-sm font-rajdhani font-600 mt-1">{{ $c['detail'] }}</p>
                <p class="text-gray-500 text-xs mt-1">{{ $c['sub'] }}</p>
            </div>
            @endforeach
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 mt-20" data-aos="fade-up">
            <div>
                <div class="section-label mb-3">Send a Message</div>
                <h2 class="font-bebas text-5xl leading-none mb-5">DROP US A<br><span class="text-gradient">LINE</span></h2>
                <div class="divider mb-6"></div>
                <form class="space-y-4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <input type="text" placeholder="Your Name" class="w-full bg-white border border-gray-200 px-4 py-3 text-sm text-gray-900 placeholder-gray-400 outline-none focus:border-[#FF6B00] transition-colors">
                        <input type="email" placeholder="Your Email" class="w-full bg-white border border-gray-200 px-4 py-3 text-sm text-gray-900 placeholder-gray-400 outline-none focus:border-[#FF6B00] transition-colors">
                    </div>
                    <select class="w-full bg-white border border-gray-200 px-4 py-3 text-sm text-gray-600 outline-none focus:border-[#FF6B00] transition-colors">
                        <option>General Inquiry</option>
                        <option>Order Support</option>
                        <option>Wholesale</option>
                        <option>Partnerships</option>
                        <option>Press &amp; Media</option>
                    </select>
                    <textarea rows="5" placeholder="Your Message" class="w-full bg-white border border-gray-200 px-4 py-3 text-sm text-gray-900 placeholder-gray-400 outline-none focus:border-[#FF6B00] transition-colors resize-none"></textarea>
                    <button type="submit" class="btn-primary"><span>Send Message</span> <i class="fas fa-paper-plane"></i></button>
                </form>
            </div>
            <div class="bg-gray-50 border border-gray-200 p-8 flex flex-col items-center justify-center text-center">
                <div class="w-20 h-20 rounded-full flex items-center justify-center mb-5 bg-gradient-to-br from-[#FF6B00]/20 to-[#FFB800]/10 border border-[#FF6B00]/20">
                    <i class="fas fa-rocket text-3xl text-[#FF6B00]"></i>
                </div>
                <h3 class="font-bebas text-3xl mb-2">HERE FOR <span class="text-gradient">YOU</span></h3>
                <p class="text-gray-500 text-sm max-w-xs">Whether you have a question about your order, our ingredients, or just want to say hi — we're all ears.</p>
                <div class="flex gap-4 mt-6">
                    <a href="#" class="w-10 h-10 rounded-full bg-gray-200 hover:bg-[#FF6B00] flex items-center justify-center text-gray-500 hover:text-white transition-all"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="w-10 h-10 rounded-full bg-gray-200 hover:bg-[#1DA1F2] flex items-center justify-center text-gray-500 hover:text-white transition-all"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="w-10 h-10 rounded-full bg-gray-200 hover:bg-[#1877F2] flex items-center justify-center text-gray-500 hover:text-white transition-all"><i class="fab fa-facebook-f"></i></a>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-gray-50 border-y border-gray-200">
        <div class="max-w-7xl mx-auto px-5 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                @php
                $faqs = [
                    ['q' => 'How long does shipping take?', 'a' => 'Standard 5-7 days. Express 2-3 days. Overnight available.'],
                    ['q' => 'What is your return policy?', 'a' => '30-day money-back guarantee on first orders.'],
                    ['q' => 'Do you ship internationally?', 'a' => 'Yes! We ship to 22+ countries worldwide.'],
                    ['q' => 'Can I cancel my subscription?', 'a' => 'Anytime through your account dashboard.'],
                ];
                @endphp
                @foreach($faqs as $f)
                <div>
                    <p class="font-rajdhani font-700 text-sm text-gray-900 mb-1">{{ $f['q'] }}</p>
                    <p class="text-gray-500 text-xs">{{ $f['a'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
