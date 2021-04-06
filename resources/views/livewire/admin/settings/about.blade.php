<x:form wire:submit.prevent="submit" method="POST" multipart>
    <div class="flex flex-wrap md:-mx-2">
        <div class="md:px-2 w-full md:w-1/2">
            <div class="relative flex flex-col flex-grow mt-5">
                <h2 class="z-10 flex bg-white border py-1 px-2 rounded-md absolute left-0 -top-3">
                    <x:label class="text-sm font-bold" name="image" />
                </h2>
                <div x-data="{ files: null }" id="image" class="block w-full pt-5 pb-2 px-3 relative bg-white appearance-none border-2 border-gray-300 border-solid rounded-md hover:shadow-outline-gray">
                    <input type="file" wire:model.defer="image"
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
                            <img id="preview-image" class="h-48 w-auto mb-2" src="{{ asset(setting('about', 'image')) }}" alt="About Image">
                            <small>Recommended Size (800px x 600px)</small>
                        </div>
                    </template>
                </div>
            </div>
        </div>
        <div class="md:px-2 w-full md:w-1/2">
            <div class="relative flex flex-col flex-grow mt-5">
                <div class="pt-7 pb-2 px-4 bg-white border shadow-md relative rounded-md w-full mt-5">
                    <h2 class="flex bg-white border py-1 px-2 rounded-md absolute left-0 -top-3">
                        <x:label class="text-sm font-bold" name="section_name" />
                    </h2>
                    <x:input name="section_name" wire:model.defer="section_name" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                    <x:error class="text-red-500" name="section_name" />
                </div>
                <div class="pt-7 pb-2 px-4 bg-white border shadow-md relative rounded-md w-full mt-5">
                    <h2 class="flex bg-white border py-1 px-2 rounded-md absolute left-0 -top-3">
                        <x:label class="text-sm font-bold" name="section_title" />
                    </h2>
                    <x:input name="section_title" wire:model.defer="section_title" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                    <x:error class="text-red-500" name="section_title" />
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-wrap md:-mx-2">
        <div class="pt-7 pb-2 px-4 bg-white border shadow-md relative rounded-md w-full mt-5">
            <h2 class="flex bg-white border py-1 px-2 rounded-md absolute left-0 -top-3">
                <x:label class="text-sm font-bold" name="description" />
            </h2>
            <x:textarea rows="6" name="description" wire:model.defer="description" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
            <x:error class="text-red-500" name="description" />
        </div>
    </div>

    <div class="flex flex-wrap md:-mx-2">
        <div class="md:px-2 w-full md:w-1/3">
            <div class="pt-7 pb-2 px-4 bg-white border shadow-md relative rounded-md w-full mt-5">
                <h2 class="flex bg-white border py-1 px-2 rounded-md absolute left-0 -top-3">
                    <x:label class="text-sm font-bold" name="button.text" />
                </h2>
                <x:input name="button.text" wire:model.defer="button.text" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                <x:error class="text-red-500" name="button.text" />
            </div>
        </div>
        <div class="md:px-2 w-full md:w-2/3">
            <div class="pt-7 pb-2 px-4 bg-white border shadow-md relative rounded-md w-full mt-5">
                <h2 class="flex bg-white border py-1 px-2 rounded-md absolute left-0 -top-3">
                    <x:label class="text-sm font-bold" name="button.link" />
                </h2>
                <x:input name="button.link" wire:model.defer="button.link" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                <x:error class="text-red-500" name="button.link" />
            </div>
        </div>
    </div>

    <x-jet-button wire:loading.attr="disabled" class="mt-6 py-3">
        Submit
    </x-jet-button>
</x:form>
