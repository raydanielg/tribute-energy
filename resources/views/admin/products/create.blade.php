@extends('layouts.dashboard')

@push('head')
<style>
    body { background:#f8fafc; }
    .page-header { display:flex;align-items:center;justify-content:space-between;margin-bottom:1.75rem;flex-wrap:wrap;gap:1rem; }
    .page-title { font-size:1.375rem;font-weight:700;letter-spacing:-0.03em;color:#0f172a; }
    .page-description { margin-top:0.25rem;font-size:0.8125rem;color:#64748b; }
    .breadcrumb { display:flex;align-items:center;gap:6px;font-size:0.8125rem;color:#94a3b8;margin-bottom:0.5rem; }
    .breadcrumb a { color:#64748b;text-decoration:none; }
    .breadcrumb a:hover { color:#FF8C00; }
    .breadcrumb span { color:#e2e8f0; }

    .form-layout { display:grid;grid-template-columns:1fr;gap:1.25rem; }
    @media(min-width:1024px) { .form-layout { grid-template-columns:2fr 1fr; } }

    .card { background:#fff;border:1px solid #e2e8f0;border-radius:12px;overflow:hidden; }
    .card-header { padding:1.125rem 1.5rem;border-bottom:1px solid #f1f5f9;display:flex;align-items:center;gap:0.75rem; }
    .card-header-icon { width:32px;height:32px;border-radius:8px;background:rgba(255,140,0,0.1);display:flex;align-items:center;justify-content:center; }
    .card-header-icon svg { width:16px;height:16px;color:#FF8C00; }
    .card-title { font-size:0.9375rem;font-weight:700;color:#0f172a;letter-spacing:-0.02em; }
    .card-body { padding:1.5rem; }

    .form-group { margin-bottom:1.25rem; }
    .form-group:last-child { margin-bottom:0; }
    .form-label { display:block;font-size:0.8125rem;font-weight:600;color:#374151;margin-bottom:0.4rem; }
    .form-label .req { color:#ef4444; }
    .form-hint { font-size:0.75rem;color:#94a3b8;margin-top:0.3rem; }
    .form-input,.form-select,.form-textarea {
        width:100%;padding:0.5625rem 0.875rem;border:1px solid #e2e8f0;border-radius:8px;
        font-size:0.875rem;color:#1e293b;font-family:inherit;transition:border-color 0.15s,box-shadow 0.15s;
        background:#fff;outline:none;
    }
    .form-input::placeholder,.form-textarea::placeholder { color:#cbd5e1; }
    .form-input:focus,.form-select:focus,.form-textarea:focus { border-color:#FF8C00;box-shadow:0 0 0 3px rgba(255,140,0,0.1); }
    .form-textarea { resize:vertical;min-height:120px; }

    .form-grid-2 { display:grid;grid-template-columns:1fr 1fr;gap:1rem; }

    .checkbox-group { display:flex;flex-direction:column;gap:0.625rem; }
    .checkbox-item { display:flex;align-items:center;gap:0.75rem;padding:0.75rem;border:1px solid #e2e8f0;border-radius:8px;cursor:pointer;transition:all 0.15s; }
    .checkbox-item:hover { border-color:#FF8C00;background:rgba(255,140,0,0.03); }
    .checkbox-item input[type="checkbox"] { width:16px;height:16px;accent-color:#FF8C00;cursor:pointer; }
    .checkbox-item-label { font-size:0.8125rem;font-weight:600;color:#374151; }
    .checkbox-item-desc { font-size:0.75rem;color:#94a3b8;margin-top:1px; }

    .color-preview { width:100%;height:60px;border-radius:8px;border:1px solid #e2e8f0;margin-top:0.75rem;transition:background 0.3s; }

    .form-footer { display:flex;gap:0.75rem;padding:1.25rem 1.5rem;border-top:1px solid #f1f5f9;background:#f8fafc;flex-wrap:wrap; }
    .btn-primary { display:inline-flex;align-items:center;gap:6px;padding:0.625rem 1.25rem;background:linear-gradient(135deg,#FF8C00,#FF6B00);color:#fff;border:none;border-radius:8px;font-size:0.875rem;font-weight:600;cursor:pointer;font-family:inherit;transition:all 0.2s;text-decoration:none; }
    .btn-primary:hover { box-shadow:0 4px 14px rgba(255,107,0,0.35);transform:translateY(-1px); }
    .btn-secondary { display:inline-flex;align-items:center;gap:6px;padding:0.625rem 1.25rem;background:#fff;color:#374151;border:1px solid #e2e8f0;border-radius:8px;font-size:0.875rem;font-weight:600;text-decoration:none;cursor:pointer;font-family:inherit;transition:all 0.15s; }
    .btn-secondary:hover { background:#f8fafc;border-color:#cbd5e1; }
    .btn-secondary svg,.btn-primary svg { width:15px;height:15px; }

    .error-msg { font-size:0.75rem;color:#ef4444;margin-top:0.3rem;display:flex;align-items:center;gap:4px; }
    .error-msg svg { width:12px;height:12px;flex-shrink:0; }
    .input-error { border-color:#ef4444 !important; }
    .input-error:focus { box-shadow:0 0 0 3px rgba(239,68,68,0.1) !important; }
</style>
@endpush

@section('content')
<div class="breadcrumb">
    <a href="{{ route('dashboard') }}">Dashboard</a>
    <span>›</span>
    <a href="{{ route('admin.products.index') }}">Products</a>
    <span>›</span>
    <span style="color:#0f172a;font-weight:500;">New Product</span>
</div>

<div class="page-header">
    <div>
        <h1 class="page-title">Add New Product</h1>
        <p class="page-description">Fill in the details below to create a new product listing</p>
    </div>
</div>

<form action="{{ route('admin.products.store') }}" method="POST" id="productForm" enctype="multipart/form-data">
    @csrf

    <div class="form-layout">
        {{-- Left column --}}
        <div style="display:flex;flex-direction:column;gap:1.25rem;">

            {{-- Basic Info --}}
            <div class="card">
                <div class="card-header">
                    <div class="card-header-icon">
                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <h3 class="card-title">Basic Information</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label">Product Name <span class="req">*</span></label>
                        <input type="text" name="name" class="form-input @error('name') input-error @enderror"
                               value="{{ old('name') }}" placeholder="e.g. Tribute Energy Original" required>
                        @error('name')
                            <div class="error-msg"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Description <span class="req">*</span></label>
                        <textarea name="description" class="form-textarea @error('description') input-error @enderror"
                                  placeholder="Describe the product — ingredients, benefits, how to use…" required>{{ old('description') }}</textarea>
                        @error('description') <div class="error-msg">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-grid-2">
                        <div class="form-group">
                            <label class="form-label">Sale Price (TZS) <span class="req">*</span></label>
                            <input type="number" name="price" class="form-input @error('price') input-error @enderror"
                                   value="{{ old('price') }}" placeholder="0" step="1" required>
                            @error('price') <div class="error-msg">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Original Price (TZS)</label>
                            <input type="number" name="original_price" class="form-input"
                                   value="{{ old('original_price') }}" placeholder="0 (optional)" step="1">
                            <div class="form-hint">Leave blank if not on sale</div>
                        </div>
                    </div>

                    <div class="form-grid-2">
                        <div class="form-group">
                            <label class="form-label">Category</label>
                            <select name="category_id" class="form-select">
                                <option value="">— Select category —</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Stock</label>
                            <input type="number" name="stock" class="form-input"
                                   value="{{ old('stock', 0) }}" placeholder="0" min="0">
                            <div class="form-hint">Available quantity</div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Reviews</label>
                        <input type="text" name="reviews" class="form-input"
                               value="{{ old('reviews') }}" placeholder="e.g. (1,200 reviews)">
                    </div>
                </div>
            </div>

            {{-- Product Images --}}
            <div class="card">
                <div class="card-header">
                    <div class="card-header-icon">
                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>
                    <h3 class="card-title">Product Images</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label">Main Image</label>
                        <input type="file" name="image" class="form-input" accept="image/*">
                        <div class="form-hint">Main product image (JPEG, PNG, GIF - Max 2MB)</div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Additional Images</label>
                        <input type="file" name="images[]" class="form-input" accept="image/*" multiple>
                        <div class="form-hint">Additional product images (JPEG, PNG, GIF - Max 2MB each)</div>
                    </div>
                </div>
            </div>

            {{-- Specifications --}}
            <div class="card">
                <div class="card-header">
                    <div class="card-header-icon">
                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                    </div>
                    <h3 class="card-title">Specifications</h3>
                </div>
                <div class="card-body">
                    <div class="form-group" style="margin-bottom:0;">
                        <label class="form-label">Specs / Features</label>
                        <textarea name="specs" class="form-textarea" rows="5"
                                  placeholder="200mg Natural Caffeine&#10;Zero Sugar&#10;12 Vitamins &amp; Minerals&#10;6-Hour Sustained Energy">{{ old('specs') }}</textarea>
                        <div class="form-hint">One spec per line. Will appear as a list on the product page.</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Right column --}}
        <div style="display:flex;flex-direction:column;gap:1.25rem;">

            {{-- Product Status --}}
            <div class="card">
                <div class="card-header">
                    <div class="card-header-icon">
                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A2 2 0 013 12V7a4 4 0 014-4z"/></svg>
                    </div>
                    <h3 class="card-title">Status &amp; Tags</h3>
                </div>
                <div class="card-body">
                    <div class="checkbox-group">
                        <label class="checkbox-item">
                            <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                            <div>
                                <div class="checkbox-item-label">Active / Published</div>
                                <div class="checkbox-item-desc">Visible to customers on the shop</div>
                            </div>
                        </label>
                        <label class="checkbox-item">
                            <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}>
                            <div>
                                <div class="checkbox-item-label">⭐ Featured</div>
                                <div class="checkbox-item-desc">Appears on homepage featured section</div>
                            </div>
                        </label>
                        <label class="checkbox-item">
                            <input type="checkbox" name="is_new" value="1" {{ old('is_new') ? 'checked' : '' }}>
                            <div>
                                <div class="checkbox-item-label">🆕 New Arrival</div>
                                <div class="checkbox-item-desc">Shows "New" badge on product card</div>
                            </div>
                        </label>
                        <label class="checkbox-item">
                            <input type="checkbox" name="is_sale" value="1" {{ old('is_sale') ? 'checked' : '' }}>
                            <div>
                                <div class="checkbox-item-label">🏷️ On Sale</div>
                                <div class="checkbox-item-desc">Shows "Sale" badge, uses original price for strikethrough</div>
                            </div>
                        </label>
                    </div>
                </div>
            </div>

            {{-- Visual --}}
            <div class="card">
                <div class="card-header">
                    <div class="card-header-icon">
                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>
                    <h3 class="card-title">Visual</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label">Image URL</label>
                        <input type="text" name="image" class="form-input" id="imageUrl"
                               value="{{ old('image') }}" placeholder="https://…">
                        <div class="form-hint">Full URL to the product image</div>
                    </div>
                    <div class="form-group" style="margin-bottom:0;">
                        <label class="form-label">Card Gradient Color</label>
                        <input type="text" name="color" class="form-input" id="colorInput"
                               value="{{ old('color', 'linear-gradient(135deg, #FF6B00, #FFB800)') }}"
                               placeholder="linear-gradient(135deg, #FF6B00, #FF8C00)"
                               oninput="updatePreview(this.value)">
                        <div class="form-hint">CSS gradient used as product card background</div>
                        <div class="color-preview" id="colorPreview"
                             style="background:{{ old('color', 'linear-gradient(135deg, #FF6B00, #FFB800)') }};"></div>
                    </div>
                </div>
            </div>

            {{-- Quick presets --}}
            <div class="card">
                <div class="card-header">
                    <div class="card-header-icon">
                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/></svg>
                    </div>
                    <h3 class="card-title">Color Presets</h3>
                </div>
                <div class="card-body">
                    <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:8px;">
                        @php
                        $presets = [
                            'linear-gradient(135deg,#FF6B00,#FF8C00)',
                            'linear-gradient(135deg,#0066FF,#00AAFF)',
                            'linear-gradient(135deg,#8B00FF,#CC00FF)',
                            'linear-gradient(135deg,#FF2200,#FF6B00)',
                            'linear-gradient(135deg,#00C851,#007E33)',
                            'linear-gradient(135deg,#FFAB00,#FF6D00)',
                            'linear-gradient(135deg,#1A1A2E,#FF6B00)',
                            'linear-gradient(135deg,#EC4899,#8B5CF6)',
                        ];
                        @endphp
                        @foreach($presets as $preset)
                        <button type="button" onclick="applyPreset('{{ $preset }}')"
                                style="height:36px;border-radius:6px;border:2px solid transparent;cursor:pointer;transition:transform 0.15s,border-color 0.15s;background:{{ $preset }};"
                                title="{{ $preset }}"
                                onmouseover="this.style.transform='scale(1.05)'"
                                onmouseout="this.style.transform='scale(1)'">
                        </button>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Footer --}}
    <div style="margin-top:1.25rem;background:#fff;border:1px solid #e2e8f0;border-radius:12px;">
        <div class="form-footer">
            <button type="submit" class="btn-primary">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                Create Product
            </button>
            <a href="{{ route('admin.products.index') }}" class="btn-secondary">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                Cancel
            </a>
        </div>
    </div>
</form>

<script>
function updatePreview(val) {
    document.getElementById('colorPreview').style.background = val;
}
function applyPreset(val) {
    document.getElementById('colorInput').value = val;
    updatePreview(val);
}
</script>
@endsection
