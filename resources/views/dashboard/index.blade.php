@extends('layouts.dashboard')

@push('head')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<style>
    body { background: linear-gradient(135deg, #f8fafc 0%, #fff7ed 100%); }

    .page-header {
        display: flex; align-items: flex-end; justify-content: space-between;
        margin-bottom: 1.75rem; flex-wrap: wrap; gap: 1rem;
    }
    .page-title { font-size: 1.875rem; font-weight: 800; letter-spacing: -0.03em; color: #0f172a; }
    .page-description { margin-top: 0.25rem; font-size: 0.9375rem; color: #64748b; }

    /* Stats grid */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 1.25rem;
        margin-bottom: 1.75rem;
    }

    .stat-card {
        background: linear-gradient(135deg, #ffffff 0%, #fff7ed 100%);
        border: 1px solid #ffedd5;
        border-radius: 16px;
        padding: 1.5rem;
        display: flex; align-items: center; gap: 1.25rem;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative; overflow: hidden;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }
    .stat-card::before {
        content: ''; position: absolute; top: 0; left: 0;
        width: 4px; height: 100%;
        background: var(--stat-color, #FF8C00);
        border-radius: 4px 0 0 4px;
    }
    .stat-card:hover { 
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        transform: translateY(-4px);
    }

    .stat-icon-wrap {
        width: 56px; height: 56px; border-radius: 14px; flex-shrink: 0;
        display: flex; align-items: center; justify-content: center;
        background: var(--stat-bg, rgba(255,140,0,0.12));
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }
    .stat-icon-wrap svg { width: 28px; height: 28px; color: var(--stat-color, #FF8C00); }

    .stat-body { flex: 1; min-width: 0; }
    .stat-label { font-size: 0.8125rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em; color: #94a3b8; }
    .stat-value { font-size: 2rem; font-weight: 800; color: #0f172a; letter-spacing: -0.04em; line-height: 1.1; margin-top: 0.25rem; }
    .stat-sub { font-size: 0.8125rem; color: #64748b; margin-top: 0.375rem; display: flex; align-items: center; gap: 6px; }
    .stat-badge-up   { color: #16a34a; background: #dcfce7; padding: 2px 8px; border-radius: 20px; font-weight: 700; font-size: 12px; }
    .stat-badge-down { color: #dc2626; background: #fee2e2; padding: 2px 8px; border-radius: 20px; font-weight: 700; font-size: 12px; }

    /* Content grid */
    .content-row { display: grid; gap: 1.25rem; margin-bottom: 1.25rem; }
    .content-row-2 { grid-template-columns: 1fr; }
    @media(min-width:1024px) { .content-row-2 { grid-template-columns: 2fr 1fr; } }
    .content-row-3 { grid-template-columns: 1fr; }
    @media(min-width:900px) { .content-row-3 { grid-template-columns: repeat(2,1fr); } }
    @media(min-width:1200px) { .content-row-3 { grid-template-columns: 5fr 4fr 3fr; } }

    /* Cards */
    .card {
        background: linear-gradient(135deg, #ffffff 0%, #fff7ed 100%);
        border: 1px solid #ffedd5;
        border-radius: 16px; overflow: hidden;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .card:hover {
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
    .card-header {
        display: flex; align-items: center; justify-content: space-between;
        padding: 1.25rem 1.5rem; border-bottom: 1px solid #ffedd5;
        background: rgba(255, 255, 255, 0.5);
    }
    .card-title { font-size: 1.0625rem; font-weight: 800; color: #0f172a; letter-spacing: -0.02em; }
    .card-subtitle { font-size: 0.8125rem; color: #94a3b8; margin-top: 2px; }
    .card-body { padding: 1.5rem; }
    .card-action {
        font-size: 0.8125rem; font-weight: 700; color: #FF8C00; text-decoration: none;
        padding: 6px 14px; border: 1px solid rgba(255,140,0,0.3); border-radius: 8px;
        transition: all 0.2s;
    }
    .card-action:hover { background: rgba(255,140,0,0.1); }

    /* Chart container */
    .chart-wrap { position: relative; height: 280px; }

    /* Table */
    .data-table { width: 100%; border-collapse: collapse; }
    .data-table th {
        text-align: left; padding: 0.75rem 1rem;
        font-size: 0.75rem; font-weight: 700; text-transform: uppercase;
        letter-spacing: 0.08em; color: #94a3b8;
        border-bottom: 1px solid #ffedd5; white-space: nowrap;
    }
    .data-table td {
        padding: 1rem; font-size: 0.875rem; color: #374151;
        border-bottom: 1px solid #fff7ed; vertical-align: middle;
    }
    .data-table tr:last-child td { border-bottom: none; }
    .data-table tbody tr:hover td { background: rgba(255, 140, 0, 0.05); }

    /* Avatar */
    .avatar {
        width: 40px; height: 40px; border-radius: 50%; flex-shrink: 0;
        display: flex; align-items: center; justify-content: center;
        font-weight: 800; font-size: 0.875rem;
        background: linear-gradient(135deg, rgba(255,140,0,0.2), rgba(255,107,0,0.2));
        color: #FF6B00; border: 2px solid rgba(255,140,0,0.3);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    /* Badges */
    .badge {
        display: inline-flex; align-items: center; gap: 4px;
        font-size: 11px; font-weight: 700; padding: 3px 10px;
        border-radius: 20px; white-space: nowrap;
    }
    .badge-green  { background: #dcfce7; color: #15803d; }
    .badge-red    { background: #fee2e2; color: #b91c1c; }
    .badge-orange { background: #fff7ed; color: #c2410c; border: 1px solid #fed7aa; }
    .badge-blue   { background: #eff6ff; color: #1d4ed8; }
    .badge-gray   { background: #f1f5f9; color: #475569; }

    /* Product mini card */
    .product-row { display: flex; align-items: center; gap: 1rem; padding: 0.875rem 0; border-bottom: 1px solid #fff7ed; }
    .product-row:last-child { border-bottom: none; }
    .product-swatch { width: 44px; height: 44px; border-radius: 10px; flex-shrink: 0; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); }
    .product-name { font-size: 0.875rem; font-weight: 700; color: #1e293b; }
    .product-cat  { font-size: 0.75rem; color: #94a3b8; margin-top: 2px; text-transform: capitalize; }
    .product-price { font-size: 0.9375rem; font-weight: 800; color: #FF6B00; margin-left: auto; }

    /* Quick action buttons */
    .quick-actions { display: flex; gap: 0.875rem; flex-wrap: wrap; }
    .quick-btn {
        display: flex; align-items: center; gap: 0.625rem;
        padding: 0.75rem 1.25rem; border-radius: 10px; font-size: 0.875rem; font-weight: 700;
        text-decoration: none; border: 1px solid; transition: all 0.2s; cursor: pointer;
    }
    .quick-btn svg { width: 18px; height: 18px; }
    .quick-btn-primary { background: linear-gradient(135deg,#FF8C00,#FF6B00); color:#fff; border-color: transparent; box-shadow: 0 4px 6px rgba(255, 107, 0, 0.2); }
    .quick-btn-primary:hover { box-shadow: 0 8px 12px rgba(255,107,0,0.3); transform: translateY(-2px); }
    .quick-btn-outline { background: #fff; color: #374151; border-color: #e2e8f0; }
    .quick-btn-outline:hover { background: #f8fafc; border-color: #cbd5e1; }
</style>
@endpush

@section('content')

{{-- Page header --}}
<div class="page-header animate__animated animate__fadeInDown">
    <div>
        <h1 class="page-title">Dashboard</h1>
        <p class="page-description">{{ now()->format('l, F j, Y') }} — Welcome back, {{ auth()->user()->name ?? 'Admin' }}</p>
    </div>
    <div class="quick-actions">
        <a href="{{ route('admin.products.create') }}" class="quick-btn quick-btn-primary animate__animated animate__pulse">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
            Add Product
        </a>
        <a href="{{ route('admin.users.create') }}" class="quick-btn quick-btn-outline">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
            Add User
        </a>
    </div>
</div>

{{-- Stats --}}
<div class="stats-grid">
    <div class="stat-card animate__animated animate__fadeInUp" style="--stat-color:#FF8C00;--stat-bg:rgba(255,140,0,0.08); animation-delay: 0.1s;">
        <div class="stat-icon-wrap">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
        </div>
        <div class="stat-body">
            <div class="stat-label">Total Products</div>
            <div class="stat-value">{{ number_format($stats['total_products']) }}</div>
            <div class="stat-sub">
                <span class="stat-badge-up">{{ $stats['active_products'] }} active</span>
            </div>
        </div>
    </div>

    <div class="stat-card animate__animated animate__fadeInUp" style="--stat-color:#6366f1;--stat-bg:rgba(99,102,241,0.08); animation-delay: 0.2s;">
        <div class="stat-icon-wrap">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
        </div>
        <div class="stat-body">
            <div class="stat-label">Registered Users</div>
            <div class="stat-value">{{ number_format($stats['total_users']) }}</div>
            <div class="stat-sub">All time registrations</div>
        </div>
    </div>

    <div class="stat-card animate__animated animate__fadeInUp" style="--stat-color:#0ea5e9;--stat-bg:rgba(14,165,233,0.08); animation-delay: 0.3s;">
        <div class="stat-icon-wrap">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
        </div>
        <div class="stat-body">
            <div class="stat-label">Total Orders</div>
            <div class="stat-value">{{ number_format($stats['total_orders']) }}</div>
            <div class="stat-sub">
                @if($stats['pending_orders'] > 0)
                    <span class="stat-badge-down">{{ $stats['pending_orders'] }} pending</span>
                @else
                    <span class="stat-badge-up">All fulfilled</span>
                @endif
            </div>
        </div>
    </div>

    <div class="stat-card animate__animated animate__fadeInUp" style="--stat-color:#10b981;--stat-bg:rgba(16,185,129,0.08); animation-delay: 0.4s;">
        <div class="stat-icon-wrap">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </div>
        <div class="stat-body">
            <div class="stat-label">Total Revenue</div>
            <div class="stat-value">TZS {{ number_format($stats['total_revenue'] / 1000, 1) }}K</div>
            <div class="stat-sub">Completed orders</div>
        </div>
    </div>
</div>

{{-- Charts row --}}
<div class="content-row content-row-2" style="margin-bottom:1.25rem;">
    {{-- Revenue line chart --}}
    <div class="card animate__animated animate__fadeInLeft" style="animation-delay: 0.5s;">
        <div class="card-header">
            <div>
                <div class="card-title">Revenue &amp; Orders Overview</div>
                <div class="card-subtitle">Last 7 months performance</div>
            </div>
            <div style="display:flex;gap:1rem;font-size:0.75rem;color:#94a3b8;">
                <span style="display:flex;align-items:center;gap:5px;"><span style="width:10px;height:10px;border-radius:50%;background:#FF8C00;display:inline-block;"></span>Revenue</span>
                <span style="display:flex;align-items:center;gap:5px;"><span style="width:10px;height:10px;border-radius:50%;background:#6366f1;display:inline-block;"></span>Orders</span>
            </div>
        </div>
        <div class="card-body">
            <div class="chart-wrap"><canvas id="revenueChart"></canvas></div>
        </div>
    </div>

    {{-- Doughnut chart --}}
    <div class="card animate__animated animate__fadeInRight" style="animation-delay: 0.6s;">
        <div class="card-header">
            <div>
                <div class="card-title">Product Categories</div>
                <div class="card-subtitle">Distribution by type</div>
            </div>
        </div>
        <div class="card-body">
            <div class="chart-wrap" style="height:200px;"><canvas id="catChart"></canvas></div>
            <div id="cat-legend" style="margin-top:1rem;display:flex;flex-direction:column;gap:0.5rem;font-size:0.75rem;"></div>
        </div>
    </div>
</div>

{{-- Tables row --}}
<div class="content-row content-row-2">
    {{-- Recent Users --}}
    <div class="card animate__animated animate__fadeInUp" style="animation-delay: 0.7s;">
        <div class="card-header">
            <div>
                <div class="card-title">Recent Users</div>
                <div class="card-subtitle">Latest registered members</div>
            </div>
            <a href="{{ route('admin.users.index') }}" class="card-action">View all →</a>
        </div>
        <div style="overflow-x:auto;">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Role</th>
                        <th>Joined</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recent_users as $u)
                    <tr>
                        <td>
                            <div style="display:flex;align-items:center;gap:0.75rem;">
                                <div class="avatar">{{ strtoupper(substr($u->name, 0, 1)) }}</div>
                                <div>
                                    <div style="font-weight:700;color:#1e293b;font-size:0.875rem;">{{ $u->name }}</div>
                                    <div style="font-size:0.75rem;color:#94a3b8;">{{ $u->email }}</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            @if($u->isAdmin())
                                <span class="badge badge-orange">Admin</span>
                            @else
                                <span class="badge badge-gray">User</span>
                            @endif
                        </td>
                        <td style="color:#94a3b8;font-size:0.8125rem;white-space:nowrap;">{{ $u->created_at->format('M d') }}</td>
                        <td>
                            <a href="{{ route('admin.users.edit', $u) }}" style="color:#FF8C00;font-size:0.8125rem;font-weight:700;text-decoration:none;">Edit</a>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="4" style="text-align:center;color:#94a3b8;padding:2rem;">No users yet</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Recent Products --}}
    <div class="card animate__animated animate__fadeInUp" style="animation-delay: 0.8s;">
        <div class="card-header">
            <div>
                <div class="card-title">Recent Products</div>
                <div class="card-subtitle">Latest added products</div>
            </div>
            <a href="{{ route('admin.products.index') }}" class="card-action">View all →</a>
        </div>
        <div class="card-body" style="padding-top:0.5rem;">
            @forelse($recent_products as $p)
            <div class="product-row">
                <div class="product-swatch"
                     style="background:{{ $p->color ?: 'linear-gradient(135deg,#FF8C00,#FF6B00)' }};"></div>
                <div style="flex:1;min-width:0;">
                    <div class="product-name">{{ Str::limit($p->name, 30) }}</div>
                    <div class="product-cat">{{ $p->category ?? 'General' }}</div>
                </div>
                <div>
                    <div class="product-price">TZS {{ number_format($p->price) }}</div>
                    @if($p->is_active)
                        <span class="badge badge-green" style="float:right;margin-top:3px;">Active</span>
                    @else
                        <span class="badge badge-red" style="float:right;margin-top:3px;">Off</span>
                    @endif
                </div>
            </div>
            @empty
            <div style="text-align:center;color:#94a3b8;padding:2rem;">No products yet</div>
            @endforelse
        </div>
    </div>
</div>

<script>
(function() {
    const months  = @json(array_column($months, 'label'));
    const revenue = @json(array_column($months, 'revenue'));
    const orders  = @json(array_column($months, 'orders'));

    // Revenue + Orders line chart
    new Chart(document.getElementById('revenueChart'), {
        type: 'line',
        data: {
            labels: months,
            datasets: [
                {
                    label: 'Revenue (TZS)',
                    data: revenue,
                    borderColor: '#FF8C00',
                    backgroundColor: 'rgba(255,140,0,0.08)',
                    borderWidth: 2.5,
                    pointBackgroundColor: '#FF8C00',
                    pointRadius: 4,
                    pointHoverRadius: 6,
                    fill: true,
                    tension: 0.4,
                    yAxisID: 'y',
                },
                {
                    label: 'Orders',
                    data: orders,
                    borderColor: '#6366f1',
                    backgroundColor: 'rgba(99,102,241,0.06)',
                    borderWidth: 2,
                    pointBackgroundColor: '#6366f1',
                    pointRadius: 4,
                    pointHoverRadius: 6,
                    fill: false,
                    tension: 0.4,
                    yAxisID: 'y1',
                }
            ]
        },
        options: {
            responsive: true, maintainAspectRatio: false,
            interaction: { mode: 'index', intersect: false },
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: '#1e293b', titleColor: '#f8fafc', bodyColor: '#cbd5e1',
                    padding: 12, cornerRadius: 8,
                    callbacks: {
                        label: ctx => ctx.datasetIndex === 0
                            ? ' TZS ' + ctx.raw.toLocaleString()
                            : ' ' + ctx.raw + ' orders'
                    }
                }
            },
            scales: {
                x: { grid: { color: '#f1f5f9' }, ticks: { color: '#94a3b8', font: { size: 11 } } },
                y:  { position: 'left',  grid: { color: '#f1f5f9' }, ticks: { color: '#94a3b8', font: { size: 11 }, callback: v => 'TZS ' + (v/1000).toFixed(0) + 'K' } },
                y1: { position: 'right', grid: { display: false }, ticks: { color: '#94a3b8', font: { size: 11 } } }
            }
        }
    });

    // Category doughnut chart
    const catData  = @json(\App\Models\Product::where('is_active',true)->with('category')->get()->groupBy('category.name')->map->count());
    const catLabels = Object.keys(catData).map(k => k || 'Uncategorized');
    const catVals   = Object.values(catData);
    const colors    = ['#FF8C00','#6366f1','#10b981','#0ea5e9','#f59e0b','#ef4444','#8b5cf6','#ec4899'];

    new Chart(document.getElementById('catChart'), {
        type: 'doughnut',
        data: {
            labels: catLabels,
            datasets: [{ data: catVals, backgroundColor: colors, borderWidth: 2, borderColor: '#fff', hoverOffset: 4 }]
        },
        options: {
            responsive: true, maintainAspectRatio: false, cutout: '65%',
            plugins: { legend: { display: false }, tooltip: { backgroundColor: '#1e293b', titleColor: '#f8fafc', bodyColor: '#cbd5e1', padding: 10, cornerRadius: 8 } }
        }
    });

    // Build legend
    const legend = document.getElementById('cat-legend');
    catLabels.forEach((l, i) => {
        legend.innerHTML += `<div style="display:flex;align-items:center;justify-content:space-between;">
            <div style="display:flex;align-items:center;gap:6px;">
                <span style="width:10px;height:10px;border-radius:3px;background:${colors[i]};display:inline-block;flex-shrink:0;"></span>
                <span style="color:#475569;text-transform:capitalize;">${l || 'General'}</span>
            </div>
            <span style="font-weight:700;color:#1e293b;">${catVals[i]}</span>
        </div>`;
    });
    if (!catLabels.length) legend.innerHTML = '<p style="color:#94a3b8;text-align:center;">No products yet</p>';
})();
</script>
@endsection
