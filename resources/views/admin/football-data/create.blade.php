<x-app-layout>
    <x-slot name="header">
        <div>
            <h1 class="page-title">Add Dataset</h1>
            <p class="page-subtitle">Create a new fixtures or top scorers dataset.</p>
        </div>
    </x-slot>

    <div class="page-shell pt-6">
        <div class="max-w-4xl">
            <div class="surface-card p-6 sm:p-8">
                <form method="POST" action="{{ route('admin.football-data.store') }}">
                    @csrf
                    @include('admin.football-data._form', ['submitLabel' => 'Create'])
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
