<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($testimonial->exists ? 'Add New Testimonial' : 'Edit Testimonial') }}
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto my-5 bg-white p-3 shadow">
        <H:form :action="$testimonial->exists ? route('admin.testimonials.update', $testimonial) : route('admin.testimonials.store')" :method="$testimonial->exists ? 'PATCH' : 'POST'" multipart>
            <div class="relative flex flex-col flex-grow mt-5">
                <h2 class="z-10 flex bg-white border py-1 px-2 rounded-md absolute left-0 -top-3">
                    <H:label class="text-sm font-semibold" name="image" />
                </h2>
                <div x-data="{ files: null }" id="image" class="block w-full pt-5 pb-2 px-3 relative bg-white appearance-none border-2 border-gray-300 border-solid rounded-md hover:shadow-outline-gray">
                    <input type="file" name="image"
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
                            <small>You can replace image, <strong>If you want</strong></small>
                            <small>Drag & drop your testimonial image or <strong>Browse</strong></small>
                        </div>
                    </template>
                </div>
            </div>

            <div x-data="{ temp: 5, orig: 5 }" class="flex justify-center cursor-pointer text-4xl mt-4" @click="orig = temp">
                <input name="rating" type="number" :value="orig" class="hidden"/>

                <template x-if="orig != 0">
                    <span class="text-gray-400 hover:text-gray-700" @mouseenter="temp = 0" @mouseleave="temp = orig">⨯</span>
                </template>

                <template x-for="item in [1,2,3,4,5]">
                    <span
                        @mouseenter="temp = item"
                        @mouseleave="temp = orig"
                        :class="{'text-red-500': temp >= item}"
                        class="hover:text-red-500"
                    >★</span>
                </template>
            </div>

            <div class="flex flex-wrap md:-mx-2 mb-4">
                <div class="md:px-2 w-full md:w-1/2">
                    <div class="pt-7 pb-2 px-4 bg-white border shadow-md relative rounded-md w-full mt-5">
                        <h2 class="flex bg-white border py-1 px-2 rounded-md absolute left-0 -top-3">
                            <H:label class="text-sm font-bold" name="name" />
                        </h2>
                        <H:input name="name" wire:model.defer="name" :value="$testimonial->getCustomProperty('name')" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                        <H:error class="text-red-500" name="name" />
                    </div>
                </div>
                <div class="md:px-2 w-full md:w-1/2">
                    <div class="pt-7 pb-2 px-4 bg-white border shadow-md relative rounded-md w-full mt-5">
                        <h2 class="flex bg-white border py-1 px-2 rounded-md absolute left-0 -top-3">
                            <H:label class="text-sm font-bold" name="designation" />
                        </h2>
                        <H:input name="designation" wire:model.defer="designation" :value="$testimonial->getCustomProperty('designation')" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                        <H:error class="text-red-500" name="designation" />
                    </div>
                </div>
            </div>

            <div class="pt-7 pb-2 px-4 bg-white border shadow-md relative rounded-md w-full mt-5">
                <h2 class="flex bg-white border py-1 px-2 rounded-md absolute left-0 -top-3">
                    <H:label class="text-sm font-bold" name="review" />
                </h2>
                <H:textarea rows="4" name="review" wire:model.defer="review" :value="$testimonial->getCustomProperty('review')" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                <H:error class="text-red-500" name="review" />
            </div>

            <x-jet-button class="block w-full mt-6 py-3">
                Submit
            </x-jet-button>
        </H:form>
    </div>
    @once
        @push('scripts')
            <script src="https://cdn.filesizejs.com/filesize.min.js"></script>
        @endpush
    @endonce
</x-app-layout>
