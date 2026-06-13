@extends('layouts.dashboard')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">Add User</h1>
        <p class="page-description">Create a new user account</p>
    </div>
</div>

<div class="card">
    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Full Name</label>
                <input type="text" name="name" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" placeholder="Enter full name">
            </div>
            
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Email Address</label>
                <input type="email" name="email" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" placeholder="user@example.com">
            </div>
            
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                <input type="password" name="password" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" placeholder="Minimum 8 characters">
            </div>
            
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Confirm Password</label>
                <input type="password" name="password_confirmation" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" placeholder="Confirm password">
            </div>
        </div>
        
        <div class="mt-6 flex gap-4">
            <a href="{{ route('admin.users.index') }}" class="px-6 py-3 text-gray-700 font-semibold rounded-lg border border-gray-300 hover:bg-gray-50 transition-colors">
                Cancel
            </a>
            <button type="submit" class="px-6 py-3 text-white font-semibold rounded-lg transition-all duration-200 hover:shadow-lg" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">
                Create User
            </button>
        </div>
    </form>
</div>
@endsection
