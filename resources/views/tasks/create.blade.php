@extends('layouts.master')

@section('content')

    <div class="max-w-2xl mx-auto">

        <h2 class="text-2xl font-bold mb-6">Crea Task</h2>

        <form method="POST" action="{{ route('tasks.store') }}" class="bg-white p-6 rounded-xl shadow space-y-4">
            @csrf

            <!-- TITLE -->
            <div>
                <label class="text-sm text-gray-600">Titolo</label>
                <input type="text" name="title" class="w-full border rounded-lg px-4 py-2 focus:ring focus:outline-none"
                    required>
            </div>

            <!-- DESCRIPTION -->
            <div>
                <label class="text-sm text-gray-600">Descrizione</label>
                <textarea name="description"
                    class="w-full border rounded-lg px-4 py-2 focus:ring focus:outline-none"></textarea>
            </div>

            <!-- MULTIUSER -->
            <div>
                <label class="text-sm text-gray-600">Assegna utenti</label>

                <select name="users[]" multiple class="w-full border rounded-lg px-4 py-2">

                    @foreach(\App\Models\User::all() as $user)
                        <option value="{{ $user->id }}" @if(isset($task) && $task->users->contains($user->id)) selected @endif>
                            {{ $user->name }}
                        </option>
                    @endforeach

                </select>
            </div>

            <!-- DUE DATE -->
            <div>
                <label class="text-sm text-gray-600">Scadenza</label>

                <input type="date" name="due_date" value="{{ old('due_date', $task->due_date ?? '') }}"
                    class="w-full border rounded-lg px-4 py-2">
            </div>

            <!-- BUTTON -->
            <div class="flex justify-end">
                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                    Salva Task
                </button>
            </div>

        </form>

    </div>

@endsection