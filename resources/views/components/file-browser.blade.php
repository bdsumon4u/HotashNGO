@props(['name', 'label' => '', 'multiple' => false, 'src' => '', 'message' => ''])
<div class="relative flex flex-col flex-grow mt-5">
    <h2 class="z-20 flex bg-white border py-1 px-2 rounded-md absolute left-0 -top-3">
        <x:label class="text-sm font-bold" :name="$name">
            {{ $label ?? '' }}
        </x:label>
    </h2>
    <div x-data="{ files: null }" id="logo" class="block w-full pt-5 pb-2 px-3 relative z-10 bg-white appearance-none border-2 border-gray-300 border-solid rounded-md hover:shadow-outline-gray">
        <x:input type="file" :name="$name" :wire:model.defer="$name" :multiple="$multiple"
               class="absolute inset-0 z-50 m-0 p-0 w-full h-full outline-none opacity-0"
               x-on:change="files = $event.target.files; console.log($event.target.files);"
               x-on:dragover="$el.classList.add('active')" x-on:dragleave="$el.classList.remove('active')" x-on:drop="$el.classList.remove('active')"
        />
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
                @if($slot->isEmpty())
                    <img id="preview-{{ $name }}" class="h-12 w-auto mb-2" src="{{ asset($src) }}" alt="{{ ucwords(str_replace('_', ' ', $name)) }}">
                    <small>{{ $message }}</small>
                @else
                {!! $slot !!}
                @endif
            </div>
        </template>
    </div>
</div>
