<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gallery') }}
        </h2>
    </x-slot>
    <div class="overflow-hidden shadow-md sm:rounded-md">
        <div class="max-w-3xl mx-auto">
            <ul>
                @foreach($errors->all() as $error)
                    <li>
                        <small class="text-red-500">{{ $error }}</small>
                    </li>
                @endforeach
            </ul>
            <x:form :action="route('admin.media.store')" method="POST" multipart>
                <x:hidden name="type" :value="request('type')" />
                <x-file-browser name="media[]" :label="ucfirst(request('type'))" multiple>
                    <small>Drag & drop your gallery {{ Str::plural(request('type')) }} or <strong>Browse</strong></small>
                </x-file-browser>
                @if(request('type') === 'video')
                    <x-file-browser name="thumbnail">
                        <small>Drag & drop video thumbnail or <strong>Browse</strong></small>
                    </x-file-browser>
                @endif
                <x-jet-button class="mt-6 w-full justify-center py-3">
                    Upload
                </x-jet-button>
            </x:form>
        </div>
        <hr class="my-5">
        <div x-data="{ mediaModal : false, mediaModalSrc : '', mediaModalDesc : '' }">
            <template @img-modal.window="mediaModal = true; type = $event.detail.type, mediaModalSrc = $event.detail.mediaModalSrc; mediaModalDesc = $event.detail.mediaModalDesc;" x-if="mediaModal">
                <div x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform" x-transition:enter-end="opacity-100 transform" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 transform" x-transition:leave-end="opacity-0 transform" x-on:click.away="mediaModalSrc = ''" class="p-2 fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center items-center bg-black bg-opacity-75">
                    <div @click.away="mediaModal = ''" class="flex flex-col w-full max-w-5xl max-h-full overflow-auto bg-white p-2 border shadow-md rounded-md">
                        <div class="z-50">
                            <button @click="mediaModal = ''" class="float-right pt-2 pr-2 outline-none focus:outline-none">
                                <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                    <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                        <div class="p-2">
                            <video x-show="type === 'video'" class="w-full" controls :src="mediaModalSrc"></video>
                            <img x-show="type === 'image'" :src="mediaModalSrc" />
                            <p x-text="mediaModalDesc" class="text-center text-white"></p>
                        </div>
                    </div>
                </div>
            </template>
        </div>

        <div x-data="{}" class="px-2">
            <div class="flex -mx-2">
                @foreach($media as $medium)
                    @php($thumbnail = $medium->type === 'video' ? asset($medium->getCustomProperty('video-thumb')) : $medium->getFullUrl('416x234'))
                    <div class="w-full md:w-1/3 lg:w-1/4 px-2">
                        <div class="bg-gray-400">
                            <a @click="$dispatch('img-modal', { type: '{{ $medium->type }}', mediaModalSrc: '{{ $medium->type === 'video' ? route('video-stream', $medium) : $medium->getFullUrl() }}', mediaModalDesc: 'Random Image One Description' })" class="cursor-pointer">
                                <img alt="Placeholder" class="object-fit w-full" src="{{ $thumbnail }}">
                            </a>
                            <div class="p-2 flex flex-wrap m-auto">
                                <form method="post" action="{{ route('admin.media.destroy', $medium) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="rounded px-2 py-1 m-1 text-xs border-b-4 border-l-2 shadow-lg bg-red-700 border-red-800" href="">
                                        <svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white fill-current text-center">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{ $media->links() }}
    </div>
</x-app-layout>
