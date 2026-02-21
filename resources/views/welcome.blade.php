<x-layouts.app>
    <div id="game-app"
        class="min-h-screen flex flex-col items-center justify-center bg-gray-950 text-white relative overflow-hidden">

        {{-- ===== START SCREEN ===== --}}
        <div id="start-screen" class="flex flex-col items-center gap-8 z-10">
            <div class="text-center">
                <h1
                    class="text-6xl font-bold tracking-tight bg-gradient-to-r from-violet-400 via-fuchsia-400 to-cyan-400 bg-clip-text text-transparent mb-3">
                    TypeBlast
                </h1>
                <p class="text-gray-400 text-lg">Burst the bubbles before they escape!</p>
            </div>

            {{-- Difficulty picker --}}
            <div class="flex gap-4" id="difficulty-picker">
                <button data-diff="easy"
                    class="diff-btn px-6 py-3 rounded-xl border-2 border-emerald-500 text-emerald-400 font-semibold
                           hover:bg-emerald-500 hover:text-white transition-all duration-200 text-sm uppercase tracking-widest">
                    Easy
                </button>
                <button data-diff="medium"
                    class="diff-btn px-6 py-3 rounded-xl border-2 border-amber-500 text-amber-400 font-semibold
                           hover:bg-amber-500 hover:text-white transition-all duration-200 text-sm uppercase tracking-widest">
                    Medium
                </button>
                <button data-diff="hard"
                    class="diff-btn px-6 py-3 rounded-xl border-2 border-rose-500 text-rose-400 font-semibold
                           hover:bg-rose-500 hover:text-white transition-all duration-200 text-sm uppercase tracking-widest">
                    Hard
                </button>
            </div>

            <button id="start-btn" class="mt-2 px-10 py-4 rounded-2xl bg-gradient-to-r from-violet-600 to-fuchsia-600
                       hover:from-violet-500 hover:to-fuchsia-500 font-bold text-xl shadow-lg shadow-violet-900/40
                       transition-all duration-200 active:scale-95 disabled:opacity-40 disabled:cursor-not-allowed"
                disabled>
                START GAME
            </button>

            <p id="start-error" class="text-rose-400 text-sm hidden">Select a difficulty first!</p>
        </div>

        {{-- ===== GAME ARENA ===== --}}
        <div id="game-screen" class="hidden w-full h-screen relative overflow-hidden">

            {{-- HUD --}}
            <div class="absolute top-0 left-0 right-0 z-20 flex justify-between items-center px-8 py-4
                        bg-gradient-to-b from-gray-950/90 to-transparent pointer-events-none">
                <div class="flex items-center gap-2">
                    <span class="text-gray-400 text-sm uppercase tracking-widest">Score</span>
                    <span id="hud-score" class="text-2xl font-bold text-violet-300">0</span>
                </div>
                <div class="flex items-center gap-3">
                    <div id="timer-ring" class="w-14 h-14 relative flex items-center justify-center">
                        <svg class="absolute inset-0 -rotate-90" viewBox="0 0 48 48">
                            <circle cx="24" cy="24" r="20" fill="none" stroke="#374151" stroke-width="4" />
                            <circle id="timer-arc" cx="24" cy="24" r="20" fill="none" stroke="#a78bfa" stroke-width="4"
                                stroke-dasharray="125.66" stroke-dashoffset="0" stroke-linecap="round" />
                        </svg>
                        <span id="hud-timer" class="text-lg font-bold text-violet-300 z-10">60</span>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-gray-400 text-sm uppercase tracking-widest">Hits</span>
                    <span id="hud-hits" class="text-2xl font-bold text-cyan-300">0</span>
                    <span class="text-gray-600">/</span>
                    <span id="hud-total" class="text-2xl font-bold text-gray-500">0</span>
                </div>
            </div>

            {{-- Bubble arena --}}
            <div id="bubble-arena" class="absolute inset-0 top-20 bottom-28"></div>

            {{-- Input bar --}}
            <div class="absolute bottom-0 left-0 right-0 z-20 flex justify-center pb-6">
                <div class="relative">
                    <input id="type-input" type="text" autocomplete="off" spellcheck="false"
                        placeholder="Type a word and press Enter…" class="w-96 md:w-[600px] px-6 py-4 rounded-2xl bg-gray-800/80 backdrop-blur border border-gray-700
                               text-white text-lg placeholder-gray-600 outline-none
                               focus:border-violet-500 focus:ring-2 focus:ring-violet-500/30 transition">
                    <span id="input-feedback"
                        class="absolute right-4 top-1/2 -translate-y-1/2 text-lg opacity-0 transition-opacity"></span>
                </div>
            </div>
        </div>

        {{-- ===== RESULTS SCREEN ===== --}}
        <div id="results-screen" class="hidden flex flex-col items-center gap-8 z-10 px-6 text-center">
            <h2 class="text-5xl font-bold bg-gradient-to-r from-violet-400 to-cyan-400 bg-clip-text text-transparent">
                Game Over!
            </h2>

            <div class="grid grid-cols-3 gap-6">
                <div class="stat-card bg-gray-900 border border-violet-500/30 rounded-2xl px-8 py-6">
                    <div class="text-4xl font-bold text-violet-300" id="res-score">0</div>
                    <div class="text-gray-400 text-sm mt-1 uppercase tracking-widest">Score</div>
                </div>
                <div class="stat-card bg-gray-900 border border-cyan-500/30 rounded-2xl px-8 py-6">
                    <div class="text-4xl font-bold text-cyan-300" id="res-wpm">0</div>
                    <div class="text-gray-400 text-sm mt-1 uppercase tracking-widest">WPM</div>
                </div>
                <div class="stat-card bg-gray-900 border border-fuchsia-500/30 rounded-2xl px-8 py-6">
                    <div class="text-4xl font-bold text-fuchsia-300" id="res-accuracy">0%</div>
                    <div class="text-gray-400 text-sm mt-1 uppercase tracking-widest">Accuracy</div>
                </div>
            </div>

            <div id="res-save-status" class="text-sm text-gray-500"></div>

            <button id="play-again-btn" class="px-10 py-4 rounded-2xl bg-gradient-to-r from-violet-600 to-fuchsia-600
                       hover:from-violet-500 hover:to-fuchsia-500 font-bold text-xl
                       transition-all duration-200 active:scale-95">
                Play Again
            </button>
        </div>

        {{-- Star background --}}
        <div id="stars" class="fixed inset-0 pointer-events-none overflow-hidden z-0"></div>
    </div>

    <style>
        @keyframes floatUp {
            0% {
                transform: translateY(0) scale(1);
                opacity: 1;
            }

            90% {
                opacity: 1;
            }

            100% {
                transform: translateY(-110vh) scale(0.8);
                opacity: 0;
            }
        }

        @keyframes burst {
            0% {
                transform: scale(1);
                opacity: 1;
            }

            50% {
                transform: scale(1.6);
                opacity: 0.6;
            }

            100% {
                transform: scale(0);
                opacity: 0;
            }
        }

        @keyframes twinkle {

            0%,
            100% {
                opacity: .1;
            }

            50% {
                opacity: .5;
            }
        }

        .bubble {
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 9999px;
            font-weight: 700;
            cursor: default;
            user-select: none;
            animation: floatUp linear forwards;
            border: 2px solid rgba(167, 139, 250, .4);
            background: radial-gradient(circle at 35% 35%, rgba(167, 139, 250, .25), rgba(30, 27, 75, .6));
            backdrop-filter: blur(4px);
            text-shadow: 0 0 12px rgba(167, 139, 250, .9);
            box-shadow: 0 0 18px rgba(167, 139, 250, .25), inset 0 0 12px rgba(255, 255, 255, .06);
            transition: background .15s;
        }

        .bubble.highlight {
            border-color: rgba(34, 211, 238, .8);
            background: radial-gradient(circle at 35% 35%, rgba(34, 211, 238, .35), rgba(14, 116, 144, .5));
            box-shadow: 0 0 28px rgba(34, 211, 238, .5);
            text-shadow: 0 0 16px rgba(34, 211, 238, 1);
        }

        .bubble.bursting {
            animation: burst .3s ease-out forwards !important;
        }

        .star {
            position: absolute;
            border-radius: 50%;
            background: white;
            animation: twinkle ease-in-out infinite;
        }
    </style>

    <script>
        (() => {
            // ─── Config ─────────────────────────────────────────────────────────
            const GAME_DURATION = 60;   // seconds
            const SPAWN_INTERVAL = 1800; // ms between new bubbles
            const POINTS_PER_WORD = 10;
            const CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]')?.content ?? '';

            // ─── State ───────────────────────────────────────────────────────────
            let difficulty = null;
            let sessionId = null;
            let wordBank = [];
            let activeBubbles = [];   // { el, word }
            let score = 0;
            let typedCount = 0;     // total attempts (Enter presses with text)
            let hitCount = 0;     // correctly typed
            let timeLeft = GAME_DURATION;
            let timerHandle = null;
            let spawnHandle = null;
            let gameStartedAt = null;

            // ─── DOM refs ────────────────────────────────────────────────────────
            const startScreen = document.getElementById('start-screen');
            const gameScreen = document.getElementById('game-screen');
            const resultsScreen = document.getElementById('results-screen');
            const diffBtns = document.querySelectorAll('.diff-btn');
            const startBtn = document.getElementById('start-btn');
            const typeInput = document.getElementById('type-input');
            const arena = document.getElementById('bubble-arena');
            const hudScore = document.getElementById('hud-score');
            const hudTimer = document.getElementById('hud-timer');
            const hudHits = document.getElementById('hud-hits');
            const hudTotal = document.getElementById('hud-total');
            const timerArc = document.getElementById('timer-arc');
            const feedback = document.getElementById('input-feedback');
            const resScore = document.getElementById('res-score');
            const resWpm = document.getElementById('res-wpm');
            const resAccuracy = document.getElementById('res-accuracy');
            const resSaveStatus = document.getElementById('res-save-status');
            const playAgainBtn = document.getElementById('play-again-btn');

            // ─── Stars background ────────────────────────────────────────────────
            const starsEl = document.getElementById('stars');
            for (let i = 0; i < 120; i++) {
                const s = document.createElement('div');
                s.className = 'star';
                const size = Math.random() * 2 + 1;
                s.style.cssText = `
                width:${size}px; height:${size}px;
                top:${Math.random() * 100}%; left:${Math.random() * 100}%;
                animation-duration:${2 + Math.random() * 4}s;
                animation-delay:${Math.random() * 4}s;
            `;
                starsEl.appendChild(s);
            }

            // ─── Difficulty selection ─────────────────────────────────────────────
            diffBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    diffBtns.forEach(b => b.classList.remove('ring-2', 'ring-white/50'));
                    btn.classList.add('ring-2', 'ring-white/50');
                    difficulty = btn.dataset.diff;
                    startBtn.disabled = false;
                });
            });

            // ─── Start game ───────────────────────────────────────────────────────
            startBtn.addEventListener('click', async () => {
                startBtn.disabled = true;
                startBtn.textContent = 'Loading…';

                try {
                    const res = await fetch('/game/start', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': CSRF_TOKEN,
                            'Accept': 'application/json',
                        },
                        body: JSON.stringify({ difficulty }),
                    });
                    const data = await res.json();
                    sessionId = data.session_id;
                    wordBank = [...data.words];
                    beginGame();
                } catch (e) {
                    startBtn.disabled = false;
                    startBtn.textContent = 'START GAME';
                    alert('Could not start game. Is the server running?');
                }
            });

            // ─── Begin game ───────────────────────────────────────────────────────
            function beginGame() {
                score = 0; typedCount = 0; hitCount = 0;
                timeLeft = GAME_DURATION;
                activeBubbles = [];
                arena.innerHTML = '';
                gameStartedAt = Date.now();

                startScreen.classList.add('hidden');
                gameScreen.classList.remove('hidden');
                typeInput.focus();

                updateHUD();
                spawnBubble();
                spawnHandle = setInterval(spawnBubble, SPAWN_INTERVAL);
                timerHandle = setInterval(tick, 1000);
            }

            // ─── Timer tick ───────────────────────────────────────────────────────
            function tick() {
                timeLeft--;
                updateHUD();
                if (timeLeft <= 0) endGame();
            }

            function updateHUD() {
                hudScore.textContent = score;
                hudTimer.textContent = timeLeft;
                hudHits.textContent = hitCount;
                hudTotal.textContent = typedCount;
                // arc (circumference = 2π*20 ≈ 125.66)
                const pct = timeLeft / GAME_DURATION;
                timerArc.setAttribute('stroke-dashoffset', 125.66 * (1 - pct));
                if (timeLeft <= 10) timerArc.setAttribute('stroke', '#f87171');
            }

            // ─── Spawn a bubble ───────────────────────────────────────────────────
            function spawnBubble() {
                if (wordBank.length === 0 || timeLeft <= 0) return;
                const word = wordBank[Math.floor(Math.random() * wordBank.length)];

                const size = Math.max(80, word.length * 14 + 40);
                const duration = difficulty === 'easy' ? 9 : difficulty === 'medium' ? 7 : 5;
                const maxLeft = arena.offsetWidth - size - 20;
                const leftPx = Math.max(10, Math.floor(Math.random() * maxLeft));

                const el = document.createElement('div');
                el.className = 'bubble';
                el.textContent = word;
                el.style.cssText = `
                width:${size}px; height:${size}px;
                font-size:${Math.max(13, size / 5.5)}px;
                bottom: -${size}px;
                left: ${leftPx}px;
                animation-duration: ${duration}s;
                color: rgba(221,214,254,0.95);
            `;
                arena.appendChild(el);

                const entry = { el, word };
                activeBubbles.push(entry);

                // Remove from list when animation ends
                el.addEventListener('animationend', () => {
                    activeBubbles = activeBubbles.filter(b => b !== entry);
                    el.remove();
                });
            }

            // ─── Typing logic ─────────────────────────────────────────────────────
            typeInput.addEventListener('input', () => {
                const typed = typeInput.value.trim().toLowerCase();
                if (!typed) {
                    activeBubbles.forEach(b => b.el.classList.remove('highlight'));
                    return;
                }

                // Check for exact match first → auto-burst
                const idx = activeBubbles.findIndex(b => b.word === typed);
                if (idx !== -1) {
                    typedCount++;
                    hitCount++;
                    score += POINTS_PER_WORD;
                    burstBubble(activeBubbles[idx]);
                    activeBubbles.splice(idx, 1);
                    flashFeedback('✓', 'text-emerald-400');
                    typeInput.value = '';
                    activeBubbles.forEach(b => b.el.classList.remove('highlight'));
                    updateHUD();
                    return;
                }

                // Highlight bubbles that start with what the player typed so far
                activeBubbles.forEach(b => {
                    if (b.word.startsWith(typed)) {
                        b.el.classList.add('highlight');
                    } else {
                        b.el.classList.remove('highlight');
                    }
                });
            });

            function burstBubble(entry) {
                entry.el.classList.add('bursting');
                entry.el.addEventListener('animationend', () => entry.el.remove(), { once: true });
            }

            function flashFeedback(char, colorClass) {
                feedback.textContent = char;
                feedback.className = `absolute right-4 top-1/2 -translate-y-1/2 text-lg ${colorClass}`;
                feedback.style.opacity = '1';
                setTimeout(() => { feedback.style.opacity = '0'; }, 500);
            }

            // ─── End game ─────────────────────────────────────────────────────────
            async function endGame() {
                clearInterval(timerHandle);
                clearInterval(spawnHandle);

                // Final stats
                const elapsedMinutes = (Date.now() - gameStartedAt) / 60000;
                const wpm = Math.round(hitCount / elapsedMinutes);
                const accuracy = typedCount > 0
                    ? parseFloat(((hitCount / typedCount) * 100).toFixed(2))
                    : 0;

                // Show results
                gameScreen.classList.add('hidden');
                resultsScreen.classList.remove('hidden');
                resScore.textContent = score;
                resWpm.textContent = wpm;
                resAccuracy.textContent = accuracy + '%';

                // Save to backend
                resSaveStatus.textContent = 'Saving your score…';
                try {
                    const res = await fetch('/game/end', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': CSRF_TOKEN,
                            'Accept': 'application/json',
                        },
                        body: JSON.stringify({
                            session_id: sessionId,
                            score,
                            accuracy,
                            wpm,
                        }),
                    });
                    const data = await res.json();
                    resSaveStatus.textContent = '✅ Score saved!';
                } catch (err) {
                    resSaveStatus.textContent = '⚠️ Could not save score (offline?)';
                }
            }

            // ─── Play again ───────────────────────────────────────────────────────
            playAgainBtn.addEventListener('click', () => {
                resultsScreen.classList.add('hidden');
                startScreen.classList.remove('hidden');
                startBtn.disabled = false;
                startBtn.textContent = 'START GAME';
                diffBtns.forEach(b => b.classList.remove('ring-2', 'ring-white/50'));
                difficulty = null;
                startBtn.disabled = true;
            });

        })();
    </script>
</x-layouts.app>