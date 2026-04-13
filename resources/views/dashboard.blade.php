@extends('layouts.master')

@section('content')

    <h1 class="text-2xl font-bold mb-6">Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

        <!-- TOTAL TASKS -->
        <div class="bg-white p-5 rounded-xl shadow">
            <p class="text-gray-500 text-sm">Totale Task</p>
            <p class="text-3xl font-bold mt-2">
                {{ \App\Models\Task::count() }}
            </p>
        </div>

        <!-- COMPLETED -->
        <div class="bg-white p-5 rounded-xl shadow">
            <p class="text-gray-500 text-sm">Completati</p>
            <p class="text-3xl font-bold mt-2 text-green-600">
                {{ \App\Models\Task::where('completed', true)->count() }}
            </p>
        </div>

        <!-- IN PROGRESS -->
        <div class="bg-white p-5 rounded-xl shadow">
            <p class="text-gray-500 text-sm">In corso</p>
            <p class="text-3xl font-bold mt-2 text-yellow-600">
                {{ \App\Models\Task::where('completed', false)->count() }}
            </p>
        </div>

    </div>

    <!-- QUICK ACTION -->
    <div class="mt-8 bg-white p-5 rounded-xl shadow flex justify-between items-center">
        <div>
            <h2 class="font-semibold">Gestisci i tuoi task</h2>
            <p class="text-gray-500 text-sm">Crea, modifica e organizza le tue attività</p>
        </div>

        <a href="{{ route('tasks.index') }}"
            class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
            Vai ai Task
        </a>
    </div>

@endsection