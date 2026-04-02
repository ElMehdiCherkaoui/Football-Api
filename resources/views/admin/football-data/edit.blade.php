<x-app-layout>
    <x-slot name="header">
        <div>
            <h1 class="page-title">Edit Dataset</h1>
            <p class="page-subtitle">Update type, league, season, and payload JSON.</p>
        </div>
    </x-slot>

    <div class="page-shell pt-6">
        <div class="max-w-4xl">
            <div class="surface-card p-6 sm:p-8">
                <form method="POST" action="{{ route('admin.football-data.update', $dataset) }}">
                    @csrf
                    @method('PUT')
                    @include('admin.football-data._form', ['submitLabel' => 'Update'])
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
