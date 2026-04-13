@extends('layouts.auth')

@section('content')

<div class="bg-white p-8 rounded-xl shadow max-w-md w-full">

    <h2 class="text-2xl font-bold mb-4 text-center">
        Reset Password
    </h2>

    <p class="text-sm text-gray-600 mb-6 text-center">
        Inserisci la tua email e ti invieremo il link per reimpostare la password
    </p>

    @if (session('status'))
        <div class="bg-green-100 text-green-700 text-sm p-3 rounded-lg mb-4">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
        @csrf

        <!-- EMAIL -->
        <div>
            <label class="text-sm text-gray-600">Email</label>
            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autofocus
                class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring"
            >
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- BUTTON -->
        <button
            type="submit"
            class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
            Invia link reset
        </button>

        <!-- LINK -->
        <div class="text-center mt-4">
            <a href="{{ route('login') }}"
               class="text-sm text-blue-600 hover:underline">
                Torna al login
            </a>
        </div>

    </form>

</div>

@endsection