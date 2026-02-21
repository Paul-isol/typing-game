<x-layouts.app>
    <div class="min-h-screen flex items-center justify-center bg-gray-950 px-4">
        {{-- Starfield already in layout --}}
        <div class="w-full max-w-md z-10">

            {{-- Card --}}
            <div class="bg-gray-900/80 backdrop-blur border border-gray-800 rounded-3xl p-8 shadow-2xl shadow-black/60">

                {{-- Logo / Title --}}
                <div class="text-center mb-8">
                    <h1
                        class="text-4xl font-bold bg-linear-to-r from-violet-400 via-fuchsia-400 to-cyan-400 bg-clip-text text-transparent">
                        TypeBlast
                    </h1>
                    <p class="text-gray-500 mt-1 text-sm">Create your account</p>
                </div>

                {{-- Errors --}}
                @if ($errors->any())
                    <div class="mb-5 rounded-xl bg-rose-500/10 border border-rose-500/30 p-4">
                        <ul class="text-rose-400 text-sm space-y-1 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="/register" class="space-y-5">
                    @csrf

                    {{-- Name --}}
                    <div>
                        <label class="block text-sm text-gray-400 mb-1.5 font-medium">Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" required autofocus class="w-full px-4 py-3 rounded-xl bg-gray-800 border border-gray-700 text-white
                                   placeholder-gray-600 outline-none focus:border-violet-500
                                   focus:ring-2 focus:ring-violet-500/30 transition" placeholder="Your name">
                    </div>

                    {{-- Email --}}
                    <div>
                        <label class="block text-sm text-gray-400 mb-1.5 font-medium">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" required class="w-full px-4 py-3 rounded-xl bg-gray-800 border border-gray-700 text-white
                                   placeholder-gray-600 outline-none focus:border-violet-500
                                   focus:ring-2 focus:ring-violet-500/30 transition" placeholder="you@example.com">
                    </div>

                    {{-- Password --}}
                    <div>
                        <label class="block text-sm text-gray-400 mb-1.5 font-medium">Password</label>
                        <input type="password" name="password" required class="w-full px-4 py-3 rounded-xl bg-gray-800 border border-gray-700 text-white
                                   placeholder-gray-600 outline-none focus:border-violet-500
                                   focus:ring-2 focus:ring-violet-500/30 transition" placeholder="Min. 8 characters">
                    </div>

                    {{-- Confirm Password --}}
                    <div>
                        <label class="block text-sm text-gray-400 mb-1.5 font-medium">Confirm Password</label>
                        <input type="password" name="password_confirmation" required class="w-full px-4 py-3 rounded-xl bg-gray-800 border border-gray-700 text-white
                                   placeholder-gray-600 outline-none focus:border-violet-500
                                   focus:ring-2 focus:ring-violet-500/30 transition"
                            placeholder="Repeat your password">
                    </div>

                    {{-- Submit --}}
                    <button type="submit" class="w-full py-3.5 rounded-xl bg-linear-to-r from-violet-600 to-fuchsia-600
                               hover:from-violet-500 hover:to-fuchsia-500 font-bold text-white text-base
                               transition-all duration-200 active:scale-95 shadow-lg shadow-violet-900/40 mt-2">
                        Create Account
                    </button>
                </form>

                {{-- Login link --}}
                <p class="text-center text-gray-500 text-sm mt-6">
                    Already have an account?
                    <a href="/login" class="text-violet-400 hover:text-violet-300 font-medium transition">Sign in</a>
                </p>
            </div>
        </div>
    </div>
</x-layouts.app>