@php
    $types = [
        \App\Models\FootballData::TYPE_FIXTURES => 'fixtures',
        \App\Models\FootballData::TYPE_TOPSCORERS => 'topscorers',
    ];

    $payloadValue = old('payload_json');

    if ($payloadValue === null && isset($dataset)) {
        $payloadValue = json_encode($dataset->payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }
@endphp

<div class="space-y-6">
    <div>
        <x-input-label for="type" :value="__('Type')" />
        <select id="type" name="type" class="mt-1 block w-full border border-slate-300 bg-white rounded-xl shadow-sm focus:border-emerald-500 focus:ring-emerald-400 text-slate-900" required>
            @foreach ($types as $value => $label)
                <option value="{{ $value }}" @selected(old('type', $dataset->type ?? '') === $value)>
                    {{ $label }}
                </option>
            @endforeach
        </select>
        <x-input-error class="mt-2" :messages="$errors->get('type')" />
    </div>

    <div>
        <x-input-label for="league" :value="__('League')" />
        <x-text-input id="league" class="mt-1" type="number" name="league" :value="old('league', $dataset->league ?? '')" required min="1" />
        <x-input-error class="mt-2" :messages="$errors->get('league')" />
    </div>

    <div>
        <x-input-label for="season" :value="__('Season')" />
        <x-text-input id="season" class="mt-1" type="number" name="season" :value="old('season', $dataset->season ?? '')" required min="1900" max="2100" />
        <x-input-error class="mt-2" :messages="$errors->get('season')" />
    </div>

    <div>
        <x-input-label for="payload_json" :value="__('Payload (JSON)')" />
        <textarea id="payload_json" name="payload_json" rows="16" class="mt-1 block w-full border border-slate-300 bg-white rounded-xl shadow-sm focus:border-emerald-500 focus:ring-emerald-400 text-slate-900 font-mono text-sm" required>{{ $payloadValue }}</textarea>
        <x-input-error class="mt-2" :messages="$errors->get('payload_json')" />
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>{{ $submitLabel }}</x-primary-button>
        <a href="{{ route('admin.football-data.index') }}" class="text-sm font-medium text-slate-600 hover:text-slate-900">Cancel</a>
    </div>
</div>
