@extends('layouts.master')

@section('content')

    <div class="max-w-2xl mx-auto">

        <h2 class="text-2xl font-bold mb-6">Modifica Task</h2>

        <form method="POST" action="{{ route('tasks.update', $task) }}" class="bg-white p-6 rounded-xl shadow space-y-4">

            @csrf
            @method('PUT')

            {{-- 🧑‍💼 ADMIN FULL EDIT --}}
            @if(auth()->user()->isAdmin())

                <div>
                    <label>Titolo</label>
                    <input type="text" name="title" value="{{ $task->title }}" class="w-full border rounded p-2">
                </div>

                <div>
                    <label>Descrizione</label>
                    <textarea name="description" class="w-full border rounded p-2">{{ $task->description }}</textarea>
                </div>

                <div>
                    <label>Assegna utenti</label>
                    <select name="users[]" multiple class="w-full border rounded p-2">
                        @foreach(\App\Models\User::all() as $user)
                            <option value="{{ $user->id }}" @selected($task->users->contains($user->id))>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label>Scadenza</label>
                    <input type="date" name="due_date" value="{{ $task->due_date }}" class="w-full border rounded p-2">
                </div>

            @endif

            {{-- 👤 MEMBER + ADMIN (sempre visibile) --}}
            <div class="flex items-center gap-2">
                <input type="hidden" name="completed" value="0">

                <input type="checkbox" name="completed" value="1" @checked($task->completed) @cannot('update', $task)
                    disabled @endcannot>

                <label>Completato</label>
            </div>

            {{-- BUTTON --}}
            <div class="flex justify-between">
                <a href="{{ route('tasks.index') }}" class="text-gray-500">Annulla</a>

                <button class="bg-blue-600 text-white px-4 py-2 rounded">
                    Aggiorna
                </button>
            </div>

        </form>

    </div>

@endsection