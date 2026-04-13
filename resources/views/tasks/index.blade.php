@extends('layouts.master')

@section('content')

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">I tuoi Task</h2>

        <a href="{{ route('tasks.create') }}"
            class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
            + Nuovo Task
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if($tasks->count() === 0)
        <div class="bg-white p-6 rounded-lg shadow text-center text-gray-500">
            Nessun task ancora creato 🚀
        </div>
    @endif

    <div class="grid gap-4">

        @foreach($tasks as $task)
            <div class="bg-white p-5 rounded-xl shadow hover:shadow-md transition flex justify-between items-start">

                <div>
                    <h3 class="text-lg font-semibold text-gray-800">
                        {{ $task->title }}
                    </h3>

                    <p class="text-gray-500 mt-1">
                        {{ $task->description ?? 'Nessuna descrizione' }}
                    </p>

                    <!-- STATUS -->
                    <span
                        class="inline-block mt-3 text-xs px-3 py-1 rounded-full
                                                {{ $task->completed ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                        {{ $task->completed ? 'Completato' : 'In corso' }}
                    </span>

                    <!-- UTENTI ASSEGNATI -->
                    @if($task->users->count())
                        <div class="mt-3 flex flex-wrap gap-2">
                            @foreach($task->users as $user)
                                <span class="text-xs bg-blue-100 text-blue-600 px-2 py-1 rounded-full">
                                    👤 {{ $user->name }}
                                </span>
                            @endforeach
                        </div>
                    @endif

                    <!-- SCADENZA -->
                    @if($task->due_date)
                        <div class="mt-2 text-xs
                                                                    @if(\Carbon\Carbon::parse($task->due_date)->isPast())
                                                                        text-red-600
                                                                    @else
                                                                        text-gray-500
                                                                    @endif">
                            📅 {{ \Carbon\Carbon::parse($task->due_date)->format('d/m/Y') }}
                        </div>
                    @endif

                </div>

                <div class="flex gap-3 items-center">

                    <a href="{{ route('tasks.edit', $task) }}" class="text-blue-600 hover:text-blue-800 text-sm">
                        Edit
                    </a>

                    <form method="POST" action="{{ route('tasks.destroy', $task) }}">
                        @csrf
                        @method('DELETE')

                        <button class="text-red-500 hover:text-red-700 text-sm">
                            Delete
                        </button>
                    </form>

                </div>

            </div>
        @endforeach

    </div>

@endsection