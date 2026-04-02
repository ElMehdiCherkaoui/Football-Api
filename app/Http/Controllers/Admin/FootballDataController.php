<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFootballDataRequest;
use App\Http\Requests\UpdateFootballDataRequest;
use App\Models\FootballData;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class FootballDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $datasets = FootballData::query()
            ->orderBy('league')
            ->orderBy('season')
            ->orderBy('type')
            ->paginate(20);

        return view('admin.football-data.index', [
            'datasets' => $datasets,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.football-data.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFootballDataRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $attributes = [
            'type' => $validated['type'],
            'league' => $validated['league'],
            'season' => $validated['season'],
            'payload' => $validated['payload'],
        ];

        FootballData::query()->updateOrCreate(
            [
                'type' => $attributes['type'],
                'league' => $attributes['league'],
                'season' => $attributes['season'],
            ],
            $attributes,
        );

        return redirect()->route('admin.football-data.index')->with('status', 'Dataset saved successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(FootballData $footballData): View
    {
        return view('admin.football-data.show', [
            'dataset' => $footballData,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FootballData $footballData): View
    {
        return view('admin.football-data.edit', [
            'dataset' => $footballData,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFootballDataRequest $request, FootballData $footballData): RedirectResponse
    {
        $validated = $request->validated();

        $attributes = [
            'type' => $validated['type'],
            'league' => $validated['league'],
            'season' => $validated['season'],
            'payload' => $validated['payload'],
        ];

        $footballData->update($attributes);

        return redirect()->route('admin.football-data.index')->with('status', 'Dataset updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FootballData $footballData): RedirectResponse
    {
        $footballData->delete();

        return redirect()->route('admin.football-data.index')->with('status', 'Dataset deleted successfully.');
    }
}
