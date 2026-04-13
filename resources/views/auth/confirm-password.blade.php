@extends('layouts.auth')

@section('content')

<div class="bg-white p-8 rounded-xl shadow max-w-md w-full">

    <h2 class="text-2xl font-bold mb-4 text-center">
        Conferma Password
    </h2>

    <p class="text-sm text-gray-600 mb-6 text-center">
        Conferma la tua password prima di continuare
    </p>

    <form method="POST" action="{{ route('password.confirm') }}" class="space-y-4">
        @csrf

        <!-- PASSWORD -->
        <div>
            <label class="text-sm text-gray-600">Password</label>
            <input
                type="password"
                name="password"
                required
                autocomplete="current-password"
                class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring"
            >
            @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- BUTTON -->
        <button
            type="submit"
            class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
            Conferma
        </button>

        <!-- LINK -->
        @if (Route::has('password.request'))
        <div class="text-center mt-4">
            <a href="{{ route('password.request') }}"
               class="text-sm text-blue-600 hover:underline">
                Password dimenticata?
            </a>
        </div>
        @endif

    </form>

</div>

@endsection