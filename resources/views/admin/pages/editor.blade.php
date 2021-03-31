<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($page->exists ? 'Edit Page' : 'New Page') }}
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto my-5 bg-white p-3 shadow">
        <div x-data="{ lang : 'en' }">
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
            <H:form :model="$page" :action="$page->exists ? route('admin.pages.update', $page) : route('admin.pages.store')" :method="$page->exists ? 'PATCH' : 'POST'" multipart>
                @foreach(config('translatable.locales', []) as $lang)
                <div x-show="lang === '{{ $lang }}'" class="flex flex-wrap">
                    <div class="pt-7 pb-2 px-4 bg-white border shadow-md relative rounded-md w-full mt-5">
                        <h2 class="flex bg-white border py-1 px-2 rounded-md absolute left-0 -top-3">
                            <H:label class="text-sm font-bold" name="{{ $lang }}[title]" />
                        </h2>
                        <H:input name="{{ $lang }}[title]" :value="$page->{'title:'.$lang}" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                        <H:error class="text-red-500" name="{{ $lang }}[title]" />
                    </div>
                </div>
                @endforeach
                <div class="flex flex-wrap">
                    <div class="pt-7 pb-2 px-4 bg-white border shadow-md relative rounded-md w-full mt-5">
                        <h2 class="flex bg-white border py-1 px-2 rounded-md absolute left-0 -top-3">
                            <H:label class="text-sm font-bold" name="slug" />
                        </h2>
                        <H:input name="slug" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                        <H:error class="text-red-500" name="slug" />
                    </div>
                </div>
                @foreach(config('translatable.locales', []) as $lang)
                <div x-show="lang === '{{ $lang }}'" class="flex flex-wrap">
                    <div class="pt-7 pb-2 px-4 bg-white border shadow-md relative rounded-md w-full mt-5">
                        <h2 class="flex bg-white border py-1 px-2 rounded-md absolute left-0 -top-3">
                            <H:label class="text-sm font-bold" name="{{ $lang }}[content]" />
                        </h2>
                        <H:textarea tinymce name="{{ $lang }}[content]" :value="$page->{'content:'.$lang}" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                        <H:error class="text-red-500" name="{{ $lang }}[content]" />
                    </div>
                </div>
                @endforeach

                <x-jet-button class="block w-full mt-6 py-3">
                    Submit
                </x-jet-button>
            </H:form>
        </div>
    </div>
</x-app-layout>
