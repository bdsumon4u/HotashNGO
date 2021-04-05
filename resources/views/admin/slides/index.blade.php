<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Slider') }}
        </h2>
    </x-slot>
    <div class="overflow-hidden shadow-md sm:rounded-md">
        <div class="flex flex-wrap py-3 lg:px-5 lg:py-7">
            @foreach($slides as $slide)
                <div class="w-full sm:w-1/2 xl:w-1/3 overflow-hidden rounded border shadow p-3">
                    <div class="bg-white">
                        <div class="relative">
                            <div class="h-48 bg-cover bg-no-repeat bg-center" style="background-image: url('{{ $slide->getFullUrl('1920x800') }}')"></div>
                            <div style="background-color: rgba(0,0,0,0.6)" class="absolute top-0 mt-2 ml-3 px-2 py-1 rounded text-sm text-white">{{ $loop->index + 1 }}</div>
                        </div>
                        <div class="p-3">
                            <div class="mb-2 flex flex-wrap m-auto">
                                <H:a class="rounded px-2 py-1 m-1 text-xs border-b-4 border-l-2 shadow-lg bg-blue-700 border-blue-800" :href="route('admin.slides.edit', $slide)">
                                    <svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white fill-current text-center">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                    </svg>
                                </H:a>
                                <form method="post" action="{{ route('admin.slides.destroy', $slide) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="rounded px-2 py-1 m-1 text-xs border-b-4 border-l-2 shadow-lg bg-red-700 border-red-800" href="">
                                        <svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white fill-current text-center">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                            <h3 class="mr-10 italic font-semibold truncate-2nd">
                                {{ $slide->getCustomProperty('title') }}
                            </h3>
                            <p class="text-sm mt-1">{{ $slide->getCustomProperty('text') }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
