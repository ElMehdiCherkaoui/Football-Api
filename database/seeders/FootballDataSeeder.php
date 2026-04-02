<?php

namespace Database\Seeders;

use App\Models\FootballData;
use Illuminate\Database\Seeder;
use RuntimeException;

class FootballDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $this->seedFromFile(FootballData::TYPE_FIXTURES, database_path('seeders/data/fixtures_19_2024.json'));
        $this->seedFromFile(FootballData::TYPE_TOPSCORERS, database_path('seeders/data/topscorers_19_2024.json'));
    }

    private function seedFromFile(string $type, string $path): void
    {
        $raw = file_get_contents($path);

        if ($raw === false) {
            throw new RuntimeException('Unable to read seed file: '.$path);
        }

        $payload = json_decode($raw, true);

        if (! is_array($payload)) {
            throw new RuntimeException('Invalid JSON in seed file: '.$path);
        }

        $league = (int) data_get($payload, 'parameters.league');
        $season = (int) data_get($payload, 'parameters.season');

        if ($league < 1 || $season < 1) {
            throw new RuntimeException('Missing or invalid parameters.league/season in seed file: '.$path);
        }

        FootballData::query()->updateOrCreate(
            [
                'type' => $type,
                'league' => $league,
                'season' => $season,
            ],
            [
                'payload' => $payload,
            ],
        );
    }
}
