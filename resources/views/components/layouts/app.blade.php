<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />

    <title>{{ $title ?? config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
    @fluxAppearance
</head>

<body>
    <header class="w-full border-b border-gray-800/50 bg-gray-950/70 backdrop-blur sticky top-0 z-50">
        <div class="max-w-5xl mx-auto flex items-center justify-between px-6 py-3">
            {{-- Brand --}}
            <a href="{{ auth()->check() ? '/' : '/login' }}"
                class="text-xl font-bold bg-linear-to-r from-violet-400 to-fuchsia-400 bg-clip-text text-transparent">
                TypeBlast
            </a>

            {{-- Nav links --}}
            <nav class="flex items-center gap-2">
                @auth
                    <a href="/scores"
                        class="px-4 py-2 rounded-xl text-sm text-gray-400 hover:text-white hover:bg-gray-800 transition">
                        📊 My Scores
                    </a>
                    <span class="text-gray-600 text-sm hidden sm:inline">{{ auth()->user()->name }}</span>
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit"
                            class="px-4 py-2 rounded-xl text-sm text-gray-400 hover:text-rose-400 hover:bg-rose-500/10 transition">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="/login"
                        class="px-4 py-2 rounded-xl text-sm text-gray-400 hover:text-white hover:bg-gray-800 transition">
                        Sign In
                    </a>
                    <a href="/register" class="px-4 py-2 rounded-xl text-sm bg-linear-to-r from-violet-600 to-fuchsia-600
                                      hover:from-violet-500 hover:to-fuchsia-500 text-white font-medium transition">
                        Register
                    </a>
                @endauth
            </nav>
        </div>
    </header>


    {{ $slot }}

    @livewireScripts
    @fluxScripts
</body>

</html>