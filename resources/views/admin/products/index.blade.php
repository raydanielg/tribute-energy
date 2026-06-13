@extends('layouts.dashboard')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">Products</h1>
        <p class="page-description">Manage your product inventory</p>
    </div>
    <a href="{{ route('admin.products.create') }}" class="px-4 py-2 text-white font-semibold rounded-lg transition-all duration-200 hover:shadow-lg" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">
        Add Product
    </a>
</div>

<div class="card">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="border-b border-gray-200">
                    <th class="text-left py-3 px-4 font-semibold text-gray-900">Name</th>
                    <th class="text-left py-3 px-4 font-semibold text-gray-900">Price</th>
                    <th class="text-left py-3 px-4 font-semibold text-gray-900">Category</th>
                    <th class="text-left py-3 px-4 font-semibold text-gray-900">Status</th>
                    <th class="text-left py-3 px-4 font-semibold text-gray-900">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                <tr class="border-b border-gray-100 hover:bg-gray-50">
                    <td class="py-3 px-4">
                        <div class="font-medium text-gray-900">{{ $product->name }}</div>
                        <div class="text-sm text-gray-500">{{ Str::limit($product->description, 50) }}</div>
                    </td>
                    <td class="py-3 px-4 font-semibold" style="color: #FF8C00;">TZS {{ number_format($product->price) }}</td>
                    <td class="py-3 px-4 text-gray-600">{{ $product->category ?? 'General' }}</td>
                    <td class="py-3 px-4">
                        @if($product->is_active)
                            <span class="px-2 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded-full">Active</span>
                        @else
                            <span class="px-2 py-1 text-xs font-semibold text-red-700 bg-red-100 rounded-full">Inactive</span>
                        @endif
                        @if($product->is_featured)
                            <span class="ml-2 px-2 py-1 text-xs font-semibold text-blue-700 bg-blue-100 rounded-full">Featured</span>
                        @endif
                    </td>
                    <td class="py-3 px-4">
                        <div class="flex gap-2">
                            <a href="{{ route('admin.products.edit', $product) }}" class="px-3 py-1 text-sm font-medium text-blue-600 hover:text-blue-800">Edit</a>
                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 text-sm font-medium text-red-600 hover:text-red-800">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="py-8 text-center text-gray-500">No products found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
