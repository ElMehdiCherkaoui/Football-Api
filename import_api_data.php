<?php

require __DIR__.'/vendor/autoload.php';

$app = require __DIR__.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\FootballData;
use Illuminate\Support\Facades\Http;

$apiKey = '1df55bc1be4866d822a400f3c0a07938';
$league = isset($argv[1]) ? (int) $argv[1] : 19;
$season = isset($argv[2]) ? (int) $argv[2] : 2024;

$fixtures = Http::withHeaders([
    'x-apisports-key' => $apiKey,
])->get('https://v3.football.api-sports.io/fixtures', [
    'league' => $league,
    'season' => $season,
])->json();

$topScorers = Http::withHeaders([
    'x-apisports-key' => $apiKey,
])->get('https://v3.football.api-sports.io/players/topscorers', [
    'league' => $league,
    'season' => $season,
])->json();

FootballData::updateOrCreate(
    [
        'type' => FootballData::TYPE_FIXTURES,
        'league' => $league,
        'season' => $season,
    ],
    [
        'payload' => $fixtures,
    ]
);

FootballData::updateOrCreate(
    [
        'type' => FootballData::TYPE_TOPSCORERS,
        'league' => $league,
        'season' => $season,
    ],
    [
        'payload' => $topScorers,
    ]
);

echo 'league=' . $league . ' season=' . $season . PHP_EOL;
echo 'fixtures=' . ($fixtures['results'] ?? 'n/a') . PHP_EOL;
echo 'topscorers=' . ($topScorers['results'] ?? 'n/a') . PHP_EOL;
