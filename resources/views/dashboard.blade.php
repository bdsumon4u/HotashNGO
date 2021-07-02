<x-app-layout>
    <x-slot name="header">
        <span class="font-bold">Dashboard</span>
    </x-slot>
    <div class="w-full">
        <div class="px-5 py-10">
            <div class="grid grid-cols-1 gap-20 lg:grid-cols-2 lg:gap-40">
                <div class="flex items-center flex-wrap w-md pl-10 pr-5 bg-white shadow-xl rounded-2xl h-20" x-data="{ circumference: 50 * 2 * Math.PI, percent: {{ cache('cache_size', 80) }} }">
                    <div class="flex items-center justify-center -m-6 overflow-hidden bg-white relative rounded-full">
                        <svg class="w-32 h-32 transform translate-x-1 translate-y-1" aria-hidden="true">
                            <circle class="text-gray-300" stroke-width="10" stroke="currentColor" fill="transparent" r="50" cx="60" cy="60"></circle>
                            <circle :class="{'text-blue-600': percent < 90, 'text-red-600': percent >= 90}" stroke-width="10" :stroke-dasharray="circumference" :stroke-dashoffset="circumference - percent / 100 * circumference" stroke-linecap="round" stroke="currentColor" fill="transparent" r="50" cx="60" cy="60" stroke-dasharray="314.1592653589793" stroke-dashoffset="62.83185307179585"></circle>
                        </svg>
                        <span class="absolute text-2xl" :class="{'text-blue-700': percent < 90, 'text-red-700': percent >= 90}" x-text="`${percent}%`">80%</span>
                    </div>
                    <div class="ml-10 flex-1 flex flex-col md:flex-row justify-between font-medium">
                        <div class="text-gray-600 sm:text-xl">Cache</div>

                        <div class="text-xl" :class="{'text-blue-600': percent < 90, 'text-red-600': percent >= 90}">
                            <x:form :action="route('admin.cache-refresh')" method="POST">
                                <button type="submit">Refresh</button>
                            </x:form>
                        </div>
                    </div>
                </div>


                <div class="flex items-center flex-wrap w-md pl-10 pr-5 bg-white shadow-xl rounded-2xl h-20" x-data="{ circumference: 50 * 2 * Math.PI, percent: {{ cache('app_size', 90) }} }">
                    <div class="flex items-center justify-center -m-6 overflow-hidden bg-white relative rounded-full">
                        <svg class="w-32 h-32 transform translate-x-1 translate-y-1" aria-hidden="true">
                            <circle class="text-gray-300" stroke-width="10" stroke="currentColor" fill="transparent" r="50" cx="60" cy="60"></circle>
                            <circle :class="{'text-blue-600': percent < 90, 'text-red-600': percent >= 90}" stroke-width="10" :stroke-dasharray="circumference" :stroke-dashoffset="circumference - percent / 100 * circumference" stroke-linecap="round" stroke="currentColor" fill="transparent" r="50" cx="60" cy="60" stroke-dasharray="314.1592653589793" stroke-dashoffset="31.41592653589794"></circle>
                        </svg>
                        <span class="absolute text-2xl" :class="{'text-blue-600': percent < 90, 'text-red-600': percent >= 90}" x-text="`${percent}%`">90%</span>
                    </div>
                    <div class="ml-10 flex-1 flex flex-col md:flex-row justify-between font-medium">
                        <div class="text-gray-600 sm:text-xl">Storage</div>

                        <div class="text-xl" :class="{'text-blue-600': percent < 90, 'text-red-600': percent >= 90}">{{ config('app.size') }}MB</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
