<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(ucwords(str_replace('-', ' ', $tab))) }}
        </h2>
    </x-slot>

    <div class="overflow-hidden bg-white shadow-md sm:rounded-md md:max-w-4xl mx-auto">
        <div class="p-2">
            @livewire('admin.section', compact('tab'))
        </div>
    </div>
</x-app-layout>
