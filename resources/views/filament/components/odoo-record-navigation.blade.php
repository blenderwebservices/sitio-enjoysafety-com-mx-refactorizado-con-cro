@php
    $nav = $getLivewire()->getRecordNavigationInfo();
@endphp

@if ($nav && $nav['total'] > 0)
    <div class="inline-flex items-center gap-2 me-1 py-0.5">
        <span class="text-xs font-semibold text-slate-500 dark:text-slate-400 tabular-nums select-none">
            {{ $nav['current'] }} / {{ $nav['total'] }}
        </span>

        <div class="inline-flex items-center rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-900 shadow-sm divide-x divide-slate-200 dark:divide-slate-700 overflow-hidden">
            <button
                type="button"
                wire:click="navigateToPreviousRecord"
                wire:loading.attr="disabled"
                @disabled(! $nav['hasPrevious'])
                title="Registro anterior (aplica cambios pendientes)"
                class="inline-flex items-center justify-center w-7 h-7 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 disabled:opacity-30 disabled:cursor-not-allowed hover:text-amber-600 dark:hover:text-amber-400 transition cursor-pointer"
            >
                <span wire:loading.remove wire:target="navigateToPreviousRecord">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" />
                    </svg>
                </span>
                <span wire:loading wire:target="navigateToPreviousRecord">
                    <svg class="w-3.5 h-3.5 animate-spin text-amber-500" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                    </svg>
                </span>
            </button>

            <button
                type="button"
                wire:click="navigateToNextRecord"
                wire:loading.attr="disabled"
                @disabled(! $nav['hasNext'])
                title="Siguiente registro (aplica cambios pendientes)"
                class="inline-flex items-center justify-center w-7 h-7 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 disabled:opacity-30 disabled:cursor-not-allowed hover:text-amber-600 dark:hover:text-amber-400 transition cursor-pointer"
            >
                <span wire:loading.remove wire:target="navigateToNextRecord">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                    </svg>
                </span>
                <span wire:loading wire:target="navigateToNextRecord">
                    <svg class="w-3.5 h-3.5 animate-spin text-amber-500" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                    </svg>
                </span>
            </button>
        </div>
    </div>
@endif

