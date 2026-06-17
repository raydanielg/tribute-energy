@extends('layouts.site')

@section('title', 'Terms & Privacy')
@section('meta_description', 'Tribute Energy terms of service, privacy policy, and return policy.')

@section('content')

    {{-- Hero --}}
    <section class="relative pt-32 pb-16 border-b border-gray-200 bg-white">
        <div class="relative z-10 max-w-4xl mx-auto px-5 lg:px-8">
            <div class="section-label mb-4">Legal</div>
            <h1 class="font-bebas text-6xl lg:text-8xl leading-none">
                TERMS &amp;<br>
                <span class="text-gradient">PRIVACY POLICY</span>
            </h1>
            <div class="divider mt-4 mb-5"></div>
            <p class="text-gray-600 text-sm">
                Last updated: <strong class="text-gray-900">January 1, {{ date('Y') }}</strong>
            </p>
        </div>
    </section>

    {{-- Content --}}
    <section class="py-16 max-w-7xl mx-auto px-5 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-10">

            {{-- Sidebar Nav --}}
            <aside class="lg:col-span-1" x-data="{ active: 'terms' }">
                <div class="sticky top-28 space-y-1">
                    @php
                    $sections = [
                        ['id' => 'terms',     'label' => 'Terms of Service'],
                        ['id' => 'privacy',   'label' => 'Privacy Policy'],
                        ['id' => 'returns',   'label' => 'Return Policy'],
                        ['id' => 'shipping',  'label' => 'Shipping Policy'],
                        ['id' => 'cookies',   'label' => 'Cookie Policy'],
                    ];
                    @endphp
                    @foreach($sections as $s)
                    <a href="#{{ $s['id'] }}"
                       class="flex items-center gap-3 px-4 py-3 text-sm font-rajdhani font-600 tracking-wide transition-all
                              {{ $loop->first ? 'bg-[#FF6B00]/10 border-l-2 border-[#FF6B00] text-gray-900' : 'text-gray-500 hover:text-gray-900 hover:bg-gray-50 border-l-2 border-transparent hover:border-[#FF6B00]/50' }}">
                        {{ $s['label'] }}
                    </a>
                    @endforeach
                </div>
            </aside>

            {{-- Content Body --}}
            <div class="lg:col-span-3 space-y-16">

                @php
                function prose_h2($title, $id) {
                    return '<h2 id="' . $id . '" class="font-bebas text-4xl text-gradient mb-5 scroll-mt-28">' . $title . '</h2><div class="divider mb-7"></div>';
                }
                function prose_h3($title) {
                    return '<h3 class="font-rajdhani font-700 text-lg text-white mt-7 mb-3">' . $title . '</h3>';
                }
                @endphp

                {{-- Terms of Service --}}
                <div id="terms" class="scroll-mt-28" data-aos="fade-up">
                    <h2 class="font-bebas text-4xl text-gradient mb-5">TERMS OF SERVICE</h2>
                    <div class="divider mb-7"></div>
                    <div class="prose-content space-y-5 text-gray-400 text-sm leading-relaxed">
                        <p>Welcome to Tribute Energy ("Company", "we", "us", or "our"). By accessing or using our website at tributeenergy.com and purchasing our products, you agree to be bound by these Terms of Service. Please read them carefully.</p>

                        <h3 class="font-rajdhani font-700 text-base text-white mt-6 mb-2">1. Acceptance of Terms</h3>
                        <p>By placing an order or creating an account, you confirm that you are at least 18 years of age, have read and agree to these terms, and are legally capable of entering into binding contracts. If you do not agree to any part of these terms, please do not use our services.</p>

                        <h3 class="font-rajdhani font-700 text-base text-white mt-6 mb-2">2. Products & Orders</h3>
                        <p>All product descriptions, pricing, and availability are subject to change without notice. We reserve the right to refuse or cancel any order at our discretion. Promotional pricing and discount codes cannot be combined unless explicitly stated. Prices are listed in USD and do not include applicable taxes and shipping unless noted.</p>

                        <h3 class="font-rajdhani font-700 text-base text-white mt-6 mb-2">3. Health Disclaimer</h3>
                        <p>Tribute Energy products contain caffeine and other bioactive compounds. They are intended for healthy adults only. Do not consume if pregnant, nursing, under 18, sensitive to caffeine, or if you have any pre-existing medical conditions without consulting a healthcare professional. Keep out of reach of children. Our products are not intended to diagnose, treat, cure, or prevent any disease.</p>

                        <h3 class="font-rajdhani font-700 text-base text-white mt-6 mb-2">4. Subscriptions</h3>
                        <p>Subscription plans automatically renew at the end of each billing cycle. You may cancel anytime through your account dashboard or by contacting support. Cancellations must be made at least 5 days before the next billing date to avoid being charged for the following cycle. Refunds for subscription charges are issued within 30 days of purchase.</p>

                        <h3 class="font-rajdhani font-700 text-base text-white mt-6 mb-2">5. Intellectual Property</h3>
                        <p>All content on this website — including logos, trademarks, formulas, copy, and design elements — is the exclusive property of Tribute Energy LLC and protected by applicable intellectual property laws. Unauthorized use, reproduction, or distribution is strictly prohibited.</p>

                        <h3 class="font-rajdhani font-700 text-base text-white mt-6 mb-2">6. Limitation of Liability</h3>
                        <p>To the maximum extent permitted by law, Tribute Energy shall not be liable for any indirect, incidental, special, consequential, or punitive damages arising from your use of our products or services. Our total liability shall not exceed the amount paid by you in the 12 months preceding the claim.</p>
                    </div>
                </div>

                {{-- Privacy Policy --}}
                <div id="privacy" class="scroll-mt-28 pt-8 border-t border-[#1A1A1A]" data-aos="fade-up">
                    <h2 class="font-bebas text-4xl text-gradient mb-5">PRIVACY POLICY</h2>
                    <div class="divider mb-7"></div>
                    <div class="space-y-5 text-gray-400 text-sm leading-relaxed">
                        <p>Your privacy is important to us. This policy explains what data we collect, how we use it, and your rights regarding your personal information.</p>

                        <h3 class="font-rajdhani font-700 text-base text-white mt-6 mb-2">Information We Collect</h3>
                        <ul class="space-y-2 ml-4">
                            <li class="flex items-start gap-2"><span class="text-[#FF6B00] mt-1">→</span><span><strong class="text-gray-300">Account Data:</strong> Name, email, address, and payment information provided during registration or checkout.</span></li>
                            <li class="flex items-start gap-2"><span class="text-[#FF6B00] mt-1">→</span><span><strong class="text-gray-300">Usage Data:</strong> Pages visited, products viewed, and actions taken on our site, collected via cookies and analytics tools.</span></li>
                            <li class="flex items-start gap-2"><span class="text-[#FF6B00] mt-1">→</span><span><strong class="text-gray-300">Communications:</strong> Messages sent to us via email or support tickets, stored to improve our service.</span></li>
                        </ul>

                        <h3 class="font-rajdhani font-700 text-base text-white mt-6 mb-2">How We Use Your Data</h3>
                        <p>We use collected information to process orders, manage subscriptions, send transactional emails, improve our products and website experience, and (with your consent) send marketing communications. We never sell your personal data to third parties.</p>

                        <h3 class="font-rajdhani font-700 text-base text-white mt-6 mb-2">Data Security</h3>
                        <p>All data is encrypted in transit (TLS 1.3) and at rest. Payment information is processed by PCI-DSS Level 1 certified providers. We conduct regular security audits and do not store raw card numbers on our servers.</p>

                        <h3 class="font-rajdhani font-700 text-base text-white mt-6 mb-2">Your Rights</h3>
                        <p>You have the right to access, correct, or delete your personal data at any time. Submit requests to privacy@tributeenergy.com. We will respond within 30 days. You may also opt out of marketing communications via the unsubscribe link in any email.</p>
                    </div>
                </div>

                {{-- Return Policy --}}
                <div id="returns" class="scroll-mt-28 pt-8 border-t border-[#1A1A1A]" data-aos="fade-up">
                    <h2 class="font-bebas text-4xl text-gradient mb-5">RETURN POLICY</h2>
                    <div class="divider mb-7"></div>
                    <div class="space-y-5 text-gray-400 text-sm leading-relaxed">
                        <div class="bg-[#FF6B00]/10 border border-[#FF6B00]/20 p-5">
                            <p class="font-rajdhani font-700 text-[#FF6B00] text-sm tracking-wider uppercase mb-1">30-Day Money-Back Guarantee</p>
                            <p>Not satisfied with your purchase? We'll issue a full refund on your first order — no questions asked. This is our commitment to your satisfaction.</p>
                        </div>
                        <h3 class="font-rajdhani font-700 text-base text-white mt-6 mb-2">Eligibility</h3>
                        <ul class="space-y-2 ml-4">
                            <li class="flex items-start gap-2"><span class="text-[#FF6B00] mt-1">→</span><span>Unopened products may be returned within 30 days of delivery for a full refund.</span></li>
                            <li class="flex items-start gap-2"><span class="text-[#FF6B00] mt-1">→</span><span>Opened products are eligible for a one-time satisfaction refund on your first purchase only.</span></li>
                            <li class="flex items-start gap-2"><span class="text-[#FF6B00] mt-1">→</span><span>Bundle and subscription items follow the same policy but require at least 7 days of use.</span></li>
                        </ul>
                        <h3 class="font-rajdhani font-700 text-base text-white mt-6 mb-2">How to Initiate a Return</h3>
                        <p>Email returns@tributeenergy.com with your order number and reason. Our team will provide a prepaid return label within 2 business days. Refunds are processed within 5-7 business days of receiving your return.</p>
                    </div>
                </div>

                {{-- Shipping Policy --}}
                <div id="shipping" class="scroll-mt-28 pt-8 border-t border-[#1A1A1A]" data-aos="fade-up">
                    <h2 class="font-bebas text-4xl text-gradient mb-5">SHIPPING POLICY</h2>
                    <div class="divider mb-7"></div>
                    <div class="space-y-5 text-gray-400 text-sm leading-relaxed">
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            @php
                            $shipping_tiers = [
                                ['type' => 'Standard',  'time' => '5-7 business days',    'price' => '$4.99'],
                                ['type' => 'Express',   'time' => '2-3 business days',    'price' => '$12.99'],
                                ['type' => 'Overnight', 'time' => 'Next business day',    'price' => '$24.99'],
                            ];
                            @endphp
                            @foreach($shipping_tiers as $tier)
                            <div class="bg-[#111] border border-[#252525] p-4 text-center">
                                <p class="font-rajdhani font-700 text-sm text-white">{{ $tier['type'] }}</p>
                                <p class="text-xs text-gray-500 mt-1">{{ $tier['time'] }}</p>
                                <p class="font-bebas text-2xl text-[#FF6B00] mt-2">{{ $tier['price'] }}</p>
                            </div>
                            @endforeach
                        </div>
                        <p><strong class="text-gray-300">Free Shipping:</strong> All US orders over $50 qualify for free standard shipping. Subscription members on Performance and Elite plans receive free shipping on every order.</p>
                        <p><strong class="text-gray-300">International Shipping:</strong> We ship to 22+ countries. International orders may be subject to customs duties and taxes, which are the responsibility of the recipient.</p>
                    </div>
                </div>

                {{-- Cookie Policy --}}
                <div id="cookies" class="scroll-mt-28 pt-8 border-t border-[#1A1A1A]" data-aos="fade-up">
                    <h2 class="font-bebas text-4xl text-gradient mb-5">COOKIE POLICY</h2>
                    <div class="divider mb-7"></div>
                    <div class="space-y-5 text-gray-400 text-sm leading-relaxed">
                        <p>We use cookies and similar tracking technologies to enhance your browsing experience, analyze site traffic, and personalize content.</p>
                        <h3 class="font-rajdhani font-700 text-base text-white mt-6 mb-2">Types of Cookies We Use</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start gap-2"><span class="text-[#FF6B00] mt-1">→</span><span><strong class="text-gray-300">Essential Cookies:</strong> Required for basic site functionality including shopping cart and account login. Cannot be disabled.</span></li>
                            <li class="flex items-start gap-2"><span class="text-[#FF6B00] mt-1">→</span><span><strong class="text-gray-300">Analytics Cookies:</strong> Help us understand how visitors interact with our site. Collected anonymously via Google Analytics.</span></li>
                            <li class="flex items-start gap-2"><span class="text-[#FF6B00] mt-1">→</span><span><strong class="text-gray-300">Marketing Cookies:</strong> Used to show you relevant ads on other platforms. Can be opted out via our cookie settings.</span></li>
                        </ul>
                        <p>You can manage cookie preferences through your browser settings at any time. Note that disabling certain cookies may affect site functionality.</p>
                    </div>
                </div>

                {{-- Contact --}}
                <div class="pt-8 border-t border-[#1A1A1A]" data-aos="fade-up">
                    <div class="bg-[#111] border border-[#252525] p-7">
                        <h3 class="font-rajdhani font-700 text-base text-white mb-3">Questions About These Policies?</h3>
                        <p class="text-gray-400 text-sm mb-4">Our legal and support team is happy to help clarify anything in these documents.</p>
                        <div class="flex flex-wrap gap-4 text-sm">
                            <a href="mailto:legal@tributeenergy.com" class="text-[#FF6B00] hover:underline font-rajdhani font-600">
                                <i class="fas fa-envelope mr-2"></i>legal@tributeenergy.com
                            </a>
                            <span class="text-gray-600">·</span>
                            <a href="mailto:privacy@tributeenergy.com" class="text-[#FF6B00] hover:underline font-rajdhani font-600">
                                <i class="fas fa-shield-alt mr-2"></i>privacy@tributeenergy.com
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
