@extends('layouts.dashboard')

@push('head')
<style>
    body { background: linear-gradient(135deg, #f8fafc 0%, #fff7ed 100%); }
    .page-header { display:flex;align-items:flex-end;justify-content:space-between;margin-bottom:1.75rem;flex-wrap:wrap;gap:1rem; }
    .page-title { font-size:1.875rem;font-weight:800;letter-spacing:-0.03em;color:#0f172a; }
    .page-description { margin-top:0.25rem;font-size:0.9375rem;color:#64748b; }

    .card { background:linear-gradient(135deg, #ffffff 0%, #fff7ed 100%);border:1px solid #ffedd5;border-radius:16px;overflow:hidden;box-shadow:0 4px 6px -1px rgba(0,0,0,0.1),0 2px 4px -1px rgba(0,0,0,0.06);transition:all 0.3s cubic-bezier(0.4,0,0.2,1); }
    .card:hover { box-shadow:0 20px 25px -5px rgba(0,0,0,0.1),0 10px 10px -5px rgba(0,0,0,0.04); }
    .card-toolbar { display:flex;align-items:center;justify-content:space-between;padding:1.25rem 1.5rem;border-bottom:1px solid #ffedd5;flex-wrap:wrap;gap:0.875rem;background:rgba(255,255,255,0.5); }

    .search-box { position:relative;display:flex;align-items:center; }
    .search-box svg { position:absolute;left:12px;width:16px;height:16px;color:#94a3b8;pointer-events:none; }
    .search-box input { padding:0.625rem 0.875rem 0.625rem 2.25rem;border:1px solid #e2e8f0;border-radius:10px;font-size:0.875rem;color:#374151;outline:none;width:260px;font-family:inherit;transition:border-color 0.2s,box-shadow 0.2s; }
    .search-box input:focus { border-color:#FF8C00;box-shadow:0 0 0 3px rgba(255,140,0,0.1); }

    .filter-row { display:flex;gap:0.625rem;flex-wrap:wrap; }
    .filter-btn { padding:0.5rem 1rem;font-size:0.8125rem;font-weight:700;border:1px solid #e2e8f0;border-radius:8px;background:#fff;color:#64748b;cursor:pointer;transition:all 0.2s;font-family:inherit; }
    .filter-btn:hover,.filter-btn.active { border-color:#FF8C00;color:#FF6B00;background:rgba(255,140,0,0.08); }

    .table-wrap { overflow-x:auto; }
    .data-table { width:100%;border-collapse:collapse; }
    .data-table th { text-align:left;padding:0.875rem 1.5rem;font-size:0.75rem;font-weight:700;text-transform:uppercase;letter-spacing:0.08em;color:#94a3b8;border-bottom:1px solid #ffedd5;white-space:nowrap; }
    .data-table td { padding:1.125rem 1.5rem;font-size:0.875rem;color:#374151;border-bottom:1px solid #fff7ed;vertical-align:middle; }
    .data-table tr:last-child td { border-bottom:none; }
    .data-table tbody tr:hover td { background:rgba(255,140,0,0.05); }

    .product-thumb { width:44px;height:44px;border-radius:10px;flex-shrink:0;display:flex;align-items:center;justify-content:center;font-size:0.8125rem;font-weight:800;color:#fff;box-shadow:0 2px 4px rgba(0,0,0,0.1); }

    .badge { display:inline-flex;align-items:center;gap:4px;font-size:11px;font-weight:700;padding:3px 10px;border-radius:20px;white-space:nowrap; }
    .badge-green  { background:#dcfce7;color:#15803d; }
    .badge-red    { background:#fee2e2;color:#b91c1c; }
    .badge-orange { background:#fff7ed;color:#c2410c;border:1px solid #fed7aa; }
    .badge-blue   { background:#eff6ff;color:#1d4ed8; }
    .badge-gray   { background:#f1f5f9;color:#475569; }
    .badge-purple { background:#f5f3ff;color:#6d28d9; }

    .action-btn { display:inline-flex;align-items:center;gap:5px;padding:6px 12px;border-radius:8px;font-size:0.8125rem;font-weight:700;text-decoration:none;border:none;cursor:pointer;font-family:inherit;transition:all 0.2s; }
    .action-edit   { background:#eff6ff;color:#1d4ed8; }
    .action-edit:hover   { background:#dbeafe; }
    .action-delete { background:#fee2e2;color:#b91c1c; }
    .action-delete:hover { background:#fecaca; }
    .action-view   { background:#f1f5f9;color:#475569; }
    .action-view:hover   { background:#e2e8f0; }

    .btn-primary { display:inline-flex;align-items:center;gap:8px;padding:0.625rem 1.25rem;background:linear-gradient(135deg,#FF8C00,#FF6B00);color:#fff;border:none;border-radius:10px;font-size:0.875rem;font-weight:700;text-decoration:none;cursor:pointer;font-family:inherit;transition:all 0.2s;box-shadow:0 4px 6px rgba(255,107,0,0.2); }
    .btn-primary:hover { box-shadow:0 8px 12px rgba(255,107,0,0.3);transform:translateY(-2px); }
    .btn-primary svg { width:16px;height:16px; }

    .empty-state { padding:4rem 2rem;text-align:center;color:#94a3b8; }
    .empty-state svg { width:56px;height:56px;margin:0 auto 1rem;color:#e2e8f0; }
    .empty-state h3 { font-size:1.125rem;font-weight:700;color:#475569;margin-bottom:0.375rem; }

    .alert { padding:1rem 1.5rem;border-radius:10px;font-size:0.875rem;font-weight:600;margin-bottom:1.5rem;display:flex;align-items:center;gap:0.875rem; }
    .alert-success { background:#dcfce7;color:#15803d;border:1px solid #bbf7d0; }
    .alert svg { width:18px;height:18px;flex-shrink:0; }

    .pagination { display:flex;align-items:center;justify-content:between;padding:1.25rem 1.5rem;border-top:1px solid #ffedd5;font-size:0.875rem;color:#64748b; }
    .count-info { color:#64748b;font-size:0.875rem; }
</style>
@endpush

@section('content')

@if(session('success'))
<div class="alert alert-success animate__animated animate__fadeInDown">
    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
    {{ session('success') }}
</div>
@endif

<div class="page-header animate__animated animate__fadeInDown">
    <div>
        <h1 class="page-title">Products</h1>
        <p class="page-description">{{ $products->count() }} products total — manage your inventory</p>
    </div>
    <a href="{{ route('admin.products.create') }}" class="btn-primary animate__animated animate__pulse">
        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
        Add Product
    </a>
</div>

<div class="card animate__animated animate__fadeInUp" style="animation-delay: 0.1s;">
    {{-- Toolbar --}}
    <div class="card-toolbar">
        <div class="search-box">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            <input type="text" id="productSearch" placeholder="Search products…" oninput="filterTable()">
        </div>
        <div class="filter-row">
            <button class="filter-btn active" data-filter="all" onclick="setFilter('all',this)">All</button>
            <button class="filter-btn" data-filter="active"   onclick="setFilter('active',this)">Active</button>
            <button class="filter-btn" data-filter="inactive" onclick="setFilter('inactive',this)">Inactive</button>
            <button class="filter-btn" data-filter="featured" onclick="setFilter('featured',this)">Featured</button>
            <button class="filter-btn" data-filter="sale"     onclick="setFilter('sale',this)">On Sale</button>
        </div>
    </div>

    <div class="table-wrap">
        <table class="data-table" id="productsTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Tags</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                <tr data-active="{{ $product->is_active ? 'active' : 'inactive' }}"
                    data-featured="{{ $product->is_featured ? 'featured' : '' }}"
                    data-sale="{{ $product->is_sale ? 'sale' : '' }}"
                    data-name="{{ strtolower($product->name) }}">
                    <td style="color:#94a3b8;font-size:0.75rem;width:40px;">{{ $loop->iteration }}</td>
                    <td>
                        <div style="display:flex;align-items:center;gap:0.875rem;">
                            <div class="product-thumb"
                                 style="background:{{ $product->color ?: 'linear-gradient(135deg,#FF8C00,#FF6B00)' }};">
                                {{ strtoupper(substr($product->name, 0, 1)) }}
                            </div>
                            <div>
                                <div style="font-weight:600;color:#1e293b;">{{ $product->name }}</div>
                                <div style="font-size:0.6875rem;color:#94a3b8;margin-top:1px;">{{ Str::limit($product->description, 45) }}</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        @if($product->category)
                        <span style="text-transform:capitalize;color:#64748b;">{{ $product->category->name }}</span>
                        @else
                        <span style="color:#94a3b8;">—</span>
                        @endif
                    </td>
                    <td>
                        <div style="font-weight:700;color:#FF6B00;">TZS {{ number_format($product->price) }}</div>
                        @if($product->original_price && $product->original_price > $product->price)
                            <div style="font-size:0.6875rem;color:#94a3b8;text-decoration:line-through;">TZS {{ number_format($product->original_price) }}</div>
                        @endif
                    </td>
                    <td>
                        @if($product->is_active)
                            <span class="badge badge-green">
                                <span style="width:5px;height:5px;border-radius:50%;background:#16a34a;display:inline-block;"></span>
                                Active
                            </span>
                        @else
                            <span class="badge badge-gray">Inactive</span>
                        @endif
                    </td>
                    <td>
                        <div style="display:flex;gap:4px;flex-wrap:wrap;">
                            @if($product->is_featured) <span class="badge badge-orange">⭐ Featured</span> @endif
                            @if($product->is_new)      <span class="badge badge-blue">New</span>           @endif
                            @if($product->is_sale)     <span class="badge badge-purple">Sale</span>        @endif
                            @if($product->stock <= 0)   <span class="badge badge-red">Out of Stock</span>     @endif
                            @elseif($product->stock < 10) <span class="badge badge-orange">Low Stock ({{ $product->stock }})</span> @endif
                        </div>
                    </td>
                    <td>
                        <div style="display:flex;gap:6px;">
                            <a href="{{ route('admin.products.edit', $product) }}" class="action-btn action-edit">
                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="width:12px;height:12px;"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                Edit
                            </a>
                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button type="submit" class="action-btn action-delete"
                                        onclick="return confirm('Delete {{ addslashes($product->name) }}? This cannot be undone.')">
                                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="width:12px;height:12px;"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7">
                        <div class="empty-state">
                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                            <h3>No products yet</h3>
                            <p>Start by adding your first product.</p>
                            <a href="{{ route('admin.products.create') }}" class="btn-primary" style="margin-top:1rem;display:inline-flex;">Add Product</a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination">
        <span class="count-info">Showing <strong id="visibleCount">{{ $products->count() }}</strong> of {{ $products->count() }} products</span>
    </div>
</div>

<script>
let currentFilter = 'all';

function setFilter(filter, btn) {
    currentFilter = filter;
    document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    filterTable();
}

function filterTable() {
    const search  = document.getElementById('productSearch').value.toLowerCase();
    const rows    = document.querySelectorAll('#productsTable tbody tr[data-name]');
    let visible   = 0;

    rows.forEach(row => {
        const name     = row.dataset.name;
        const active   = row.dataset.active;
        const featured = row.dataset.featured;
        const sale     = row.dataset.sale;

        const matchSearch = !search || name.includes(search);
        let matchFilter   = true;

        if (currentFilter === 'active')   matchFilter = active === 'active';
        if (currentFilter === 'inactive') matchFilter = active === 'inactive';
        if (currentFilter === 'featured') matchFilter = featured === 'featured';
        if (currentFilter === 'sale')     matchFilter = sale === 'sale';

        const show = matchSearch && matchFilter;
        row.style.display = show ? '' : 'none';
        if (show) visible++;
    });

    document.getElementById('visibleCount').textContent = visible;
}
</script>
@endsection
