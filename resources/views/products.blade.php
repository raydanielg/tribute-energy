@extends('layouts.site')

@section('title', 'Products')

@section('content')
<section class="bg-gray-50 py-8 antialiased md:py-12">
  <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
    {{-- Heading & Filters --}}
    <div class="mb-6 items-end justify-between space-y-4 sm:flex sm:space-y-0 md:mb-10">
      <div>
        <span class="section-label">Our Range</span>
        <h2 class="mt-2 text-4xl font-bold text-gray-900 font-bebas tracking-wide">Products</h2>
        <p class="text-sm text-gray-500 mt-1">High-quality solar energy solutions for every need</p>
      </div>
      <div class="flex items-center gap-3">
        <button id="filterToggleBtn" type="button" class="inline-flex items-center gap-2 rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm font-rajdhani font-700 text-gray-700 tracking-wider hover:border-[#FF6B00]/30 hover:text-[#FF6B00] focus:z-10 focus:outline-none focus:ring-4 focus:ring-orange-100 transition-all duration-200 uppercase">
          <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M18.796 4H5.204a1 1 0 0 0-.753 1.659l5.302 6.058a1 1 0 0 1 .247.659v4.874a.5.5 0 0 0 .2.4l3 2.25a.5.5 0 0 0 .8-.4v-7.124a1 1 0 0 1 .247-.659l5.302-6.059c.566-.646.106-1.658-.753-1.658Z" />
          </svg>
          Filters
        </button>
        <div class="relative">
          <button id="sortDropdownBtn" type="button" class="inline-flex items-center gap-2 rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm font-rajdhani font-700 text-gray-700 tracking-wider hover:border-[#FF6B00]/30 hover:text-[#FF6B00] focus:z-10 focus:outline-none focus:ring-4 focus:ring-orange-100 transition-all duration-200 uppercase">
            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M7 4l3 3M7 4 4 7m9-3h6l-6 6h6m-6.5 10 3.5-7 3.5 7M14 18h4" />
            </svg>
            Sort
          </button>
          <div id="sortDropdown" class="z-50 hidden absolute right-0 top-full mt-2 w-44 rounded-xl bg-white border border-gray-100 shadow-xl overflow-hidden">
            <ul class="py-2 text-sm text-gray-600">
              <li><a href="#" class="block px-4 py-2.5 hover:bg-orange-50 hover:text-[#FF6B00] transition-colors font-medium">Most Popular</a></li>
              <li><a href="#" class="block px-4 py-2.5 hover:bg-orange-50 hover:text-[#FF6B00] transition-colors font-medium">Newest</a></li>
              <li><a href="#" class="block px-4 py-2.5 hover:bg-orange-50 hover:text-[#FF6B00] transition-colors font-medium">Price: Low to High</a></li>
              <li><a href="#" class="block px-4 py-2.5 hover:bg-orange-50 hover:text-[#FF6B00] transition-colors font-medium">Price: High to Low</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    {{-- Products Grid --}}
    <div class="mb-4 grid gap-6 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
      @forelse($products as $product)
      <div class="product-card group rounded-2xl border border-gray-200 bg-white shadow-sm hover:shadow-[0_8px_30px_rgb(0,0,0,0.08)] transition-all duration-500 overflow-hidden"
           x-data="{ open: false }">
        {{-- Image area with orange top accent --}}
        <div class="relative h-56 bg-gradient-to-br from-orange-50 to-amber-50 flex items-center justify-center overflow-hidden cursor-pointer"
             @@click="open = true; $dispatch('open-product', { id: {{ $product->id }} })">
          @if($product->image)
            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-contain p-4 group-hover:scale-110 transition-transform duration-700 ease-out">
          @else
            <svg class="w-20 h-20 text-gray-300 group-hover:text-[#FF6B00] transition-all duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
            </svg>
          @endif
          {{-- Badges --}}
          <div class="absolute top-3 left-3 flex flex-col gap-1.5">
            @if($product->is_featured)
              <span class="px-3 py-1 text-[10px] font-rajdhani font-700 text-white tracking-widest rounded-full bg-gradient-to-r from-amber-400 to-orange-500 shadow-lg shadow-orange-200">FEATURED</span>
            @endif
            @if($product->is_sale && $product->original_price)
              <span class="px-3 py-1 text-[10px] font-rajdhani font-700 text-white tracking-widest rounded-full bg-gradient-to-r from-red-500 to-rose-600 shadow-lg shadow-red-200">-{{ round((1 - $product->price / $product->original_price) * 100) }}%</span>
            @endif
          </div>
          @if($product->is_new)
            <span class="absolute top-3 right-3 px-3 py-1 text-[10px] font-rajdhani font-700 text-white tracking-widest rounded-full bg-gradient-to-r from-emerald-400 to-green-500 shadow-lg shadow-green-200">NEW</span>
          @endif
          {{-- Quick actions overlay --}}
          <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500 flex items-center justify-center gap-3">
            <button @@click="open = true; $dispatch('open-product', { id: {{ $product->id }} })"
                    class="w-11 h-11 rounded-full bg-white/95 backdrop-blur shadow-xl flex items-center justify-center text-gray-700 hover:text-[#FF6B00] transition-colors transform -translate-y-4 group-hover:translate-y-0 duration-500">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
              </svg>
            </button>
            <button @@click="add({ id: {{ $product->id }}, name: '{{ $product->name }}', price: {{ $product->price }} })"
                    class="w-11 h-11 rounded-full bg-white/95 backdrop-blur shadow-xl flex items-center justify-center text-gray-700 hover:text-[#FF6B00] transition-colors transform translate-y-4 group-hover:translate-y-0 duration-500">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
              </svg>
            </button>
          </div>
        </div>
        {{-- Product Info --}}
        <div class="p-5">
          <span class="text-[11px] font-rajdhani font-700 text-[#FF6B00] tracking-[3px] uppercase block mb-1">{{ $product->category ?? 'Solar' }}</span>
          <a href="#" @@click.prevent="open = true; $dispatch('open-product', { id: {{ $product->id }} })"
             class="text-base font-semibold text-gray-900 hover:text-[#FF6B00] transition-colors line-clamp-2 leading-snug block">
            {{ $product->name }}
          </a>
          {{-- Rating --}}
          <div class="mt-2 flex items-center gap-1.5">
            <div class="flex items-center">
              @for($i = 0; $i < 5; $i++)
                @if($i < (int)($product->rating ?? 4))
                  <svg class="w-3.5 h-3.5 text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                  </svg>
                @else
                  <svg class="w-3.5 h-3.5 text-gray-200" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                  </svg>
                @endif
              @endfor
            </div>
            <span class="text-[11px] text-gray-400 font-medium">({{ $product->reviews ?? 0 }})</span>
          </div>
          {{-- Divider --}}
          <div class="my-3 border-t border-gray-100"></div>
          {{-- Price & Add to Cart --}}
          <div class="flex items-center justify-between">
            <div>
              @if($product->original_price && $product->is_sale)
                <span class="text-[11px] text-gray-400 line-through mr-1 font-medium">TZS {{ number_format($product->original_price) }}</span>
              @endif
              <p class="text-lg font-bold text-gradient">{{ number_format($product->price) }}<span class="text-sm font-normal text-gray-500 ml-0.5">TZS</span></p>
            </div>
            <button @@click="add({ id: {{ $product->id }}, name: '{{ $product->name }}', price: {{ $product->price }} })"
                    class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#FF6B00] to-[#FF8C00] hover:from-[#e06000] hover:to-[#e67e00] text-white flex items-center justify-center transition-all duration-300 shadow-md hover:shadow-lg active:scale-90">
              <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
              </svg>
            </button>
          </div>
        </div>
      </div>
      @empty
      <div class="col-span-full text-center py-16">
        <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
        </svg>
        <p class="text-gray-500 text-lg">No products found.</p>
        <a href="{{ route('products') }}" class="mt-2 inline-block text-sm text-[#FF6B00] hover:underline">Clear filters</a>
      </div>
      @endforelse
    </div>

    @if(count($products) > 0)
    <div class="w-full text-center mt-10">
      <button type="button" class="inline-flex items-center gap-2 rounded-xl border-2 border-[#FF6B00]/20 bg-white px-8 py-3 text-sm font-rajdhani font-700 text-[#FF6B00] tracking-widest hover:bg-[#FF6B00] hover:text-white focus:z-10 focus:outline-none focus:ring-4 focus:ring-orange-100 transition-all duration-300 uppercase">
        Show More
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
      </button>
    </div>
    @endif
  </div>
