@extends('layouts.auth')

@section('content')

    <div class="bg-white p-8 rounded-xl shadow max-w-md w-full text-center">

        <h2 class="text-2xl font-bold mb-4">
            Verifica Email
        </h2>

        @if (session('resent'))
            <div class="bg-green-100 text-green-700 text-sm p-3 rounded-lg mb-4">
                Un nuovo link di verifica è stato inviato alla tua email.
            </div>
        @endif

        <p class="text-sm text-gray-600 mb-6">
            Prima di continuare, controlla la tua email per il link di verifica.
            <br><br>
            Se non l’hai ricevuto, puoi richiederlo di nuovo.
        </p>

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                Invia nuovo link
            </button>
        </form>

    </div>

@endsection