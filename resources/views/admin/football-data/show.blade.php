<x-app-layout>
    <x-slot name="header">
        <div>
            <h1 class="page-title">Dataset Details</h1>
            <p class="page-subtitle">Inspect payload metadata and full JSON response.</p>
        </div>
    </x-slot>

    <div class="page-shell pt-6">
        <div class="max-w-5xl">
            <div class="surface-card p-6 space-y-5">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="surface-muted p-4">
                        <div class="text-xs uppercase font-semibold tracking-wide text-slate-500">Type</div>
                        <div class="font-semibold text-slate-900 mt-1">{{ $dataset->type }}</div>
                    </div>
                    <div class="surface-muted p-4">
                        <div class="text-xs uppercase font-semibold tracking-wide text-slate-500">League</div>
                        <div class="font-semibold text-slate-900 mt-1">{{ $dataset->league }}</div>
                    </div>
                    <div class="surface-muted p-4">
                        <div class="text-xs uppercase font-semibold tracking-wide text-slate-500">Season</div>
                        <div class="font-semibold text-slate-900 mt-1">{{ $dataset->season }}</div>
                    </div>
                </div>

                <div>
                    <div class="text-sm font-semibold text-slate-700 mb-2">Payload</div>
                    <pre class="p-4 bg-slate-950 text-slate-100 rounded-xl text-xs overflow-x-auto">{{ json_encode($dataset->payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) }}</pre>
                </div>

                <div class="flex items-center gap-4">
                    <a href="{{ route('admin.football-data.edit', $dataset) }}" class="brand-button">Edit</a>
                    <a href="{{ route('admin.football-data.index') }}" class="ghost-button">Back</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
