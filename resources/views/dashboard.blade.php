<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between gap-4">
            <div>
                <h1 class="page-title">Dashboard</h1>
                <p class="page-subtitle">Overview of your football datasets and quick actions.</p>
            </div>
            <a href="{{ route('admin.football-data.create') }}" class="brand-button">Add Dataset</a>
        </div>
    </x-slot>

    <div class="page-shell pt-6">
        @php
            $datasetCount = \App\Models\FootballData::query()->count();
            $fixtureCount = \App\Models\FootballData::query()->where('type', \App\Models\FootballData::TYPE_FIXTURES)->count();
            $scorerCount = \App\Models\FootballData::query()->where('type', \App\Models\FootballData::TYPE_TOPSCORERS)->count();
        @endphp

        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            <div class="surface-card p-5">
                <p class="text-sm text-slate-500">Total Datasets</p>
                <p class="mt-2 text-3xl font-bold text-slate-900">{{ $datasetCount }}</p>
            </div>
            <div class="surface-card p-5">
                <p class="text-sm text-slate-500">Fixtures Datasets</p>
                <p class="mt-2 text-3xl font-bold text-slate-900">{{ $fixtureCount }}</p>
            </div>
            <div class="surface-card p-5">
                <p class="text-sm text-slate-500">Top Scorers Datasets</p>
                <p class="mt-2 text-3xl font-bold text-slate-900">{{ $scorerCount }}</p>
            </div>
        </div>

        <div class="surface-card p-6 mt-6">
            <h2 class="text-lg font-semibold text-slate-900">Quick Start</h2>
            <p class="text-sm text-slate-600 mt-1">Manage your imported payloads and verify endpoints from one place.</p>
            <div class="mt-4 flex flex-wrap gap-3">
                <a href="{{ route('admin.football-data.index') }}" class="ghost-button">Open Football Data</a>
                <a href="{{ route('admin.football-data.create') }}" class="brand-button">Create Dataset</a>
            </div>
        </div>

        <div class="surface-muted p-4 mt-6 text-sm text-slate-700">
            Logged in as <span class="font-semibold">{{ Auth::user()->email }}</span>
        </div>
    </div>
</x-app-layout>
