<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="text-slate-900 antialiased">
        <div class="min-h-screen flex items-center px-4 py-8 sm:px-6 lg:px-8">
            <div class="w-full max-w-6xl mx-auto grid gap-8 lg:grid-cols-2 lg:gap-12 items-center">
                <section class="hidden lg:block">
                    <div class="max-w-md space-y-6">
                        <p class="inline-flex items-center rounded-full bg-emerald-100 text-emerald-700 px-3 py-1 text-xs font-semibold tracking-wide uppercase">
                            Football Data Portal
                        </p>
                        <h1 class="text-4xl font-extrabold tracking-tight text-slate-900">
                            Manage league data with a cleaner workflow.
                        </h1>
                        <p class="text-slate-600 leading-relaxed">
                            Secure access to datasets, API payloads, and league seasons from one dashboard built for speed and clarity.
                        </p>
                    </div>
                </section>

                <section class="w-full">
                    <div class="surface-card w-full max-w-md mx-auto p-6 sm:p-8">
                        {{ $slot }}
                    </div>
                </section>
            </div>
        </div>
    </body>
</html>
