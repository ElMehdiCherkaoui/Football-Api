@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'w-full border border-slate-300 bg-white rounded-xl shadow-sm focus:border-emerald-500 focus:ring-emerald-400 text-slate-900 placeholder:text-slate-400']) }}>
