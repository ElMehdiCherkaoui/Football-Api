<x-guest-layout>
    <div class="space-y-6">
        <div class="space-y-1">
            <h1 class="text-2xl font-bold tracking-tight text-slate-900">Welcome back</h1>
            <p class="text-sm text-slate-600">Sign in to manage leagues, seasons, and API payloads.</p>
        </div>

        <x-auth-session-status class="p-3 rounded-xl bg-emerald-50 text-emerald-700" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="mt-1" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="name@example.com" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-rose-600" />
            </div>

            <div>
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="mt-1" type="password" name="password" required autocomplete="current-password" placeholder="Enter your password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-rose-600" />
            </div>

            <div class="flex items-center justify-between gap-3">
                <label for="remember_me" class="inline-flex items-center gap-2 text-sm text-slate-600">
                    <input id="remember_me" type="checkbox" class="rounded border-slate-300 text-emerald-600 focus:ring-emerald-500" name="remember">
                    <span>{{ __('Remember me') }}</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="text-sm font-medium text-emerald-700 hover:text-emerald-600" href="{{ route('password.request') }}">
                        {{ __('Forgot password?') }}
                    </a>
                @endif
            </div>

            <x-primary-button class="w-full">
                {{ __('Log in') }}
            </x-primary-button>
        </form>
    </div>
</x-guest-layout>
