@extends('layouts.dashboard')

@push('head')
<style>
    body { background:#f8fafc; }
    .breadcrumb { display:flex;align-items:center;gap:6px;font-size:0.8125rem;color:#94a3b8;margin-bottom:0.75rem; }
    .breadcrumb a { color:#64748b;text-decoration:none; } .breadcrumb a:hover { color:#FF8C00; }
    .page-header { display:flex;align-items:flex-end;justify-content:space-between;margin-bottom:1.5rem;flex-wrap:wrap;gap:1rem; }
    .page-title { font-size:1.375rem;font-weight:700;letter-spacing:-0.03em;color:#0f172a; }
    .page-description { margin-top:0.25rem;font-size:0.8125rem;color:#64748b; }

    .stats-row { display:grid;grid-template-columns:repeat(auto-fit,minmax(160px,1fr));gap:1rem;margin-bottom:1.5rem; }
    .stat-card { background:#fff;border:1px solid #e2e8f0;border-radius:10px;padding:1rem 1.25rem;display:flex;align-items:center;gap:0.875rem; }
    .stat-icon { width:38px;height:38px;border-radius:9px;display:flex;align-items:center;justify-content:center;flex-shrink:0; }
    .stat-icon svg { width:18px;height:18px; }
    .stat-value { font-size:1.25rem;font-weight:700;color:#0f172a; }
    .stat-label { font-size:0.75rem;color:#94a3b8;margin-top:1px; }

    .card { background:#fff;border:1px solid #e2e8f0;border-radius:12px;overflow:hidden; }
    .card-toolbar { display:flex;align-items:center;justify-content:space-between;padding:1.125rem 1.5rem;border-bottom:1px solid #f1f5f9;flex-wrap:wrap;gap:0.75rem; }
    .search-box { position:relative;display:flex;align-items:center; }
    .search-box svg { position:absolute;left:11px;width:15px;height:15px;color:#94a3b8;pointer-events:none; }
    .search-box input { padding:0.5625rem 0.875rem 0.5625rem 2.125rem;border:1px solid #e2e8f0;border-radius:8px;font-size:0.8125rem;color:#374151;outline:none;width:240px;font-family:inherit;transition:border-color 0.15s,box-shadow 0.15s; }
    .search-box input:focus { border-color:#FF8C00;box-shadow:0 0 0 3px rgba(255,140,0,0.1); }
    .filter-row { display:flex;gap:6px;flex-wrap:wrap; }
    .filter-btn { padding:0.4375rem 0.875rem;font-size:0.8125rem;font-weight:600;border:1px solid #e2e8f0;border-radius:7px;background:#fff;color:#64748b;cursor:pointer;transition:all 0.15s;font-family:inherit; }
    .filter-btn:hover,.filter-btn.active { border-color:#FF8C00;color:#FF6B00;background:rgba(255,140,0,0.06); }

    .table-wrap { overflow-x:auto; }
    .data-table { width:100%;border-collapse:collapse; }
    .data-table th { text-align:left;padding:0.75rem 1.5rem;font-size:0.6875rem;font-weight:700;text-transform:uppercase;letter-spacing:0.08em;color:#94a3b8;border-bottom:1px solid #f1f5f9;white-space:nowrap; }
    .data-table td { padding:1rem 1.5rem;font-size:0.875rem;color:#374151;border-bottom:1px solid #f8fafc;vertical-align:middle; }
    .data-table tr:last-child td { border-bottom:none; }
    .data-table tbody tr:hover td { background:#fafafa; }

    .avatar { width:38px;height:38px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:0.875rem;font-weight:700;color:#fff;flex-shrink:0; }
    .user-name { font-weight:600;color:#1e293b; }
    .user-email { font-size:0.75rem;color:#94a3b8;margin-top:1px; }
    .user-joined { font-size:0.8125rem;color:#64748b; }

    .badge { display:inline-flex;align-items:center;gap:3px;font-size:11px;font-weight:600;padding:3px 9px;border-radius:20px;white-space:nowrap; }
    .badge-admin  { background:rgba(255,107,0,0.1);color:#c2410c;border:1px solid rgba(255,107,0,0.2); }
    .badge-user   { background:#f1f5f9;color:#475569; }
    .badge-green  { background:#dcfce7;color:#15803d; }
    .badge-gray   { background:#f1f5f9;color:#94a3b8; }

    .action-btn { display:inline-flex;align-items:center;gap:4px;padding:5px 11px;border-radius:7px;font-size:0.8125rem;font-weight:600;text-decoration:none;border:none;cursor:pointer;font-family:inherit;transition:all 0.15s; }
    .action-edit { background:#eff6ff;color:#1d4ed8; } .action-edit:hover { background:#dbeafe; }
    .action-delete { background:#fee2e2;color:#b91c1c; } .action-delete:hover { background:#fecaca; }
    .action-btn svg { width:12px;height:12px; }

    .btn-primary { display:inline-flex;align-items:center;gap:7px;padding:0.5625rem 1.125rem;background:linear-gradient(135deg,#FF8C00,#FF6B00);color:#fff;border:none;border-radius:8px;font-size:0.875rem;font-weight:700;text-decoration:none;cursor:pointer;font-family:inherit;transition:all 0.2s; }
    .btn-primary:hover { box-shadow:0 4px 14px rgba(255,107,0,0.3);transform:translateY(-1px); }
    .btn-primary svg { width:15px;height:15px; }

    .table-footer { padding:1rem 1.5rem;border-top:1px solid #f1f5f9;font-size:0.8125rem;color:#94a3b8;display:flex;justify-content:space-between;align-items:center; }
    .alert-success { padding:0.875rem 1.25rem;border-radius:8px;font-size:0.8125rem;font-weight:500;margin-bottom:1.25rem;display:flex;align-items:center;gap:0.75rem;background:#dcfce7;color:#15803d;border:1px solid #bbf7d0; }
    .alert-success svg { width:16px;height:16px;flex-shrink:0; }
    .empty-state { padding:3.5rem 2rem;text-align:center;color:#94a3b8; }
    .empty-state svg { width:48px;height:48px;margin:0 auto 0.875rem;color:#e2e8f0; }
    .empty-state h3 { font-size:1rem;font-weight:700;color:#475569;margin-bottom:0.25rem; }
</style>
@endpush

@section('content')
@if(session('success'))
<div class="alert-success">
    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
    {{ session('success') }}
</div>
@endif

<div class="breadcrumb">
    <a href="{{ route('dashboard') }}">Dashboard</a> <span>›</span> <span style="color:#0f172a;">Users</span>
</div>

<div class="page-header">
    <div>
        <h1 class="page-title">Users</h1>
        <p class="page-description">{{ $users->count() }} registered accounts</p>
    </div>
    <a href="{{ route('admin.users.create') }}" class="btn-primary">
        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
        Add User
    </a>
</div>

{{-- Stats --}}
@php
    $totalUsers  = $users->count();
    $adminCount  = $users->filter(fn($u) => $u->roles->count() > 0)->count();
    $regularCount = $totalUsers - $adminCount;
    $recentCount = $users->where('created_at', '>=', now()->subDays(7))->count();
@endphp
<div class="stats-row">
    <div class="stat-card">
        <div class="stat-icon" style="background:rgba(255,140,0,0.1);">
            <svg fill="none" viewBox="0 0 24 24" stroke="#FF8C00" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
        </div>
        <div><div class="stat-value">{{ $totalUsers }}</div><div class="stat-label">Total Users</div></div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:rgba(239,68,68,0.1);">
            <svg fill="none" viewBox="0 0 24 24" stroke="#ef4444" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
        </div>
        <div><div class="stat-value">{{ $adminCount }}</div><div class="stat-label">Admins</div></div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:rgba(16,185,129,0.1);">
            <svg fill="none" viewBox="0 0 24 24" stroke="#10b981" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
        </div>
        <div><div class="stat-value">{{ $regularCount }}</div><div class="stat-label">Regular</div></div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:rgba(99,102,241,0.1);">
            <svg fill="none" viewBox="0 0 24 24" stroke="#6366f1" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
        </div>
        <div><div class="stat-value">{{ $recentCount }}</div><div class="stat-label">New this week</div></div>
    </div>
</div>

<div class="card">
    <div class="card-toolbar">
        <div class="search-box">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            <input type="text" id="userSearch" placeholder="Search users…" oninput="filterUsers()">
        </div>
        <div class="filter-row">
            <button class="filter-btn active" onclick="setFilter('all',this)">All</button>
            <button class="filter-btn" onclick="setFilter('admin',this)">Admins</button>
            <button class="filter-btn" onclick="setFilter('user',this)">Regular</button>
        </div>
    </div>

    <div class="table-wrap">
        <table class="data-table" id="usersTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Role</th>
                    <th>Joined</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                @php
                    $isAdmin = $user->roles->count() > 0;
                    $colors  = ['#FF6B00','#6366f1','#10b981','#f59e0b','#3b82f6','#ec4899'];
                    $color   = $colors[$loop->index % count($colors)];
                @endphp
                <tr data-name="{{ strtolower($user->name) }} {{ strtolower($user->email) }}"
                    data-role="{{ $isAdmin ? 'admin' : 'user' }}">
                    <td style="color:#cbd5e1;font-size:0.75rem;width:36px;">{{ $loop->iteration }}</td>
                    <td>
                        <div style="display:flex;align-items:center;gap:0.75rem;">
                            <div class="avatar" style="background:{{ $color }};">{{ strtoupper(substr($user->name,0,1)) }}</div>
                            <div>
                                <div class="user-name">{{ $user->name }}</div>
                                <div class="user-email">{{ $user->email }}</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        @if($isAdmin)
                            @foreach($user->roles as $role)
                                <span class="badge badge-admin">
                                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="width:10px;height:10px;"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                                    {{ $role->name }}
                                </span>
                            @endforeach
                        @else
                            <span class="badge badge-user">User</span>
                        @endif
                    </td>
                    <td class="user-joined">{{ $user->created_at->format('M d, Y') }}</td>
                    <td>
                        <div style="display:flex;gap:6px;">
                            <a href="{{ route('admin.users.edit', $user) }}" class="action-btn action-edit">
                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                Edit
                            </a>
                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button type="submit" class="action-btn action-delete"
                                        onclick="return confirm('Delete {{ addslashes($user->name) }}?')">
                                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5"><div class="empty-state">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    <h3>No users yet</h3>
                    <p>Create the first user account.</p>
                    <a href="{{ route('admin.users.create') }}" class="btn-primary" style="margin-top:1rem;display:inline-flex;">Add User</a>
                </div></td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="table-footer">
        <span>Showing <strong id="visibleCount">{{ $users->count() }}</strong> of {{ $users->count() }} users</span>
    </div>
</div>

<script>
let currentFilter = 'all';
function setFilter(f, btn) {
    currentFilter = f;
    document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    filterUsers();
}
function filterUsers() {
    const q = document.getElementById('userSearch').value.toLowerCase();
    const rows = document.querySelectorAll('#usersTable tbody tr[data-name]');
    let n = 0;
    rows.forEach(r => {
        const name = r.dataset.name, role = r.dataset.role;
        const matchQ = !q || name.includes(q);
        const matchF = currentFilter === 'all' || role === currentFilter;
        r.style.display = matchQ && matchF ? '' : 'none';
        if (matchQ && matchF) n++;
    });
    document.getElementById('visibleCount').textContent = n;
}
</script>
@endsection
