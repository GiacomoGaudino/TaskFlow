@extends('layouts.master')

@section('content')

    <div class="max-w-2xl mx-auto">

        <h2 class="text-2xl font-bold mb-6">Modifica Task</h2>

        <form method="POST" action="{{ route('tasks.update', $task) }}" class="bg-white p-6 rounded-xl shadow space-y-4">

            @csrf
            @method('PUT')

            <!-- TITLE -->
            <div>
                <label class="text-sm text-gray-600">Titolo</label>
                <input type="text" name="title" value="{{ old('title', $task->title) }}"
                    class="w-full border rounded-lg px-4 py-2 focus:ring focus:outline-none" @cannot('update', $task)
                    disabled @endcannot>
            </div>

            <!-- DESCRIPTION -->
            <div>
                <label class="text-sm text-gray-600">Descrizione</label>
                <textarea name="description" class="w-full border rounded-lg px-4 py-2 focus:ring focus:outline-none"
                    @cannot('update', $task) disabled @endcannot>{{ old('description', $task->description) }}</textarea>
            </div>

            <!-- USERS (solo admin) -->
            @if(auth()->user()->isAdmin())
                <div>
                    <label class="text-sm text-gray-600">Assegna utenti</label>

                    <select name="users[]" multiple class="w-full border rounded-lg px-4 py-2">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" @if($task->users->contains($user->id)) selected @endif>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            @endif

            <!-- DUE DATE (solo admin) -->
            @if(auth()->user()->isAdmin())
                <div>
                    <label class="text-sm text-gray-600">Scadenza</label>

                    <input type="date" name="due_date" value="{{ old('due_date', $task->due_date) }}"
                        class="w-full border rounded-lg px-4 py-2">
                </div>
            @endif

            <!-- COMPLETED (sempre visibile ma solo member editable) -->
            <div class="flex items-center gap-2">
                <input type="hidden" name="completed" value="0">

                <input type="checkbox" name="completed" value="1" @checked($task->completed) {{ auth()->user()->isAdmin() ? '' : '' }}>

                <label class="text-sm text-gray-600">Completato</label>
            </div>

            <!-- BUTTON -->
            <div class="flex justify-between">
                <a href="{{ route('tasks.index') }}" class="text-gray-500 hover:text-gray-700">
                    Annulla
                </a>

                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                    Aggiorna Task
                </button>
            </div>

        </form>

    </div>

@endsection