</section>

{{-- Product Details Modal --}}
<div id="productModal" class="fixed inset-0 z-50 hidden items-center justify-center p-4">
  <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" id="productModalOverlay"></div>
  <div class="relative bg-white rounded-3xl shadow-2xl max-w-4xl w-full max-h-[90vh] overflow-y-auto transform transition-all duration-300 scale-95 opacity-0" id="productModalContent">
    {{-- Top accent bar --}}
    <div class="h-1.5 bg-gradient-to-r from-[#FF6B00] via-[#FF8C00] to-[#FFB800] rounded-t-3xl"></div>
    <button id="closeProductModal" class="absolute top-6 right-6 z-20 w-10 h-10 bg-white rounded-full shadow-lg flex items-center justify-center text-gray-400 hover:text-gray-700 hover:shadow-xl transition-all">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
      </svg>
    </button>
    <div class="grid md:grid-cols-2">
      <div class="relative h-72 md:h-auto bg-gradient-to-br from-orange-50 via-amber-50 to-yellow-50 flex items-center justify-center p-10 rounded-bl-3xl">
        <img id="modalProductImage" class="w-full h-full object-contain hidden drop-shadow-xl">
        <svg id="modalProductImagePlaceholder" class="w-32 h-32 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
        </svg>
      </div>
      <div class="p-8 md:p-10">
        <span id="modalProductCategory" class="section-label block mb-1"></span>
        <h2 id="modalProductName" class="text-2xl md:text-3xl font-bold text-gray-900 mb-3 leading-tight"></h2>
        <div class="flex items-center gap-2 mb-4">
          <div id="modalProductStars" class="flex items-center"></div>
          <span id="modalProductReviews" class="text-sm text-gray-400 font-medium"></span>
        </div>
        <div class="mb-5">
          <span id="modalProductPrice" class="text-3xl font-bold text-gradient"></span>
          <span id="modalProductOriginalPrice" class="text-sm text-gray-400 line-through ml-3 hidden"></span>
        </div>
        <p id="modalProductDescription" class="text-gray-600 text-sm leading-relaxed mb-6"></p>
        <div id="modalProductSpecs" class="mb-6 hidden">
          <h3 class="text-sm font-rajdhani font-700 text-gray-900 tracking-wider uppercase mb-3">Specifications</h3>
          <ul id="modalProductSpecsList" class="space-y-2 text-sm text-gray-600"></ul>
        </div>
        {{-- Quantity + Add to Cart --}}
        <div class="flex items-center gap-4 mb-6">
          <span class="text-sm font-rajdhani font-700 text-gray-900 tracking-wider uppercase">Qty:</span>
          <div class="flex items-center border-2 border-gray-200 rounded-xl overflow-hidden">
            <button id="modalQtyDec" class="w-10 h-10 flex items-center justify-center bg-gray-50 hover:bg-gray-100 text-gray-600 hover:text-[#FF6B00] transition-colors font-bold text-lg">-</button>
            <span id="modalQtyValue" class="w-12 text-center font-bold text-gray-900 text-base">1</span>
            <button id="modalQtyInc" class="w-10 h-10 flex items-center justify-center bg-gray-50 hover:bg-gray-100 text-gray-600 hover:text-[#FF6B00] transition-colors font-bold text-lg">+</button>
          </div>
        </div>
        <button id="modalAddToCartBtn" class="w-full py-3.5 bg-gradient-to-r from-[#FF6B00] to-[#FF8C00] hover:from-[#e06000] hover:to-[#e67e00] text-white font-bold rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl active:scale-[0.98] flex items-center justify-center gap-3 text-base">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
          </svg>
          Add to Cart
        </button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
