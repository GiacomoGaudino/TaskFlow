@extends('layouts.master')

@section('content')

    <div class="max-w-4xl mx-auto">

        <h2 class="text-2xl font-bold mb-6">User Management</h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow rounded-xl overflow-hidden">

            @foreach($users as $user)
                <div class="flex justify-between items-center p-4 border-b">

                    <div>
                        <p class="font-semibold">{{ $user->name }}</p>
                        <p class="text-sm text-gray-500">{{ $user->email }}</p>

                        <div class="mt-1 flex gap-2">
                            @foreach($user->roles as $role)
                                <span class="text-xs bg-blue-100 text-blue-600 px-2 py-1 rounded">
                                    {{ $role->name }}
                                </span>
                            @endforeach
                        </div>
                    </div>

                    <form method="POST" action="{{ route('admin.users.toggleRole', $user) }}">
                        @csrf

                        <button class="px-3 py-1 rounded text-sm
                                        {{ $user->isAdmin() ? 'bg-red-500 text-white' : 'bg-green-500 text-white' }}">
                            {{ $user->isAdmin() ? 'Remove Admin' : 'Make Admin' }}
                        </button>
                    </form>

                </div>
            @endforeach

        </div>

    </div>

@endsection