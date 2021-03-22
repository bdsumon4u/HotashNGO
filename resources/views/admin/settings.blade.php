<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Settings') }}
        </h2>
    </x-slot>

    <div class="overflow-hidden shadow-md sm:rounded-md">
        <livewire:admin.settings.index :tab="$tab" />
    </div>
</x-app-layout>
