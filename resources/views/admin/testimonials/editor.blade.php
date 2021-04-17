<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($testimonial->exists ? 'Edit Speech' : 'Add New Speech') }}
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto my-5 bg-white p-3 shadow">
        <x:form :action="$testimonial->exists ? route('admin.testimonials.update', $testimonial) : route('admin.testimonials.store')" :method="$testimonial->exists ? 'PATCH' : 'POST'" multipart>
            <x-file-browser name="image">
                <small>You can replace image, <strong>If you want</strong></small>
                <small>Drag & drop your speaker image or <strong>Browse</strong></small>
            </x-file-browser>

            <div x-data="{ temp: {{ $testimonial->getCustomProperty('rating', 5) }}, orig: {{ $testimonial->getCustomProperty('rating', 5) }} }" class="hidden flex justify-center cursor-pointer text-4xl mt-4" @click="orig = temp">
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
                            <x:label class="text-sm font-bold" name="name" />
                        </h2>
                        <x:input name="name" wire:model.defer="name" :value="$testimonial->getCustomProperty('name')" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                        <x:error class="text-red-500" name="name" />
                    </div>
                </div>
                <div class="md:px-2 w-full md:w-1/2">
                    <div class="pt-7 pb-2 px-4 bg-white border shadow-md relative rounded-md w-full mt-5">
                        <h2 class="flex bg-white border py-1 px-2 rounded-md absolute left-0 -top-3">
                            <x:label class="text-sm font-bold" name="designation" />
                        </h2>
                        <x:input name="designation" wire:model.defer="designation" :value="$testimonial->getCustomProperty('designation')" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                        <x:error class="text-red-500" name="designation" />
                    </div>
                </div>
            </div>

            <div class="pt-7 pb-2 px-4 bg-white border shadow-md relative rounded-md w-full mt-5">
                <h2 class="flex bg-white border py-1 px-2 rounded-md absolute left-0 -top-3">
                    <x:label class="text-sm font-bold" name="review" text="Speech" />
                </h2>
                <x:textarea tinymce name="review" wire:model.defer="review" :value="$testimonial->getCustomProperty('review')" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                <x:error class="text-red-500" name="review" />
            </div>

            <x-jet-button class="block w-full mt-6 py-3">
                Submit
            </x-jet-button>
        </x:form>
    </div>
</x-app-layout>
