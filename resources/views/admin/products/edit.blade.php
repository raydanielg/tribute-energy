@extends('layouts.dashboard')

@push('head')
<style>
    body { background:#f8fafc; }
    .breadcrumb { display:flex;align-items:center;gap:6px;font-size:0.8125rem;color:#94a3b8;margin-bottom:0.75rem; }
    .breadcrumb a { color:#64748b;text-decoration:none; } .breadcrumb a:hover { color:#FF8C00; }
    .page-header { display:flex;align-items:flex-end;justify-content:space-between;margin-bottom:1.5rem;flex-wrap:wrap;gap:1rem; }
    .page-title { font-size:1.375rem;font-weight:700;letter-spacing:-0.03em;color:#0f172a; }
    .page-description { margin-top:0.25rem;font-size:0.8125rem;color:#64748b;display:flex;align-items:center;gap:6px; }
    .form-layout { display:grid;grid-template-columns:1fr;gap:1.25rem; }
    @media(min-width:1024px) { .form-layout { grid-template-columns:2fr 1fr; } }
    .card { background:#fff;border:1px solid #e2e8f0;border-radius:12px;overflow:hidden; }
    .card-header { padding:1.125rem 1.5rem;border-bottom:1px solid #f1f5f9;display:flex;align-items:center;gap:0.75rem; }
    .card-header-icon { width:32px;height:32px;border-radius:8px;background:rgba(255,140,0,0.1);display:flex;align-items:center;justify-content:center; }
    .card-header-icon svg { width:16px;height:16px;color:#FF8C00; }
    .card-title { font-size:0.9375rem;font-weight:700;color:#0f172a; }
    .card-body { padding:1.5rem; }
    .form-group { margin-bottom:1.25rem; } .form-group:last-child { margin-bottom:0; }
    .form-label { display:block;font-size:0.8125rem;font-weight:600;color:#374151;margin-bottom:0.4rem; }
    .req { color:#ef4444; }
    .form-hint { font-size:0.75rem;color:#94a3b8;margin-top:0.3rem; }
    .form-input,.form-select,.form-textarea { width:100%;padding:0.5625rem 0.875rem;border:1px solid #e2e8f0;border-radius:8px;font-size:0.875rem;color:#1e293b;font-family:inherit;transition:border-color 0.15s,box-shadow 0.15s;background:#fff;outline:none; }
    .form-input:focus,.form-select:focus,.form-textarea:focus { border-color:#FF8C00;box-shadow:0 0 0 3px rgba(255,140,0,0.1); }
    .form-textarea { resize:vertical;min-height:120px; }
    .form-grid-2 { display:grid;grid-template-columns:1fr 1fr;gap:1rem; }
    .checkbox-group { display:flex;flex-direction:column;gap:0.625rem; }
    .checkbox-item { display:flex;align-items:flex-start;gap:0.75rem;padding:0.75rem;border:1px solid #e2e8f0;border-radius:8px;cursor:pointer;transition:all 0.15s; }
    .checkbox-item:hover { border-color:#FF8C00;background:rgba(255,140,0,0.03); }
    .checkbox-item input { width:16px;height:16px;accent-color:#FF8C00;cursor:pointer;margin-top:2px; }
    .checkbox-item-label { font-size:0.8125rem;font-weight:600;color:#374151; }
    .checkbox-item-desc { font-size:0.75rem;color:#94a3b8;margin-top:1px; }
    .color-preview { width:100%;height:60px;border-radius:8px;border:1px solid #e2e8f0;margin-top:0.75rem; }
    .form-footer { display:flex;gap:0.75rem;padding:1.25rem 1.5rem;border-top:1px solid #f1f5f9;background:#f8fafc;flex-wrap:wrap;align-items:center; }
    .btn-primary { display:inline-flex;align-items:center;gap:6px;padding:0.625rem 1.25rem;background:linear-gradient(135deg,#FF8C00,#FF6B00);color:#fff;border:none;border-radius:8px;font-size:0.875rem;font-weight:600;cursor:pointer;font-family:inherit;transition:all 0.2s;text-decoration:none; }
    .btn-primary:hover { box-shadow:0 4px 14px rgba(255,107,0,0.35);transform:translateY(-1px); }
    .btn-secondary { display:inline-flex;align-items:center;gap:6px;padding:0.625rem 1.25rem;background:#fff;color:#374151;border:1px solid #e2e8f0;border-radius:8px;font-size:0.875rem;font-weight:600;text-decoration:none;cursor:pointer;font-family:inherit;transition:all 0.15s; }
    .btn-secondary:hover { background:#f8fafc;border-color:#cbd5e1; }
    .btn-danger { display:inline-flex;align-items:center;gap:6px;padding:0.625rem 1.25rem;background:#fff;color:#ef4444;border:1px solid #fecaca;border-radius:8px;font-size:0.875rem;font-weight:600;cursor:pointer;font-family:inherit;transition:all 0.15s; }
    .btn-danger:hover { background:#fee2e2; }
    .btn-primary svg,.btn-secondary svg,.btn-danger svg { width:15px;height:15px; }
    .badge { display:inline-flex;align-items:center;gap:3px;font-size:11px;font-weight:600;padding:2px 8px;border-radius:20px; }
    .badge-green { background:#dcfce7;color:#15803d; } .badge-gray { background:#f1f5f9;color:#475569; }
    .alert-success { padding:0.875rem 1.25rem;border-radius:8px;font-size:0.8125rem;font-weight:500;margin-bottom:1.25rem;display:flex;align-items:center;gap:0.75rem;background:#dcfce7;color:#15803d;border:1px solid #bbf7d0; }
    .alert-success svg { width:16px;height:16px;flex-shrink:0; }
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
    <a href="{{ route('dashboard') }}">Dashboard</a> <span>›</span>
    <a href="{{ route('admin.products.index') }}">Products</a> <span>›</span>
    <span style="color:#0f172a;">{{ Str::limit($product->name, 28) }}</span>
</div>

<div class="page-header">
    <div>
        <h1 class="page-title">Edit Product</h1>
        <p class="page-description">
            ID #{{ $product->id }}
            @if($product->is_active) <span class="badge badge-green">Active</span>
            @else <span class="badge badge-gray">Inactive</span> @endif
            · Updated {{ $product->updated_at->diffForHumans() }}
        </p>
    </div>
</div>

<form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')

    <div class="form-layout">
        <div style="display:flex;flex-direction:column;gap:1.25rem;">

            <div class="card">
                <div class="card-header">
                    <div class="card-header-icon"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg></div>
                    <h3 class="card-title">Basic Information</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label">Product Name <span class="req">*</span></label>
                        <input type="text" name="name" class="form-input" value="{{ old('name', $product->name) }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Description <span class="req">*</span></label>
                        <textarea name="description" class="form-textarea" required>{{ old('description', $product->description) }}</textarea>
                    </div>
                    <div class="form-grid-2">
                        <div class="form-group">
                            <label class="form-label">Sale Price (TZS) <span class="req">*</span></label>
                            <input type="number" name="price" class="form-input" value="{{ old('price', $product->price) }}" step="1" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Original Price</label>
                            <input type="number" name="original_price" class="form-input" value="{{ old('original_price', $product->original_price) }}" step="1">
                        </div>
                    </div>
                    <div class="form-grid-2">
                        <div class="form-group">
                            <label class="form-label">Category</label>
                            <select name="category_id" class="form-select">
                                <option value="">— Select —</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Stock</label>
                            <input type="number" name="stock" class="form-input" value="{{ old('stock', $product->stock) }}" min="0">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Reviews Text</label>
                        <input type="text" name="reviews" class="form-input" value="{{ old('reviews', $product->reviews) }}" placeholder="(1,200 reviews)">
                    </div>
                </div>
            </div>

            {{-- Product Images --}}
            <div class="card">
                <div class="card-header">
                    <div class="card-header-icon"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg></div>
                    <h3 class="card-title">Product Images</h3>
                </div>
                <div class="card-body">
                    @if($product->image)
                    <div class="form-group">
                        <label class="form-label">Current Main Image</label>
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-32 h-32 rounded-lg object-cover">
                    </div>
                    @endif
                    <div class="form-group">
                        <label class="form-label">Replace Main Image</label>
                        <input type="file" name="image" class="form-input" accept="image/*">
                        <div class="form-hint">Leave empty to keep current image</div>
                    </div>
                    @if($product->images && is_array($product->images))
                    <div class="form-group">
                        <label class="form-label">Current Additional Images</label>
                        <div class="flex gap-2 flex-wrap">
                            @foreach($product->images as $image)
                            <img src="{{ asset($image) }}" alt="{{ $product->name }}" class="w-20 h-20 rounded-lg object-cover">
                            @endforeach
                        </div>
                    </div>
                    @endif
                    <div class="form-group">
                        <label class="form-label">Replace Additional Images</label>
                        <input type="file" name="images[]" class="form-input" accept="image/*" multiple>
                        <div class="form-hint">Leave empty to keep current images</div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="card-header-icon"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg></div>
                    <h3 class="card-title">Specifications</h3>
                </div>
                <div class="card-body">
                    <div class="form-group" style="margin-bottom:0;">
                        <label class="form-label">Specs / Features</label>
                        <textarea name="specs" class="form-textarea" rows="5">{{ old('specs', is_array($product->specs) ? implode("\n", $product->specs) : $product->specs) }}</textarea>
                        <div class="form-hint">One per line</div>
                    </div>
                </div>
            </div>
        </div>

        <div style="display:flex;flex-direction:column;gap:1.25rem;">
            <div class="card">
                <div class="card-header">
                    <div class="card-header-icon"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A2 2 0 013 12V7a4 4 0 014-4z"/></svg></div>
                    <h3 class="card-title">Status &amp; Tags</h3>
                </div>
                <div class="card-body">
                    <div class="checkbox-group">
                        <label class="checkbox-item"><input type="checkbox" name="is_active" value="1" {{ $product->is_active ? 'checked' : '' }}><div><div class="checkbox-item-label">Active / Published</div><div class="checkbox-item-desc">Visible to customers</div></div></label>
                        <label class="checkbox-item"><input type="checkbox" name="is_featured" value="1" {{ $product->is_featured ? 'checked' : '' }}><div><div class="checkbox-item-label">⭐ Featured</div><div class="checkbox-item-desc">Homepage featured section</div></div></label>
                        <label class="checkbox-item"><input type="checkbox" name="is_new" value="1" {{ $product->is_new ? 'checked' : '' }}><div><div class="checkbox-item-label">🆕 New Arrival</div><div class="checkbox-item-desc">Shows "New" badge</div></div></label>
                        <label class="checkbox-item"><input type="checkbox" name="is_sale" value="1" {{ $product->is_sale ? 'checked' : '' }}><div><div class="checkbox-item-label">🏷️ On Sale</div><div class="checkbox-item-desc">Shows "Sale" badge</div></div></label>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="card-header-icon"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg></div>
                    <h3 class="card-title">Visual</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label">Image URL</label>
                        <input type="text" name="image" class="form-input" value="{{ old('image', $product->image) }}" placeholder="https://…">
                    </div>
                    <div class="form-group" style="margin-bottom:0;">
                        <label class="form-label">Card Gradient</label>
                        <input type="text" name="color" class="form-input" id="colorInput"
                               value="{{ old('color', $product->color) }}"
                               oninput="document.getElementById('colorPreview').style.background=this.value">
                        <div class="color-preview" id="colorPreview" style="background:{{ $product->color ?: 'linear-gradient(135deg,#FF6B00,#FFB800)' }};"></div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <p style="font-size:0.75rem;font-weight:600;text-transform:uppercase;letter-spacing:0.06em;color:#94a3b8;margin-bottom:0.75rem;">Color Presets</p>
                    <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:8px;">
                        @foreach(['linear-gradient(135deg,#FF6B00,#FF8C00)','linear-gradient(135deg,#0066FF,#00AAFF)','linear-gradient(135deg,#8B00FF,#CC00FF)','linear-gradient(135deg,#FF2200,#FF6B00)','linear-gradient(135deg,#00C851,#007E33)','linear-gradient(135deg,#FFAB00,#FF6D00)','linear-gradient(135deg,#1A1A2E,#FF6B00)','linear-gradient(135deg,#EC4899,#8B5CF6)'] as $p)
                        <button type="button" onclick="document.getElementById('colorInput').value='{{ $p }}';document.getElementById('colorPreview').style.background='{{ $p }}';"
                                style="height:34px;border-radius:6px;border:2px solid transparent;cursor:pointer;background:{{ $p }};"
                                onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'"></button>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="margin-top:1.25rem;background:#fff;border:1px solid #e2e8f0;border-radius:12px;">
        <div class="form-footer">
            <button type="submit" class="btn-primary">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg> Save Changes
            </button>
            <a href="{{ route('admin.products.index') }}" class="btn-secondary">Cancel</a>
            <div style="margin-left:auto;">
                <form action="{{ route('admin.products.destroy', $product) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn-danger" onclick="return confirm('Delete this product permanently?')">
                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                        Delete Product
                    </button>
                </form>
            </div>
        </div>
    </div>
</form>
@endsection
