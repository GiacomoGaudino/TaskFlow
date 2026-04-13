@extends('layouts.auth')

@section('content')

<div class="bg-white p-8 rounded-xl shadow">

    <h2 class="text-2xl font-bold mb-6 text-center">
        Register
    </h2>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <!-- NAME -->
        <div>
            <label class="text-sm text-gray-600">Nome</label>
            <input
                type="text"
                name="name"
                value="{{ old('name') }}"
                required
                autofocus
                class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring"
            >
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- EMAIL -->
        <div>
            <label class="text-sm text-gray-600">Email</label>
            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring"
            >
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- PASSWORD -->
        <div>
            <label class="text-sm text-gray-600">Password</label>
            <input
                type="password"
                name="password"
                required
                class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring"
            >
            @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- CONFIRM PASSWORD -->
        <div>
            <label class="text-sm text-gray-600">Conferma Password</label>
            <input
                type="password"
                name="password_confirmation"
                required
                class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring"
            >
        </div>

        <!-- BUTTON -->
        <button
            type="submit"
            class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
            Crea Account
        </button>

        <!-- LINK -->
        <div class="text-center mt-4">
            <a href="{{ route('login') }}"
               class="text-sm text-blue-600 hover:underline">
                Hai già un account? Login
            </a>
        </div>

    </form>

</div>

@endsection