// --- Product Modal ---
let productsCache = null;
let currentModalProduct = null;
let modalQty = 1;
const modal = document.getElementById('productModal');
const modalContent = document.getElementById('productModalContent');

function showModal() {
  modal.classList.remove('hidden');
  modal.classList.add('flex');
  requestAnimationFrame(() => {
    modalContent.classList.remove('scale-95', 'opacity-0');
    modalContent.classList.add('scale-100', 'opacity-100');
  });
}

function hideModal() {
  modalContent.classList.remove('scale-100', 'opacity-100');
  modalContent.classList.add('scale-95', 'opacity-0');
  setTimeout(() => {
    modal.classList.add('hidden');
    modal.classList.remove('flex');
  }, 300);
}

document.getElementById('closeProductModal')?.addEventListener('click', hideModal);
document.getElementById('productModalOverlay')?.addEventListener('click', hideModal);

document.addEventListener('open-product', async function(e) {
  try {
    if (!productsCache) {
      const resp = await fetch('/api/products');
      productsCache = await resp.json();
    }
    const product = productsCache.find(p => p.id === e.detail.id);
    if (!product) return;
    currentModalProduct = product;
    modalQty = 1;

    // Image
    const img = document.getElementById('modalProductImage');
    const placeholder = document.getElementById('modalProductImagePlaceholder');
    if (product.image) {
      img.src = product.image.startsWith('http') ? product.image : '/' + product.image;
      img.classList.remove('hidden');
      placeholder.classList.add('hidden');
    } else {
      img.classList.add('hidden');
      placeholder.classList.remove('hidden');
    }

    document.getElementById('modalProductCategory').textContent = product.category || 'General';
    document.getElementById('modalProductName').textContent = product.name;
    document.getElementById('modalProductPrice').textContent = 'TZS ' + Number(product.price).toLocaleString();
    document.getElementById('modalProductDescription').textContent = product.description || 'No description available.';
    document.getElementById('modalQtyValue').textContent = '1';

    // Original price
    const origPrice = document.getElementById('modalProductOriginalPrice');
    if (product.original_price && product.is_sale) {
      origPrice.textContent = 'TZS ' + Number(product.original_price).toLocaleString();
      origPrice.classList.remove('hidden');
    } else {
      origPrice.classList.add('hidden');
    }

    // Stars
    const rating = Math.round(product.rating || 4);
    let starsHtml = '';
    for (let i = 0; i < 5; i++) {
      starsHtml += i < rating
        ? '<svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>'
        : '<svg class="w-4 h-4 text-gray-300" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>';
    }
    document.getElementById('modalProductStars').innerHTML = starsHtml;
    document.getElementById('modalProductReviews').textContent = '(' + (product.reviews || 0) + ')';

    // Specs
    const specsContainer = document.getElementById('modalProductSpecs');
    const specsList = document.getElementById('modalProductSpecsList');
    if (product.specs && product.specs.length) {
      specsList.innerHTML = product.specs.map(s =>
        '<li class="flex items-center gap-2">' +
        '<svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">' +
        '<path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>' +
        '<span>' + s + '</span></li>'
      ).join('');
      specsContainer.classList.remove('hidden');
    } else {
      specsContainer.classList.add('hidden');
    }

    showModal();
  } catch (err) {
    console.error('Failed to fetch product details:', err);
  }
});

