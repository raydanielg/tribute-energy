<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Tribute Energy Limited') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('icons8-dynamics-365-100.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="{{ asset('node_modules/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('node_modules/aos/dist/aos.css') }}" rel="stylesheet">
    @stack('head')
    <style>
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: #ffffff;
            min-height: 100vh;
            display: flex;
            color: #000;
            -webkit-font-smoothing: antialiased;
        }

        .auth-wrapper {
            display: flex;
            min-height: 100vh;
            width: 100%;
        }

        /* ===== LEFT BRAND PANEL ===== */
        .auth-brand-side {
            flex: 1;
            display: flex;
            flex-direction: column;
            padding: 0;
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, rgba(255, 165, 0, 0.15) 0%, rgba(255, 140, 0, 0.1) 100%), url('{{ asset('hero-bg.jpg') }}');
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .auth-brand-side::before {
            content: '';
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at 20% 80%, rgba(255, 165, 0, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 140, 0, 0.12) 0%, transparent 50%);
            animation: breathe 8s ease-in-out infinite alternate;
        }

        @keyframes breathe {
            0% { opacity: 0.6; transform: scale(1); }
            100% { opacity: 1; transform: scale(1.05); }
        }

        .auth-brand-inner {
            position: relative;
            z-index: 2;
            display: flex;
            flex-direction: column;
            height: 100%;
            padding: 2rem 2.5rem;
            justify-content: space-between;
        }

        .auth-brand-top {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 0.5rem;
        }

        .brand-icon {
            width: 80px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);
            border-radius: 20px;
            box-shadow: 0 12px 32px rgba(255, 140, 0, 0.4);
            animation: pulse 3s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); box-shadow: 0 12px 32px rgba(255, 140, 0, 0.4); }
            50% { transform: scale(1.05); box-shadow: 0 16px 40px rgba(255, 140, 0, 0.5); }
        }

        .brand-icon .brand-logo-image {
            width: 100%;
            height: 100%;
            object-fit: contain;
            padding: 16px;
        }

        .auth-brand-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.3);
            padding-top: 1.25rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.75rem;
        }

        .auth-brand-links {
            display: flex;
            gap: 1.5rem;
        }

        .auth-brand-links a {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            font-size: 0.78rem;
            font-weight: 500;
            transition: color 0.2s ease;
        }

        .auth-brand-links a:hover { color: #fff; }

        .auth-brand-copy {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.72rem;
        }

        .auth-brand-copy span { color: rgba(255, 255, 255, 0.9); }

        /* ===== RIGHT FORM PANEL ===== */
        .auth-form-side {
            width: 540px;
            min-width: 540px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 3.5rem;
            background: #ffffff;
            border-left: 1px solid #e5e7eb;
            position: relative;
            box-shadow: -5px 0 25px rgba(0,0,0,0.03);
        }

        .auth-form-header {
            position: relative;
            z-index: 1;
            margin-bottom: 2.5rem;
        }

        .auth-form-header .mobile-logo {
            display: none;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1.5rem;
        }

        .auth-form-header .mobile-logo .logo-image {
            width: 48px;
            height: 48px;
            object-fit: contain;
        }

        .auth-form-title {
            font-size: 1.75rem;
            font-weight: 800;
            letter-spacing: -0.03em;
            margin-bottom: 0.5rem;
            color: #FF8C00;
            background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .auth-form-subtitle {
            color: #6b7280;
            font-size: 0.95rem;
            line-height: 1.6;
            font-weight: 400;
        }

        .auth-form-body {
            position: relative;
            z-index: 1;
            flex: 1;
            max-width: 380px;
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .auth-form-body.fade-out {
            opacity: 0;
            transform: translateY(-10px);
        }

        .auth-form-body.fade-in {
            opacity: 0;
            transform: translateY(10px);
        }

        .auth-form-body.fade-in.show {
            opacity: 1;
            transform: translateY(0);
        }

        .form-group { margin-bottom: 1.5rem; }

        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 0.625rem;
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-icon {
            position: absolute;
            left: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            width: 1rem;
            height: 1rem;
            color: #FF8C00;
            pointer-events: none;
        }

        .form-control {
            width: 100%;
            padding: 0.625rem 0.75rem 0.625rem 2.25rem;
            background: #f8f9fa;
            border: 2px solid #e5e7eb;
            border-radius: 0.5rem;
            color: #111827;
            font-size: 0.875rem;
            font-family: 'Inter', sans-serif;
            transition: all 0.2s ease;
            outline: none;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
            appearance: none;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%23FF8C00' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 0.5rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
        }

        select.form-control {
            padding-right: 2.5rem;
        }

        .form-control::placeholder { color: #9ca3af; }

        .form-control:focus {
            border-color: #FF8C00;
            background: #ffffff;
            box-shadow: 0 0 0 4px rgba(255, 140, 0, 0.1), 0 1px 3px rgba(0,0,0,0.05);
        }

        .form-control.is-invalid {
            border-color: #ef4444;
            background: #fef2f2;
            box-shadow: 0 0 0 4px rgba(239,68,68,0.1);
        }

        .invalid-feedback {
            color: #dc2626;
            font-size: 0.82rem;
            margin-top: 0.6rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 600;
            background: linear-gradient(135deg, #fef2f2 0%, #fee2e2 100%);
            padding: 0.65rem 0.9rem;
            border-radius: 10px;
            border: 1px solid rgba(239,68,68,0.2);
            border-left: 4px solid #ef4444;
            animation: slideIn 0.3s ease-out;
            box-shadow: 0 2px 8px rgba(239,68,68,0.1);
        }

        .invalid-feedback svg { width: 16px; height: 16px; flex-shrink: 0; color: #ef4444; }

        @keyframes slideIn {
            from { opacity: 0; transform: translateY(-8px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .form-check {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1.5rem;
        }

        .form-check-input {
            width: 18px; height: 18px;
            accent-color: #FF8C00;
            cursor: pointer;
            border: 2px solid #e5e7eb;
            border-radius: 4px;
        }

        .form-check-input:checked {
            background-color: #FF8C00;
            border-color: #FF8C00;
        }

        .form-check-label {
            font-size: 0.9rem;
            color: #4b5563;
            cursor: pointer;
            font-weight: 500;
        }

        /* ===== ORANGE BUTTON WITH LOADING ===== */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding: 0.9rem 1.75rem;
            border: none;
            border-radius: 12px;
            font-size: 0.95rem;
            font-weight: 700;
            font-family: 'Inter', sans-serif;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            position: relative;
            gap: 0.6rem;
            letter-spacing: 0.01em;
        }

        .btn-primary {
            background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);
            color: #fff;
            box-shadow: 0 4px 15px rgba(255, 140, 0, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255, 140, 0, 0.5);
            background: linear-gradient(135deg, #FF7B00 0%, #FF5B00 100%);
        }

        .btn-primary:active { transform: translateY(0); }

        .btn-primary.loading {
            pointer-events: none;
            opacity: 0.85;
        }

        .btn-primary .spinner {
            display: none;
            width: 18px; height: 18px;
            border: 2px solid rgba(255,255,255,0.3);
            border-top-color: #fff;
            border-radius: 50%;
            animation: spin 0.6s linear infinite;
        }

        .btn-primary.loading .spinner { display: block; }
        .btn-primary.loading .btn-text { opacity: 0.7; }

        @keyframes spin { to { transform: rotate(360deg); } }

        .btn-primary::after {
            content: '';
            position: absolute;
            inset: -1px;
            border-radius: 11px;
            background: linear-gradient(135deg, rgba(255,255,255,0.2), transparent);
            opacity: 0;
            transition: opacity 0.3s ease;
            pointer-events: none;
        }

        .btn-primary:hover::after { opacity: 1; }

        .btn-link {
            background: none;
            color: #6b7280;
            font-weight: 600;
            font-size: 0.83rem;
            width: auto;
            padding: 0.5rem;
        }

        .btn-link:hover { color: #FF8C00; }

        .auth-footer {
            text-align: center;
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid #e5e7eb;
        }

        .auth-footer span {
            color: #6b7280;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .auth-footer-link a {
            color: #FF8C00;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 700;
            transition: color 0.2s ease;
            margin-left: 0.5rem;
        }

        .auth-footer-link a:hover { color: #FF6B00; text-decoration: underline; }

        .alert {
            padding: 1rem 1.25rem;
            border-radius: 12px;
            font-size: 0.9rem;
            margin-bottom: 1.5rem;
            line-height: 1.5;
            font-weight: 500;
        }

        .alert-success {
            background: linear-gradient(135deg, rgba(255, 140, 0, 0.1) 0%, rgba(255, 140, 0, 0.05) 100%);
            border: 1.5px solid rgba(255, 140, 0, 0.25);
            color: #CC6E00;
            animation: slideIn 0.3s ease-out;
        }

        .alert-danger {
            background: linear-gradient(135deg, rgba(239,68,68,0.1) 0%, rgba(239,68,68,0.05) 100%);
            border: 1.5px solid rgba(239,68,68,0.25);
            color: #dc2626;
            animation: slideIn 0.3s ease-out;
        }

        /* ===== TOAST ===== */
        .toast-container {
            position: fixed;
            bottom: 1.5rem;
            right: 1.5rem;
            z-index: 9999;
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .toast {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 1rem 1.5rem;
            border-radius: 12px;
            background: linear-gradient(135deg, #ffffff 0%, #f9fafb 100%);
            border: 1.5px solid #e5e7eb;
            box-shadow: 0 8px 30px rgba(0,0,0,0.12);
            font-size: 0.9rem;
            font-weight: 500;
            color: #374151;
            min-width: 300px;
            max-width: 420px;
            transform: translateX(calc(100% + 2rem));
            opacity: 0;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .toast.show {
            transform: translateX(0);
            opacity: 1;
        }

        .toast.hiding {
            transform: translateX(calc(100% + 2rem));
            opacity: 0;
        }

        .toast-icon {
            width: 24px; height: 24px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .toast-icon.success { background: #FFF3E0; color: #FF8C00; }
        .toast-icon.error { background: #fef2f2; color: #ef4444; }
        .toast-icon.info { background: #eff6ff; color: #3b82f6; }

        .toast-icon svg { width: 14px; height: 14px; }

        .toast-close {
            margin-left: auto;
            background: none;
            border: none;
            color: #9ca3af;
            cursor: pointer;
            padding: 4px;
            line-height: 1;
            border-radius: 6px;
            transition: all 0.2s ease;
        }

        .toast-close:hover {
            color: #6b7280;
            background: #f3f4f6;
        }

        @media (max-width: 968px) {
            .auth-brand-side { display: none; }
            .auth-form-side {
                width: 100%;
                min-width: unset;
                border-left: none;
                padding: 2rem 1.5rem;
            }
            .auth-form-header .mobile-logo { display: flex; }
            .auth-form-body { max-width: 100%; }
            .toast { min-width: auto; max-width: calc(100vw - 2rem); }
        }
    </style>
</head>
<body>
    <div class="toast-container" id="toastContainer"></div>

    <div class="auth-wrapper">
        <div class="auth-brand-side">
            <div class="auth-brand-inner">
                <div class="auth-brand-top" data-aos="fade-right" data-aos-duration="1000">
                </div>

                <div class="auth-brand-bottom">
                    <div class="auth-brand-links">
                        <a href="#">Terms of Service</a>
                        <a href="#">Privacy Policy</a>
                        <a href="#">Cookie Policy</a>
                    </div>
                    <div class="auth-brand-copy">
                        &copy; {{ date('Y') }}. All rights reserved.
                    </div>
                </div>
            </div>
        </div>

        <div class="auth-form-side">
            <div class="auth-form-header" data-aos="fade-left" data-aos-duration="1000">
                @yield('form-header')
            </div>
            <div class="auth-form-body" data-aos="fade-up" data-aos-duration="800" data-aos-delay="300">
                @yield('form-content')
            </div>
        </div>
    </div>

    <script>
        function showToast(message, type, duration) {
            type = type || 'success';
            duration = duration || 4000;

            var container = document.getElementById('toastContainer');
            var toast = document.createElement('div');
            toast.className = 'toast';

            var icons = {
                success: '<svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>',
                error: '<svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>',
                info: '<svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>'
            };

            toast.innerHTML =
                '<div class="toast-icon ' + type + '">' + (icons[type] || icons.info) + '</div>' +
                '<span>' + message + '</span>' +
                '<button class="toast-close" onclick="this.parentElement.classList.add(\'hiding\');setTimeout(function(){this.parentElement.remove()}.bind(this),300)">' +
                '<svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>' +
                '</button>';

            container.appendChild(toast);

            requestAnimationFrame(function() {
                toast.classList.add('show');
            });

            setTimeout(function() {
                toast.classList.add('hiding');
                setTimeout(function() {
                    if (toast.parentElement) toast.remove();
                }, 300);
            }, duration);
        }

        // AJAX Navigation for Auth Pages
        function navigateToPage(url) {
            var formBody = document.querySelector('.auth-form-body');
            var formHeader = document.querySelector('.auth-form-header');

            // Fade out
            formBody.classList.add('fade-out');

            setTimeout(function() {
                fetch(url, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(function(response) {
                    if (response.redirected) {
                        window.location.href = response.url;
                        return;
                    }
                    return response.text();
                })
                .then(function(html) {
                    var parser = new DOMParser();
                    var doc = parser.parseFromString(html, 'text/html');
                    
                    var newHeader = doc.querySelector('.auth-form-header');
                    var newBody = doc.querySelector('.auth-form-body');

                    if (newHeader) {
                        formHeader.innerHTML = newHeader.innerHTML;
                    }
                    
                    if (newBody) {
                        formBody.innerHTML = newBody.innerHTML;
                    }

                    // Update URL without reload
                    window.history.pushState({}, '', url);

                    // Fade in
                    formBody.classList.remove('fade-out');
                    formBody.classList.add('fade-in');
                    
                    requestAnimationFrame(function() {
                        formBody.classList.add('show');
                    });

                    setTimeout(function() {
                        formBody.classList.remove('fade-in', 'show');
                    }, 300);

                    // Re-attach event listeners
                    attachFormListeners();
                    attachLinkListeners();
                })
                .catch(function(error) {
                    console.error('Navigation error:', error);
                    window.location.href = url;
                });
            }, 300);
        }

        function attachLinkListeners() {
            document.querySelectorAll('.auth-footer-link a, .btn-link').forEach(function(link) {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    var url = this.getAttribute('href');
                    if (url && url !== '#') {
                        navigateToPage(url);
                    }
                });
            });
        }

        function attachFormListeners() {
            document.querySelectorAll('form').forEach(function(form) {
                form.addEventListener('submit', function(e) {
                    var btn = this.querySelector('.btn-primary');
                    if (btn && !btn.classList.contains('loading')) {
                        btn.classList.add('loading');
                        btn.innerHTML = '<div class="spinner"></div><span class="btn-text">' + btn.textContent.trim() + '</span>';
                    }
                });
            });

            document.addEventListener('invalid', function(e) {
                e.target.classList.add('is-invalid');
            }, true);
        }

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            attachLinkListeners();
            attachFormListeners();
            
            // Initialize AOS
            AOS.init({
                duration: 800,
                easing: 'ease-out-cubic',
                once: true,
                offset: 50
            });
        });

        // Handle browser back/forward buttons
        window.addEventListener('popstate', function() {
            window.location.reload();
        });
    </script>
    <script src="{{ asset('node_modules/aos/dist/aos.js') }}"></script>
</body>
</html>
