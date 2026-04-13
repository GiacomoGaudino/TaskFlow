@extends('layouts.auth')

@section('content')

    <div class="bg-white p-8 rounded-xl shadow">

        <h2 class="text-2xl font-bold mb-6 text-center">
            Login
        </h2>

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <!-- EMAIL -->
            <div>
                <label class="text-sm text-gray-600">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring">

                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- PASSWORD -->
            <div>
                <label class="text-sm text-gray-600">Password</label>
                <input type="password" name="password" required
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring">

                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- REMEMBER -->
            <div class="flex items-center gap-2">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember" class="text-sm text-gray-600">
                    Ricordami
                </label>
            </div>

            <!-- BUTTON -->
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                Login
            </button>

            <!-- LINK -->
            <div class="text-center mt-4 space-y-2">

                @if (Route::has('password.request'))
                    <a class="text-sm text-blue-600 hover:underline" href="{{ route('password.request') }}">
                        Password dimenticata?
                    </a>
                @endif

                <p class="text-sm text-gray-600">
                    Non hai un account?
                    <a href="{{ route('register') }}" class="text-blue-600 hover:underline">
                        Registrati
                    </a>
                </p>

            </div>

        </form>

    </div>

@endsection