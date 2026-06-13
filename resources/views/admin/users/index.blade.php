@extends('layouts.dashboard')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">Users</h1>
        <p class="page-description">Manage system users</p>
    </div>
    <a href="{{ route('admin.users.create') }}" class="px-4 py-2 text-white font-semibold rounded-lg transition-all duration-200 hover:shadow-lg" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">
        Add User
    </a>
</div>

<div class="card">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="border-b border-gray-200">
                    <th class="text-left py-3 px-4 font-semibold text-gray-900">Name</th>
                    <th class="text-left py-3 px-4 font-semibold text-gray-900">Email</th>
                    <th class="text-left py-3 px-4 font-semibold text-gray-900">Role</th>
                    <th class="text-left py-3 px-4 font-semibold text-gray-900">Created At</th>
                    <th class="text-left py-3 px-4 font-semibold text-gray-900">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr class="border-b border-gray-100 hover:bg-gray-50">
                    <td class="py-3 px-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full flex items-center justify-center font-semibold text-white" style="background: linear-gradient(135deg, #FF8C00 0%, #FF6B00 100%);">
                                {{ substr($user->name, 0, 1) }}
                            </div>
                            <div class="font-medium text-gray-900">{{ $user->name }}</div>
                        </div>
                    </td>
                    <td class="py-3 px-4 text-gray-600">{{ $user->email }}</td>
                    <td class="py-3 px-4">
                        @if($user->roles->count() > 0)
                            @foreach($user->roles as $role)
                                <span class="px-2 py-1 text-xs font-semibold text-orange-700 bg-orange-100 rounded-full">{{ $role->name }}</span>
                            @endforeach
                        @else
                            <span class="px-2 py-1 text-xs font-semibold text-gray-700 bg-gray-100 rounded-full">User</span>
                        @endif
                    </td>
                    <td class="py-3 px-4 text-gray-600">{{ $user->created_at->format('M d, Y') }}</td>
                    <td class="py-3 px-4">
                        <div class="flex gap-2">
                            <a href="{{ route('admin.users.edit', $user) }}" class="px-3 py-1 text-sm font-medium text-blue-600 hover:text-blue-800">Edit</a>
                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Are you sure? This action cannot be undone.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 text-sm font-medium text-red-600 hover:text-red-800">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="py-8 text-center text-gray-500">No users found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
