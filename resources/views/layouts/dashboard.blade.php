<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Tribute Energy Limited') }} - Dashboard</title>
    <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    @stack('head')
    <style>
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

        :root {
            --radius: 0.625rem;
            --background: #ffffff;
            --foreground: #0a0a0a;
            --card: #ffffff;
            --card-foreground: #0a0a0a;
            --popover: #ffffff;
            --popover-foreground: #0a0a0a;
            --primary: #FF8C00;
            --primary-dark: #FF6B00;
            --primary-light: #FFB347;
            --primary-foreground: #ffffff;
            --secondary: #f3f4f6;
            --secondary-foreground: #0a0a0a;
            --muted: #f5f5f5;
            --muted-foreground: #6b7280;
            --accent: #fef3c7;
            --accent-foreground: #0a0a0a;
            --destructive: #ef4444;
            --destructive-foreground: #ffffff;
            --border: #e5e7eb;
            --input: #e5e7eb;
            --ring: #FF8C00;
            --sidebar: #ffffff;
            --sidebar-foreground: #0a0a0a;
            --sidebar-primary: #FF8C00;
            --sidebar-primary-foreground: #ffffff;
            --sidebar-accent: #fef3c7;
            --sidebar-accent-foreground: #0a0a0a;
            --sidebar-border: #e5e7eb;
            --sidebar-ring: #FF8C00;
            --success: #22c55e;
            --warning: #f59e0b;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: var(--background);
            min-height: 100vh;
            color: var(--foreground);
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        * {
            border-color: var(--border);
        }

        .dashboard-wrapper {
            display: flex;
            min-height: 100vh;
            width: 100%;
            background: var(--background);
        }

        .sidebar {
            width: 240px;
            border-right: 1px solid var(--sidebar-border);
            background: var(--sidebar);
            display: none;
            flex-direction: column;
            transition: width 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 2px 0 8px rgba(0, 0, 0, 0.04);
        }

        @media (min-width: 768px) {
            .sidebar {
                display: flex;
            }
        }

        .sidebar.collapsed {
            width: 68px;
        }

        .sidebar-nav {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
            padding: 1.25rem 0.75rem;
            height: 100%;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .sidebar-nav::-webkit-scrollbar {
            width: 4px;
        }

        .sidebar-nav::-webkit-scrollbar-track {
            background: transparent;
        }

        .sidebar-nav::-webkit-scrollbar-thumb {
            background: var(--border);
            border-radius: 2px;
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.5rem;
            text-decoration: none;
            color: inherit;
            transition: opacity 0.15s ease;
        }

        .sidebar-brand:hover {
            opacity: 0.8;
        }

        .sidebar-brand-icon {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: var(--primary-foreground);
            border-radius: calc(var(--radius) - 2px);
            font-weight: 700;
            font-size: 0.875rem;
            flex-shrink: 0;
            box-shadow: 0 2px 8px rgba(255, 140, 0, 0.2);
        }

        .sidebar-brand-text {
            display: flex;
            flex-direction: column;
            line-height: 1.2;
        }

        .sidebar-brand-name {
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--sidebar-foreground);
            letter-spacing: -0.02em;
        }

        .sidebar-brand-subtitle {
            font-size: 0.625rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: var(--muted-foreground);
            font-weight: 500;
        }

        .sidebar-section-label {
            font-size: 0.625rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            color: var(--muted-foreground);
            padding: 0 0.5rem 0.5rem;
        }

        .sidebar.collapsed .sidebar-section-label,
        .sidebar.collapsed .sidebar-brand-text,
        .sidebar.collapsed .sidebar-nav-item span,
        .sidebar.collapsed .sidebar-status {
            display: none;
        }

        .sidebar-nav-list {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 0.125rem;
        }

        .sidebar-nav-item a {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.5rem 0.625rem;
            border-radius: calc(var(--radius) - 2px);
            text-decoration: none;
            color: var(--sidebar-foreground);
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.15s ease;
        }

        .sidebar-nav-item a:hover {
            background: var(--sidebar-accent);
            color: var(--sidebar-foreground);
        }

        .sidebar-nav-item a.active {
            background: var(--sidebar-accent);
            color: var(--sidebar-accent-foreground);
            font-weight: 600;
        }

        .sidebar-nav-item a.active svg {
            color: var(--primary);
        }

        .sidebar-nav-item svg {
            width: 16px;
            height: 16px;
            flex-shrink: 0;
            color: var(--muted-foreground);
            transition: color 0.15s ease;
        }

        .sidebar-nav-item a:hover svg {
            color: var(--sidebar-foreground);
        }

        .sidebar-nav-item .logout-btn {
            color: var(--destructive);
            font-weight: 600;
        }

        .sidebar-nav-item .logout-btn svg {
            color: var(--destructive);
        }

        .sidebar-nav-item .logout-btn:hover {
            background: rgba(239, 68, 68, 0.1);
            color: var(--destructive);
        }

        .sidebar-nav-item .logout-btn:hover svg {
            color: var(--destructive);
        }

        .sidebar-status {
            border: 1px solid var(--sidebar-border);
            background: var(--sidebar-accent);
            border-radius: var(--radius);
            padding: 0.75rem;
            font-size: 0.75rem;
        }

        .sidebar-status-header {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 500;
            color: var(--sidebar-foreground);
        }

        .sidebar-status-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--primary);
            animation: pulse 2s ease-in-out infinite;
            box-shadow: 0 0 8px rgba(255, 140, 0, 0.4);
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.7; transform: scale(1.1); }
        }

        .sidebar-status-text {
            color: var(--muted-foreground);
            margin-top: 0.25rem;
            line-height: 1.4;
        }

        .main-content {
            display: flex;
            flex-direction: column;
            flex: 1;
            min-width: 0;
            background: var(--background);
        }

        .header {
            position: sticky;
            top: 0;
            z-index: 30;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            height: 56px;
            border-bottom: 1px solid var(--border);
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            padding: 0 1rem;
        }

        @media (min-width: 768px) {
            .header {
                padding: 0 1.5rem;
            }
        }

        .header-toggle {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            border-radius: calc(var(--radius) - 2px);
            border: none;
            background: transparent;
            color: var(--muted-foreground);
            cursor: pointer;
            transition: all 0.15s ease;
        }

        .header-toggle:hover {
            background: var(--accent);
            color: var(--accent-foreground);
        }

        .header-toggle svg {
            width: 20px;
            height: 20px;
        }

        @media (min-width: 768px) {
            .header-toggle.mobile-only {
                display: none;
            }
        }

        @media (max-width: 767px) {
            .header-toggle.desktop-only {
                display: none;
            }
        }

        .header-search {
            position: relative;
            flex: 1;
            max-width: 448px;
            display: none;
        }

        @media (min-width: 768px) {
            .header-search {
                display: block;
            }
        }

        .header-search svg {
            position: absolute;
            left: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            width: 16px;
            height: 16px;
            color: var(--muted-foreground);
            pointer-events: none;
        }

        .header-search input {
            width: 100%;
            height: 36px;
            border-radius: calc(var(--radius) - 2px);
            border: 1px solid var(--border);
            background: var(--card);
            padding: 0 0.75rem 0 2.25rem;
            font-size: 0.875rem;
            color: var(--foreground);
            outline: none;
            transition: all 0.15s ease;
            font-family: inherit;
        }

        .header-search input::placeholder {
            color: var(--muted-foreground);
            opacity: 0.7;
        }

        .header-search input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(255, 140, 0, 0.1);
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-left: auto;
        }

        .header-action-btn {
            position: relative;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: calc(var(--radius) - 2px);
            border: none;
            background: transparent;
            color: var(--muted-foreground);
            cursor: pointer;
            transition: all 0.15s ease;
        }

        .header-action-btn:hover {
            background: var(--accent);
            color: var(--accent-foreground);
        }

        .header-action-btn svg {
            width: 16px;
            height: 16px;
        }

        .header-action-btn .badge {
            position: absolute;
            right: 8px;
            top: 8px;
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--primary);
            box-shadow: 0 0 0 2px var(--background);
        }

        .header-user {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.375rem 0.5rem;
            border-radius: calc(var(--radius) - 2px);
            cursor: pointer;
            transition: all 0.15s ease;
        }

        .header-user:hover {
            background: var(--accent);
        }

        .header-user-avatar {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(255, 140, 0, 0.15) 0%, rgba(255, 107, 0, 0.15) 100%);
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            font-weight: 600;
            border: 1px solid rgba(255, 140, 0, 0.2);
        }

        .header-user-info {
            display: none;
            text-align: left;
            line-height: 1.2;
        }

        @media (min-width: 640px) {
            .header-user-info {
                display: block;
            }
        }

        .header-user-name {
            font-size: 0.75rem;
            font-weight: 500;
            color: var(--foreground);
        }

        .header-user-email {
            font-size: 0.625rem;
            color: var(--muted-foreground);
        }

        .header-user-chevron {
            display: none;
        }

        @media (min-width: 640px) {
            .header-user-chevron {
                display: block;
            }
        }

        .header-user-chevron svg {
            width: 14px;
            height: 14px;
            color: var(--muted-foreground);
        }

        .content {
            flex: 1;
            padding: 1.5rem 1rem;
            background: var(--background);
        }

        @media (min-width: 768px) {
            .content {
                padding: 2rem 2rem;
            }
        }

        .mobile-overlay {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 50;
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(4px);
        }

        .mobile-sidebar {
            display: none;
            position: fixed;
            left: 0;
            top: 0;
            height: 100%;
            width: 280px;
            background: var(--sidebar);
            border-right: 1px solid var(--sidebar-border);
            z-index: 51;
            box-shadow: 8px 0 32px rgba(0, 0, 0, 0.15);
            transform: translateX(-100%);
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .mobile-sidebar.open {
            display: flex;
            transform: translateX(0);
        }

        .mobile-overlay.open {
            display: block;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .mobile-close {
            position: absolute;
            right: 1rem;
            top: 1rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            border: 1px solid var(--border);
            background: var(--card);
            color: var(--muted-foreground);
            cursor: pointer;
            border-radius: calc(var(--radius) - 2px);
            transition: all 0.15s ease;
        }

        .mobile-close:hover {
            background: var(--accent);
            color: var(--foreground);
            border-color: var(--primary);
        }

        .mobile-close svg {
            width: 18px;
            height: 18px;
        }
    </style>
</head>
<body>
    <div class="dashboard-wrapper">
        <!-- Desktop Sidebar -->
        <aside class="sidebar" id="sidebar">
            <nav class="sidebar-nav">
                <a href="{{ route('dashboard') }}" class="sidebar-brand">
                    <div class="sidebar-brand-icon">T</div>
                    <div class="sidebar-brand-text">
                        <div class="sidebar-brand-name">Tribute Energy</div>
                        <div class="sidebar-brand-subtitle">Admin Panel</div>
                    </div>
                </a>

                <div class="flex-1 space-y-5 overflow-y-auto">
                    <div>
                        <div class="sidebar-section-label">Main</div>
                        <ul class="sidebar-nav-list">
                            <li class="sidebar-nav-item">
                                <a href="{{ route('dashboard') }}" class="{{ request()->is('dashboard') ? 'active' : '' }}">
                                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <div class="sidebar-section-label">Management</div>
                        <ul class="sidebar-nav-list">
                            <li class="sidebar-nav-item">
                                <a href="{{ route('admin.users.index') }}" class="{{ request()->is('admin/users*') ? 'active' : '' }}">
                                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                                    <span>Users</span>
                                </a>
                            </li>
                            <li class="sidebar-nav-item">
                                <a href="{{ route('admin.products.index') }}" class="{{ request()->is('admin/products*') ? 'active' : '' }}">
                                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                                    <span>Products</span>
                                </a>
                            </li>
                            <li class="sidebar-nav-item">
                                <a href="{{ route('admin.gallery.index') }}" class="{{ request()->is('admin/gallery*') ? 'active' : '' }}">
                                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    <span>Gallery</span>
                                </a>
                            </li>
                            <li class="sidebar-nav-item">
                                <a href="#" class="">
                                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                                    <span>Sales</span>
                                </a>
                            </li>
                            <li class="sidebar-nav-item">
                                <a href="#" class="">
                                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                                    <span>Analytics</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <div class="sidebar-section-label">Content</div>
                        <ul class="sidebar-nav-list">
                            <li class="sidebar-nav-item">
                                <a href="#" class="">
                                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                                    <span>Hero Section</span>
                                </a>
                            </li>
                            <li class="sidebar-nav-item">
                                <a href="#" class="">
                                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/></svg>
                                    <span>Features</span>
                                </a>
                            </li>
                            <li class="sidebar-nav-item">
                                <a href="#" class="">
                                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    <span>Testimonials</span>
                                </a>
                            </li>
                            <li class="sidebar-nav-item">
                                <a href="#" class="">
                                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>
                                    <span>Contact Info</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <div class="sidebar-section-label">Settings</div>
                        <ul class="sidebar-nav-list">
                            <li class="sidebar-nav-item">
                                <a href="#" class="">
                                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                    <span>Settings</span>
                                </a>
                            </li>
                            <li class="sidebar-nav-item">
                                <a href="#" class="">
                                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                    <span>Profile</span>
                                </a>
                            </li>
                            <li class="sidebar-nav-item">
                                <form action="{{ route('logout') }}" method="POST" style="display: contents;">
                                    @csrf
                                    <a href="#" onclick="this.closest('form').submit(); return false;" class="logout-btn">
                                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                        <span>Logout</span>
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="sidebar-status">
                    <div class="sidebar-status-header">
                        <span class="sidebar-status-dot"></span>
                        All systems operational
                    </div>
                    <p class="sidebar-status-text">API latency normal · 99.99% uptime</p>
                </div>
            </nav>
        </aside>

        <!-- Mobile Overlay -->
        <div class="mobile-overlay" id="mobileOverlay"></div>

        <!-- Mobile Sidebar -->
        <aside class="mobile-sidebar" id="mobileSidebar">
            <button class="mobile-close" id="mobileClose" aria-label="Close menu">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
            <nav class="sidebar-nav">
                <a href="{{ route('dashboard') }}" class="sidebar-brand">
                    <div class="sidebar-brand-icon">T</div>
                    <div class="sidebar-brand-text">
                        <div class="sidebar-brand-name">Tribute Energy</div>
                        <div class="sidebar-brand-subtitle">Admin Panel</div>
                    </div>
                </a>

                <div class="flex-1 space-y-5 overflow-y-auto">
                    <div>
                        <div class="sidebar-section-label">Main</div>
                        <ul class="sidebar-nav-list">
                            <li class="sidebar-nav-item">
                                <a href="{{ route('dashboard') }}" class="{{ request()->is('dashboard') ? 'active' : '' }}">
                                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <div class="sidebar-section-label">Management</div>
                        <ul class="sidebar-nav-list">
                            <li class="sidebar-nav-item">
                                <a href="{{ route('admin.users.index') }}" class="{{ request()->is('admin/users*') ? 'active' : '' }}">
                                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                                    <span>Users</span>
                                </a>
                            </li>
                            <li class="sidebar-nav-item">
                                <a href="{{ route('admin.products.index') }}" class="{{ request()->is('admin/products*') ? 'active' : '' }}">
                                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                                    <span>Products</span>
                                </a>
                            </li>
                            <li class="sidebar-nav-item">
                                <a href="{{ route('admin.gallery.index') }}" class="{{ request()->is('admin/gallery*') ? 'active' : '' }}">
                                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    <span>Gallery</span>
                                </a>
                            </li>
                            <li class="sidebar-nav-item">
                                <a href="#" class="">
                                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                                    <span>Sales</span>
                                </a>
                            </li>
                            <li class="sidebar-nav-item">
                                <a href="#" class="">
                                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                                    <span>Analytics</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <div class="sidebar-section-label">Content</div>
                        <ul class="sidebar-nav-list">
                            <li class="sidebar-nav-item">
                                <a href="#" class="">
                                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                                    <span>Hero Section</span>
                                </a>
                            </li>
                            <li class="sidebar-nav-item">
                                <a href="#" class="">
                                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/></svg>
                                    <span>Features</span>
                                </a>
                            </li>
                            <li class="sidebar-nav-item">
                                <a href="#" class="">
                                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    <span>Testimonials</span>
                                </a>
                            </li>
                            <li class="sidebar-nav-item">
                                <a href="#" class="">
                                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>
                                    <span>Contact Info</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <div class="sidebar-section-label">Settings</div>
                        <ul class="sidebar-nav-list">
                            <li class="sidebar-nav-item">
                                <a href="#" class="">
                                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                    <span>Settings</span>
                                </a>
                            </li>
                            <li class="sidebar-nav-item">
                                <a href="#" class="">
                                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                    <span>Profile</span>
                                </a>
                            </li>
                            <li class="sidebar-nav-item">
                                <form action="{{ route('logout') }}" method="POST" style="display: contents;">
                                    @csrf
                                    <a href="#" onclick="this.closest('form').submit(); return false;" class="logout-btn">
                                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                        <span>Logout</span>
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </aside>

        <div class="main-content">
            <header class="header">
                <button class="header-toggle mobile-only" id="mobileToggle" aria-label="Open menu">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
                <button class="header-toggle desktop-only" id="sidebarToggle" aria-label="Toggle sidebar">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>

                <div class="header-search">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    <input type="search" placeholder="Search products, customers, sales…">
                </div>

                <div class="header-actions">
                    <button class="header-action-btn" aria-label="Notifications">
                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                        <span class="badge"></span>
                    </button>

                    <div class="header-user">
                        <div class="header-user-avatar">{{ auth()->user()->name ? substr(auth()->user()->name, 0, 1) : 'A' }}</div>
                        <div class="header-user-info">
                            <div class="header-user-name">{{ auth()->user()->name ?? 'Admin' }}</div>
                            <div class="header-user-email">{{ auth()->user()->email ?? '' }}</div>
                        </div>
                        <div class="header-user-chevron">
                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                        </div>
                    </div>
                </div>
            </header>

            <main class="content">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const sidebarToggle = document.getElementById('sidebarToggle');
            const mobileToggle = document.getElementById('mobileToggle');
            const mobileSidebar = document.getElementById('mobileSidebar');
            const mobileOverlay = document.getElementById('mobileOverlay');
            const mobileClose = document.getElementById('mobileClose');

            // Desktop sidebar toggle
            sidebarToggle.addEventListener('click', function() {
                sidebar.classList.toggle('collapsed');
            });

            // Mobile sidebar
            mobileToggle.addEventListener('click', function() {
                mobileSidebar.classList.add('open');
                mobileOverlay.classList.add('open');
            });

            mobileClose.addEventListener('click', function() {
                mobileSidebar.classList.remove('open');
                mobileOverlay.classList.remove('open');
            });

            mobileOverlay.addEventListener('click', function() {
                mobileSidebar.classList.remove('open');
                mobileOverlay.classList.remove('open');
            });
        });
    </script>
</body>
</html>
