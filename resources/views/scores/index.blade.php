<x-layouts.app>
    <div class="min-h-screen bg-gray-950 text-white px-4 py-10">
        <div class="max-w-4xl mx-auto">

            {{-- Header --}}
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h1
                        class="text-3xl font-bold bg-linear-to-r from-violet-400 to-cyan-400 bg-clip-text text-transparent">
                        My Scores
                    </h1>
                    <p class="text-gray-500 text-sm mt-1">Your last 20 games, {{ auth()->user()->name }}</p>
                </div>
                <a href="/"
                    class="px-5 py-2.5 rounded-xl bg-linear-to-r from-violet-600 to-fuchsia-600
                           hover:from-violet-500 hover:to-fuchsia-500 font-semibold text-sm transition-all duration-200 active:scale-95">
                    ▶ Play Again
                </a>
            </div>

            @if ($scores->isEmpty())
                {{-- Empty state --}}
                <div class="flex flex-col items-center justify-center py-32 text-center">
                    <div class="text-7xl mb-6">🎮</div>
                    <h2 class="text-2xl font-bold text-gray-400 mb-2">No games yet!</h2>
                    <p class="text-gray-600 mb-8">Play your first game to see your scores here.</p>
                    <a href="/" class="px-8 py-3 rounded-xl bg-linear-to-r from-violet-600 to-fuchsia-600
                                       hover:from-violet-500 hover:to-fuchsia-500 font-bold transition-all duration-200">
                        Start Playing
                    </a>
                </div>
            @else
                {{-- Stats summary --}}
                @php
                    $best = $scores->max('score');
                    $avgWpm = round($scores->avg('wpm'));
                    $avgAcc = round($scores->avg('accuracy'), 1);
                @endphp
                <div class="grid grid-cols-3 gap-4 mb-8">
                    <div class="bg-gray-900 border border-violet-500/20 rounded-2xl px-6 py-5 text-center">
                        <div class="text-3xl font-bold text-violet-300">{{ $best }}</div>
                        <div class="text-gray-500 text-xs mt-1 uppercase tracking-widest">Best Score</div>
                    </div>
                    <div class="bg-gray-900 border border-cyan-500/20 rounded-2xl px-6 py-5 text-center">
                        <div class="text-3xl font-bold text-cyan-300">{{ $avgWpm }}</div>
                        <div class="text-gray-500 text-xs mt-1 uppercase tracking-widest">Avg. WPM</div>
                    </div>
                    <div class="bg-gray-900 border border-fuchsia-500/20 rounded-2xl px-6 py-5 text-center">
                        <div class="text-3xl font-bold text-fuchsia-300">{{ $avgAcc }}%</div>
                        <div class="text-gray-500 text-xs mt-1 uppercase tracking-widest">Avg. Accuracy</div>
                    </div>
                </div>

                {{-- Scores table --}}
                <div class="bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b border-gray-800 text-gray-500 uppercase text-xs tracking-widest">
                                <th class="px-6 py-4 text-left">#</th>
                                <th class="px-6 py-4 text-left">Date</th>
                                <th class="px-6 py-4 text-left">Difficulty</th>
                                <th class="px-6 py-4 text-right">Score</th>
                                <th class="px-6 py-4 text-right">WPM</th>
                                <th class="px-6 py-4 text-right">Accuracy</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($scores as $i => $row)
                                <tr
                                    class="border-b border-gray-800/50 hover:bg-gray-800/40 transition-colors
                                                                               {{ $row->score === $best ? 'bg-violet-950/20' : '' }}">
                                    <td class="px-6 py-4 text-gray-600">{{ $i + 1 }}</td>
                                    <td class="px-6 py-4 text-gray-400">
                                        {{ $row->created_at->format('M d, Y · H:i') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @php
                                            $diff = $row->session?->difficulty ?? '—';
                                            $color = match ($diff) {
                                                'easy' => 'text-emerald-400 border-emerald-500/30 bg-emerald-500/10',
                                                'medium' => 'text-amber-400 border-amber-500/30 bg-amber-500/10',
                                                'hard' => 'text-rose-400 border-rose-500/30 bg-rose-500/10',
                                                default => 'text-gray-500 border-gray-700 bg-gray-800',
                                            };
                                        @endphp
                                        <span
                                            class="px-2.5 py-0.5 rounded-full border text-xs font-semibold uppercase {{ $color }}">
                                            {{ $diff }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-right font-bold text-violet-300">
                                        {{ $row->score }}
                                        @if ($row->score === $best)
                                            <span class="ml-1 text-xs text-yellow-400">★</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-right text-cyan-300">{{ $row->wpm }}</td>
                                    <td class="px-6 py-4 text-right text-fuchsia-300">{{ $row->accuracy }}%</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</x-layouts.app>