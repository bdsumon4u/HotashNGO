<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($slide->exists ? 'Edit Slide' : 'Add New') }}
        </h2>
    </x-slot>

    <div x-data="{ lang: '{{ app()->getLocale() }}' }" class="max-w-3xl mx-auto my-5 bg-white p-3 shadow">
        <div class="bg-gray-200 mb-4">
            <nav class="flex flex-col sm:flex-row">
                <button @click.prevent="lang = 'en'" :class="{ 'text-gray-900 border-b-2 font-medium border-blue-500' : lang === 'en' }" class="text-gray-600 @if($errors->has('en.*')) bg-red-700 text-gray-200 hover:text-white @endif text-xs py-4 px-6 block hover:text-blue-500 focus:outline-none">
                    EN
                </button>
                <button @click.prevent="lang = 'bn'" :class="{ 'text-gray-900 border-b-2 font-medium border-blue-500' : lang === 'bn' }" class="text-gray-600 @if($errors->has('bn.*')) bg-red-700 text-gray-200 hover:text-white @endif text-xs py-4 px-6 block hover:text-blue-500 focus:outline-none">
                    BN
                </button>
            </nav>
        </div>
        <x:form :action="$slide->exists ? route('admin.slides.update', $slide) : route('admin.slides.store')" :method="$slide->exists ? 'PATCH' : 'POST'" multipart>
            <x-file-browser name="image">
                <small>You can replace image, <strong>If you want</strong></small>
                <small>Drag & drop your slider image or <strong>Browse</strong></small>
                <small>Recommended Size (1920px x 800px)</small>
            </x-file-browser>
            @foreach(config('translatable.locales', []) as $lang)
                <div x-show="lang === '{{ $lang }}'" class="flex flex-wrap">
                    <div class="pt-7 pb-2 px-4 bg-white border shadow-md relative rounded-md w-full mt-5">
                        <h2 class="flex bg-white border py-1 px-2 rounded-md absolute left-0 -top-3">
                            <x:label class="text-sm font-bold" name="title_{{ $lang }}" />
                        </h2>
                        <x:input name="title_{{ $lang }}" wire:model.defer="title_{{ $lang }}" :value="$slide->getCustomProperty('title_'.$lang)" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                        <x:error class="text-red-500" name="title_{{ $lang }}" />
                    </div>
                </div>
                <div x-show="lang === '{{ $lang }}'" class="flex flex-wrap">
                    <div class="pt-7 pb-2 px-4 bg-white border shadow-md relative rounded-md w-full mt-5">
                        <h2 class="flex bg-white border py-1 px-2 rounded-md absolute left-0 -top-3">
                            <x:label class="text-sm font-bold" name="text_{{ $lang }}" />
                        </h2>
                        <x:input name="text_{{ $lang }}" wire:model.defer="text_{{ $lang }}" :value="$slide->getCustomProperty('text_'.$lang)" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                        <x:error class="text-red-500" name="text_{{ $lang }}" />
                    </div>
                </div>
            @endforeach

            <div class="flex flex-wrap">
                <div class="pt-2 pb-2 px-4 bg-white border shadow-md relative rounded-md w-full mt-5">
                    <div class="grid grid-cols-3">
                        @foreach(config('translatable.locales', []) as $lang)
                        <div x-show="lang === '{{ $lang }}'" class="flex flex-wrap mr-2">
                            <x:label class="text-sm font-bold" name="button1.text_{{ $lang }}" />
                            <x:input name="button1.text_{{ $lang }}" wire:model.defer="button1.text_{{ $lang }}" :value="$slide->getCustomProperty('button1_text_'.$lang)" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                        </div>
                        @endforeach
                        <div class="flex flex-wrap col-span-2">
                            <x:label class="text-sm font-bold" name="button1.link" />
                            <x:input name="button1.link" wire:model.defer="button1.link" :value="$slide->getCustomProperty('button1_link')" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                        </div>
                    </div>
                    <x:error class="text-red-500" name="button1" />
                </div>
            </div>

            <div class="flex flex-wrap">
                <div class="pt-2 pb-2 px-4 bg-white border shadow-md relative rounded-md w-full mt-5">
                    <div class="grid grid-cols-3">
                        @foreach(config('translatable.locales', []) as $lang)
                        <div x-show="lang === '{{ $lang }}'" class="flex flex-wrap mr-2">
                            <x:label class="text-sm font-bold" name="button2.text_{{ $lang }}" />
                            <x:input name="button2.text_{{ $lang }}" wire:model.defer="button2.text_{{ $lang }}" :value="$slide->getCustomProperty('button2_text_'.$lang)" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                        </div>
                        @endforeach
                        <div class="flex flex-wrap col-span-2">
                            <x:label class="text-sm font-bold" name="button2.link" />
                            <x:input name="button2.link" wire:model.defer="button2.link" :value="$slide->getCustomProperty('button2_link')" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                        </div>
                    </div>
                    <x:error class="text-red-500" name="button1.*" />
                </div>
            </div>

            <x-jet-button class="block w-full mt-6 py-3">
                Submit
            </x-jet-button>
        </x:form>
    </div>
</x-app-layout>
