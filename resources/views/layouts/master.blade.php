<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title>TaskFlow</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <div class="flex h-screen">

        <!-- SIDEBAR -->
        <aside class="w-64 bg-white shadow-md p-4">
            <h1 class="text-xl font-bold mb-6">TaskFlow</h1>

            <nav class="space-y-2">
                <a href="{{ route('dashboard') }}" class="block p-2 rounded hover:bg-gray-100">Dashboard</a>
                <a href="{{ route('tasks.index') }}" class="block p-2 rounded hover:bg-gray-100">Tasks</a>
                <a href="{{ route('tasks.create') }}" class="block p-2 rounded hover:bg-gray-100">Crea Task</a>
            </nav>
        </aside>

        <!-- MAIN -->
        <div class="flex-1 flex flex-col">

            <!-- TOPBAR -->
            @include('partials.header')

            <!-- CONTENT -->
            <main class="p-6">
                @yield('content')
            </main>

        </div>

    </div>
    @include('partials.footer')

</body>

</html>