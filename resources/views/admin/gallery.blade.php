<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gallery') }}
        </h2>
    </x-slot>
    <div class="overflow-hidden shadow-md sm:rounded-md">
        <x:form :action="route('admin.images.store')" method="POST" multipart>
            <div class="relative flex flex-col flex-grow mt-5">
                <h2 class="z-10 flex bg-white border py-1 px-2 rounded-md absolute left-0 -top-3">
                    <x:label class="text-sm font-semibold" name="image">Gallery Images</x:label>
                </h2>
                <div x-data="{ files: null }" id="image" class="block w-full pt-5 pb-2 px-3 relative bg-white appearance-none border-2 border-gray-300 border-solid rounded-md hover:shadow-outline-gray">
                    <input multiple type="file" name="image[]"
                           class="absolute inset-0 z-50 m-0 p-0 w-full h-full outline-none opacity-0"
                           x-on:change="files = $event.target.files; console.log($event.target.files);"
                           x-on:dragover="$el.classList.add('active')" x-on:dragleave="$el.classList.remove('active')" x-on:drop="$el.classList.remove('active')"
                    >
                    <template x-if="files !== null">
                        <div class="flex flex-col space-y-1">
                            <template x-for="(_,index) in Array.from({ length: files.length })">
                                <div class="flex flex-row items-center space-x-2">
                                    <template x-if="files[index].type.includes('audio/')"><i class="far fa-file-audio fa-fw"></i></template>
                                    <template x-if="files[index].type.includes('application/')"><i class="far fa-file-alt fa-fw"></i></template>
                                    <template x-if="files[index].type.includes('image/')"><i class="far fa-file-image fa-fw"></i></template>
                                    <template x-if="files[index].type.includes('video/')"><i class="far fa-file-video fa-fw"></i></template>
                                    <span class="font-medium text-gray-900" x-text="files[index].name">Uploading</span>
                                    <span class="text-xs self-end text-gray-500" x-text="filesize(files[index].size)">...</span>
                                </div>
                            </template>
                        </div>
                    </template>
                    <template x-if="files === null">
                        <div class="flex flex-col space-y-2 items-center justify-center">
                            <small>Drag & drop your gallery images or <strong>Browse</strong></small>
                        </div>
                    </template>
                </div>
            </div>
            <x-jet-button class="mt-6 py-3">
                Upload
            </x-jet-button>
        </x:form>
        <div class="flex flex-wrap py-3 lg:px-5 lg:py-7">
            @foreach($images as $image)
                <div class="w-full sm:w-1/2 lg:w-1/3 xl:w-1/4 overflow-hidden rounded border shadow p-3">
                    <div class="bg-white">
                        <div class="relative">
                            <div class="h-48 bg-cover bg-no-repeat bg-center" style="background-image: url('{{ $image->getFullUrl() }}')"></div>
                            <div style="background-color: rgba(0,0,0,0.6)" class="absolute top-0 mt-2 ml-3 px-2 py-1 rounded text-sm text-white">{{ $loop->index + 1 }}</div>
                        </div>
                        <div class="p-3">
                            <div class="mb-2 flex flex-wrap m-auto">
{{--                                <x:a class="rounded px-2 py-1 m-1 text-xs border-b-4 border-l-2 shadow-lg bg-blue-700 border-blue-800" :href="route('admin.images.edit', $image)">--}}
{{--                                    <svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white fill-current text-center">--}}
{{--                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>--}}
{{--                                    </svg>--}}
{{--                                </x:a>--}}
                                <form method="post" action="{{ route('admin.images.destroy', $image) }}">
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
                </div>
            @endforeach
        </div>
        {{ $images->links() }}
    </div>
</x-app-layout>
