<x-layouts.app>
    <div class="min-h-screen flex items-center justify-center bg-gray-950 px-4">
        <div class="w-full max-w-md z-10">

            <div class="bg-gray-900/80 backdrop-blur border border-gray-800 rounded-3xl p-8 shadow-2xl shadow-black/60">

                <div class="text-center mb-8">
                    <h1
                        class="text-4xl font-bold bg-linear-to-r from-violet-400 via-fuchsia-400 to-cyan-400 bg-clip-text text-transparent">
                        TypeBlast
                    </h1>
                    <p class="text-gray-500 mt-1 text-sm">Sign in to track your scores</p>
                </div>

                @if ($errors->any())
                    <div class="mb-5 rounded-xl bg-rose-500/10 border border-rose-500/30 p-4">
                        <ul class="text-rose-400 text-sm space-y-1 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div
                        class="mb-5 rounded-xl bg-emerald-500/10 border border-emerald-500/30 p-4 text-emerald-400 text-sm">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="/login" class="space-y-5">
                    @csrf

                    <div>
                        <label class="block text-sm text-gray-400 mb-1.5 font-medium">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" required autofocus class="w-full px-4 py-3 rounded-xl bg-gray-800 border border-gray-700 text-white
                                   placeholder-gray-600 outline-none focus:border-violet-500
                                   focus:ring-2 focus:ring-violet-500/30 transition" placeholder="you@example.com">
                    </div>

                    <div>
                        <label class="block text-sm text-gray-400 mb-1.5 font-medium">Password</label>
                        <input type="password" name="password" required class="w-full px-4 py-3 rounded-xl bg-gray-800 border border-gray-700 text-white
                                   placeholder-gray-600 outline-none focus:border-violet-500
                                   focus:ring-2 focus:ring-violet-500/30 transition" placeholder="Your password">
                    </div>

                    {{-- Remember me --}}
                    <label class="flex items-center gap-2.5 cursor-pointer select-none">
                        <input type="checkbox" name="remember" class="w-4 h-4 rounded accent-violet-500">
                        <span class="text-sm text-gray-400">Remember me</span>
                    </label>

                    <button type="submit" class="w-full py-3.5 rounded-xl bg-linear-to-r from-violet-600 to-fuchsia-600
                               hover:from-violet-500 hover:to-fuchsia-500 font-bold text-white text-base
                               transition-all duration-200 active:scale-95 shadow-lg shadow-violet-900/40">
                        Sign In
                    </button>
                </form>

                <p class="text-center text-gray-500 text-sm mt-6">
                    Don't have an account?
                    <a href="/register"
                        class="text-violet-400 hover:text-violet-300 font-medium transition">Register</a>
                </p>
            </div>
        </div>
    </div>
</x-layouts.app>