// Modal quantity
document.getElementById('modalQtyDec')?.addEventListener('click', function() {
  if (modalQty > 1) {
    modalQty--;
    document.getElementById('modalQtyValue').textContent = modalQty;
  }
});
document.getElementById('modalQtyInc')?.addEventListener('click', function() {
  if (modalQty < 99) {
    modalQty++;
    document.getElementById('modalQtyValue').textContent = modalQty;
  }
});

// Add to cart from modal
document.getElementById('modalAddToCartBtn')?.addEventListener('click', function() {
  if (!currentModalProduct) return;
  const alpineBody = document.querySelector('[x-data="cartApp()"]');
  if (alpineBody && alpineBody.__x) {
    for (let i = 0; i < modalQty; i++) {
      alpineBody.__x.\$data.add({
        id: currentModalProduct.id,
        name: currentModalProduct.name,
        price: currentModalProduct.price,
        image: currentModalProduct.image
      });
    }
    hideModal();
  }
});

// --- Sort dropdown ---
document.getElementById('sortDropdownBtn')?.addEventListener('click', function(e) {
  e.stopPropagation();
  document.getElementById('sortDropdown')?.classList.toggle('hidden');
});
document.addEventListener('click', function() {
  document.getElementById('sortDropdown')?.classList.add('hidden');
});

// --- Filter modal toggle ---
document.getElementById('filterToggleBtn')?.addEventListener('click', function() {
  const m = document.getElementById('filterModal');
  if (m) {
    m.classList.toggle('hidden');
    m.classList.toggle('flex');
  }
});
</script>
@endsection
