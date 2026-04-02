<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FootballData;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class FixturesController extends Controller
{
    /**
     * @throws ValidationException
     */
    public function __invoke(Request $request): JsonResponse
    {
        $validated = validator($request->query(), [
            'league' => ['required', 'integer', 'min:1'],
            'season' => ['required', 'integer', 'digits:4'],
        ])->validate();

        $dataset = FootballData::query()
            ->where('type', FootballData::TYPE_FIXTURES)
            ->where('league', $validated['league'])
            ->where('season', $validated['season'])
            ->first();

        if (! $dataset) {
            return response()->json([
                'message' => 'Fixtures dataset not found for the given league and season.',
            ], 404);
        }

        return response()->json($dataset->payload);
    }
}
