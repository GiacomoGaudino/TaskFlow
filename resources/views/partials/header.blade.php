<header class="bg-white shadow p-4 flex justify-between">
            <span>Benvenuto 👋</span>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="text-red-500">Logout</button>
            </form>
        </header>