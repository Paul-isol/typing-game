<?php

namespace Database\Seeders;

use App\Models\Word;
use Illuminate\Database\Seeder;

class WordSeeder extends Seeder
{
    public function run(): void
    {
        $words = [
            // Easy (short, common words)
            ['word' => 'cat',    'difficulty' => 'easy'],
            ['word' => 'dog',    'difficulty' => 'easy'],
            ['word' => 'sun',    'difficulty' => 'easy'],
            ['word' => 'run',    'difficulty' => 'easy'],
            ['word' => 'top',    'difficulty' => 'easy'],
            ['word' => 'map',    'difficulty' => 'easy'],
            ['word' => 'cup',    'difficulty' => 'easy'],
            ['word' => 'hat',    'difficulty' => 'easy'],
            ['word' => 'big',    'difficulty' => 'easy'],
            ['word' => 'fox',    'difficulty' => 'easy'],
            ['word' => 'bus',    'difficulty' => 'easy'],
            ['word' => 'pen',    'difficulty' => 'easy'],
            ['word' => 'red',    'difficulty' => 'easy'],
            ['word' => 'fly',    'difficulty' => 'easy'],
            ['word' => 'hot',    'difficulty' => 'easy'],
            ['word' => 'joy',    'difficulty' => 'easy'],
            ['word' => 'bed',    'difficulty' => 'easy'],
            ['word' => 'arm',    'difficulty' => 'easy'],
            ['word' => 'sky',    'difficulty' => 'easy'],
            ['word' => 'sea',    'difficulty' => 'easy'],

            // Medium (everyday words)
            ['word' => 'table',   'difficulty' => 'medium'],
            ['word' => 'cloud',   'difficulty' => 'medium'],
            ['word' => 'stone',   'difficulty' => 'medium'],
            ['word' => 'grove',   'difficulty' => 'medium'],
            ['word' => 'plant',   'difficulty' => 'medium'],
            ['word' => 'flame',   'difficulty' => 'medium'],
            ['word' => 'brave',   'difficulty' => 'medium'],
            ['word' => 'light',   'difficulty' => 'medium'],
            ['word' => 'chess',   'difficulty' => 'medium'],
            ['word' => 'grain',   'difficulty' => 'medium'],
            ['word' => 'blade',   'difficulty' => 'medium'],
            ['word' => 'swift',   'difficulty' => 'medium'],
            ['word' => 'frost',   'difficulty' => 'medium'],
            ['word' => 'jewel',   'difficulty' => 'medium'],
            ['word' => 'ocean',   'difficulty' => 'medium'],
            ['word' => 'storm',   'difficulty' => 'medium'],
            ['word' => 'crisp',   'difficulty' => 'medium'],
            ['word' => 'blend',   'difficulty' => 'medium'],
            ['word' => 'spine',   'difficulty' => 'medium'],
            ['word' => 'prism',   'difficulty' => 'medium'],

            // Hard (longer, complex words)
            ['word' => 'phosphor',     'difficulty' => 'hard'],
            ['word' => 'labyrinth',    'difficulty' => 'hard'],
            ['word' => 'algorithm',    'difficulty' => 'hard'],
            ['word' => 'cryptogram',   'difficulty' => 'hard'],
            ['word' => 'subsequent',   'difficulty' => 'hard'],
            ['word' => 'conundrum',    'difficulty' => 'hard'],
            ['word' => 'hyperbola',    'difficulty' => 'hard'],
            ['word' => 'trajectory',   'difficulty' => 'hard'],
            ['word' => 'bibliography', 'difficulty' => 'hard'],
            ['word' => 'chromosome',   'difficulty' => 'hard'],
            ['word' => 'synthesize',   'difficulty' => 'hard'],
            ['word' => 'archipelago',  'difficulty' => 'hard'],
            ['word' => 'rendezvous',   'difficulty' => 'hard'],
            ['word' => 'kaleidoscope', 'difficulty' => 'hard'],
            ['word' => 'whirlpool',    'difficulty' => 'hard'],
            ['word' => 'phenomenon',   'difficulty' => 'hard'],
            ['word' => 'juxtapose',    'difficulty' => 'hard'],
            ['word' => 'exquisite',    'difficulty' => 'hard'],
            ['word' => 'ambiguous',    'difficulty' => 'hard'],
            ['word' => 'flamboyant',   'difficulty' => 'hard'],
        ];

        foreach ($words as $word) {
            Word::firstOrCreate(['word' => $word['word']], ['difficulty' => $word['difficulty']]);
        }

        $this->command->info('✅ Seeded ' . count($words) . ' words.');
    }
}
