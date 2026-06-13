@extends('layouts.dashboard')

@section('content')
<div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
    <div>
        <h1 class="text-2xl font-semibold tracking-tight" style="color: var(--foreground);">Dashboard</h1>
        <p class="mt-1 text-sm" style="color: var(--muted-foreground);">Welcome back! Here's what's happening with your business today.</p>
    </div>
</div>

<div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
    <div style="background: var(--card); border: 1px solid var(--border); border-radius: 8px; padding: 1.5rem;">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium" style="color: var(--muted-foreground);">Total Revenue</p>
                <p class="text-2xl font-bold mt-1" style="color: var(--foreground);">$45,231.89</p>
                <p class="text-xs mt-1" style="color: #16a34a;">+20.1% from last month</p>
            </div>
            <div style="width: 40px; height: 40px; border-radius: 8px; background: rgba(255, 140, 0, 0.1); display: flex; align-items: center; justify-content: center;">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="width: 20px; height: 20px; color: var(--primary);"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
        </div>
    </div>

    <div style="background: var(--card); border: 1px solid var(--border); border-radius: 8px; padding: 1.5rem;">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium" style="color: var(--muted-foreground);">Sales</p>
                <p class="text-2xl font-bold mt-1" style="color: var(--foreground);">+2350</p>
                <p class="text-xs mt-1" style="color: #16a34a;">+180.1% from last month</p>
            </div>
            <div style="width: 40px; height: 40px; border-radius: 8px; background: rgba(255, 140, 0, 0.1); display: flex; align-items: center; justify-content: center;">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="width: 20px; height: 20px; color: var(--primary);"><path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
            </div>
        </div>
    </div>

    <div style="background: var(--card); border: 1px solid var(--border); border-radius: 8px; padding: 1.5rem;">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium" style="color: var(--muted-foreground);">Active Users</p>
                <p class="text-2xl font-bold mt-1" style="color: var(--foreground);">+12,234</p>
                <p class="text-xs mt-1" style="color: #16a34a;">+19% from last month</p>
            </div>
            <div style="width: 40px; height: 40px; border-radius: 8px; background: rgba(255, 140, 0, 0.1); display: flex; align-items: center; justify-content: center;">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="width: 20px; height: 20px; color: var(--primary);"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
            </div>
        </div>
    </div>

    <div style="background: var(--card); border: 1px solid var(--border); border-radius: 8px; padding: 1.5rem;">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium" style="color: var(--muted-foreground);">Active Now</p>
                <p class="text-2xl font-bold mt-1" style="color: var(--foreground);">+573</p>
                <p class="text-xs mt-1" style="color: var(--muted-foreground);">+201 since last hour</p>
            </div>
            <div style="width: 40px; height: 40px; border-radius: 8px; background: rgba(255, 140, 0, 0.1); display: flex; align-items: center; justify-content: center;">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="width: 20px; height: 20px; color: var(--primary);"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
            </div>
        </div>
    </div>
</div>

<div class="mt-6 grid grid-cols-1 gap-6 lg:grid-cols-7">
    <div style="background: var(--card); border: 1px solid var(--border); border-radius: 8px; padding: 1.5rem; grid-column: span 4;">
        <h3 class="text-lg font-semibold mb-4" style="color: var(--foreground);">Overview</h3>
        <div style="height: 300px; display: flex; align-items: center; justify-content: center; background: var(--muted); border-radius: 6px;">
            <p style="color: var(--muted-foreground);">Chart placeholder - Add your chart library here</p>
        </div>
    </div>

    <div style="background: var(--card); border: 1px solid var(--border); border-radius: 8px; padding: 1.5rem; grid-column: span 3;">
        <h3 class="text-lg font-semibold mb-4" style="color: var(--foreground);">Recent Sales</h3>
        <div class="space-y-4">
            <div class="flex items-center">
                <div style="width: 40px; height: 40px; border-radius: 50%; background: rgba(255, 140, 0, 0.1); display: flex; align-items: center; justify-content: center; color: var(--primary); font-weight: 600;">OM</div>
                <div class="ml-4 flex-1">
                    <p class="text-sm font-medium" style="color: var(--foreground);">Olivia Martin</p>
                    <p class="text-xs" style="color: var(--muted-foreground);">olivia.martin@email.com</p>
                </div>
                <p class="text-sm font-medium" style="color: var(--foreground);">+$1,999.00</p>
            </div>
            <div class="flex items-center">
                <div style="width: 40px; height: 40px; border-radius: 50%; background: rgba(255, 140, 0, 0.1); display: flex; align-items: center; justify-content: center; color: var(--primary); font-weight: 600;">JL</div>
                <div class="ml-4 flex-1">
                    <p class="text-sm font-medium" style="color: var(--foreground);">Jackson Lee</p>
                    <p class="text-xs" style="color: var(--muted-foreground);">jackson.lee@email.com</p>
                </div>
                <p class="text-sm font-medium" style="color: var(--foreground);">+$39.00</p>
            </div>
            <div class="flex items-center">
                <div style="width: 40px; height: 40px; border-radius: 50%; background: rgba(255, 140, 0, 0.1); display: flex; align-items: center; justify-content: center; color: var(--primary); font-weight: 600;">IS</div>
                <div class="ml-4 flex-1">
                    <p class="text-sm font-medium" style="color: var(--foreground);">Isabella Nguyen</p>
                    <p class="text-xs" style="color: var(--muted-foreground);">isabella.nguyen@email.com</p>
                </div>
                <p class="text-sm font-medium" style="color: var(--foreground);">+$299.00</p>
            </div>
            <div class="flex items-center">
                <div style="width: 40px; height: 40px; border-radius: 50%; background: rgba(255, 140, 0, 0.1); display: flex; align-items: center; justify-content: center; color: var(--primary); font-weight: 600;">WK</div>
                <div class="ml-4 flex-1">
                    <p class="text-sm font-medium" style="color: var(--foreground);">William Kim</p>
                    <p class="text-xs" style="color: var(--muted-foreground);">will@email.com</p>
                </div>
                <p class="text-sm font-medium" style="color: var(--foreground);">+$99.00</p>
            </div>
            <div class="flex items-center">
                <div style="width: 40px; height: 40px; border-radius: 50%; background: rgba(255, 140, 0, 0.1); display: flex; align-items: center; justify-content: center; color: var(--primary); font-weight: 600;">SC</div>
                <div class="ml-4 flex-1">
                    <p class="text-sm font-medium" style="color: var(--foreground);">Sofia Cooper</p>
                    <p class="text-xs" style="color: var(--muted-foreground);">sofia.cooper@email.com</p>
                </div>
                <p class="text-sm font-medium" style="color: var(--foreground);">+$39.00</p>
            </div>
        </div>
    </div>
</div>
@endsection
