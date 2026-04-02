<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="page-title">Football Data Admin</h1>
                <p class="page-subtitle">View and manage all stored datasets by type, league, and season.</p>
            </div>
            <a href="{{ route('admin.football-data.create') }}" class="brand-button">
                Add Dataset
            </a>
        </div>
    </x-slot>

    <div class="page-shell pt-6">
            @if (session('status'))
                <div class="mb-4 p-4 rounded-xl bg-emerald-100 text-emerald-800">
                    {{ session('status') }}
                </div>
            @endif

            <div class="surface-card overflow-hidden">
                <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200">
                    <thead class="bg-slate-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Type</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">League</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Season</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Updated</th>
                            <th class="px-6 py-3"></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-slate-200">
                        @forelse ($datasets as $dataset)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-700">{{ $dataset->type }}</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-slate-800">{{ $dataset->league }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-slate-800">{{ $dataset->season }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-slate-600">{{ $dataset->updated_at->toDateTimeString() }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-3">
                                    <a href="{{ route('admin.football-data.show', $dataset) }}" class="text-emerald-700 hover:text-emerald-600">View</a>
                                    <a href="{{ route('admin.football-data.edit', $dataset) }}" class="text-amber-700 hover:text-amber-600">Edit</a>
                                    <form action="{{ route('admin.football-data.destroy', $dataset) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-rose-700 hover:text-rose-600" onclick="return confirm('Delete this dataset?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="px-6 py-6 text-sm text-slate-500" colspan="5">No datasets found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                </div>

                <div class="p-4 border-t border-slate-200">
                    {{ $datasets->links() }}
                </div>
            </div>
    </div>
</x-app-layout>
