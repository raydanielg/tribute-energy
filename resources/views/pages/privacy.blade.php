@extends('layouts.site')

@section('title', 'Privacy Policy')
@section('meta_description', 'Tribute Energy privacy policy — how we collect, use, and protect your data.')

@section('content')

    <section class="relative pt-32 pb-16 border-b border-gray-200 bg-white">
        <div class="relative z-10 max-w-4xl mx-auto px-5 lg:px-8">
            <div class="section-label mb-4">Legal</div>
            <h1 class="font-bebas text-6xl lg:text-8xl leading-none">
                PRIVACY<br>
                <span class="text-gradient">POLICY</span>
            </h1>
            <div class="divider mt-4 mb-5"></div>
            <p class="text-gray-600 text-sm">Last updated: <strong class="text-gray-900">January 1, {{ date('Y') }}</strong></p>
        </div>
    </section>

    <section class="py-16 max-w-4xl mx-auto px-5 lg:px-8">
        <div class="space-y-8 text-gray-400 text-sm leading-relaxed" data-aos="fade-up">
            <p>Your privacy is important to us. This policy explains what data we collect, how we use it, and your rights regarding your personal information.</p>

            <div>
                <h2 class="font-bebas text-3xl text-gradient mb-4">INFORMATION WE COLLECT</h2>
                <ul class="space-y-3">
                    <li class="flex items-start gap-3"><span class="text-[#FF6B00] mt-0.5">→</span><span><strong class="text-gray-300">Account Data:</strong> Name, email, address, and payment information provided during registration or checkout.</span></li>
                    <li class="flex items-start gap-3"><span class="text-[#FF6B00] mt-0.5">→</span><span><strong class="text-gray-300">Usage Data:</strong> Pages visited, products viewed, and actions taken on our site, collected via cookies and analytics tools.</span></li>
                    <li class="flex items-start gap-3"><span class="text-[#FF6B00] mt-0.5">→</span><span><strong class="text-gray-300">Communications:</strong> Messages sent to us via email or support tickets, stored to improve our service.</span></li>
                </ul>
            </div>

            <div>
                <h2 class="font-bebas text-3xl text-gradient mb-4">HOW WE USE YOUR DATA</h2>
                <p>We use collected information to process orders, manage subscriptions, send transactional emails, improve our products and website experience, and (with your consent) send marketing communications. We never sell your personal data to third parties.</p>
            </div>

            <div>
                <h2 class="font-bebas text-3xl text-gradient mb-4">DATA SECURITY</h2>
                <p>All data is encrypted in transit (TLS 1.3) and at rest. Payment information is processed by PCI-DSS Level 1 certified providers. We conduct regular security audits and do not store raw card numbers on our servers.</p>
            </div>

            <div>
                <h2 class="font-bebas text-3xl text-gradient mb-4">YOUR RIGHTS</h2>
                <p>You have the right to access, correct, or delete your personal data at any time. Submit requests to <a href="mailto:privacy@tributeenergy.com" class="text-[#FF6B00] hover:underline">privacy@tributeenergy.com</a>. We will respond within 30 days. You may also opt out of marketing communications via the unsubscribe link in any email.</p>
            </div>

            <div>
                <h2 class="font-bebas text-3xl text-gradient mb-4">THIRD-PARTY SERVICES</h2>
                <p>We partner with trusted third-party services for payment processing (Stripe, PayPal), analytics (Google Analytics), and email delivery (SendGrid). Each service has its own privacy policy governing data handling.</p>
            </div>

            <div>
                <h2 class="font-bebas text-3xl text-gradient mb-4">CONTACT</h2>
                <p>For questions about this policy, contact our Data Protection Officer at <a href="mailto:privacy@tributeenergy.com" class="text-[#FF6B00] hover:underline">privacy@tributeenergy.com</a> or write to us at Tribute Energy LLC, 123 Performance Drive, Austin, TX 78701.</p>
            </div>

            <div class="bg-[#111] border border-[#252525] p-6 mt-8">
                <p class="font-rajdhani font-700 text-sm text-white mb-2"><i class="fas fa-shield-alt text-[#FF6B00] mr-2"></i>Your Privacy Matters</p>
                <p class="text-xs">We believe in transparency. You have full control over your data and can request its deletion at any time. We will never sell your information.</p>
            </div>
        </div>
    </section>

@endsection
