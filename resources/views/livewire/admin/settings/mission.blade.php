<div x-data="{ lang: '{{ app()->getLocale() }}' }">
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
    <x:form wire:submit.prevent="submit" method="POST" multipart xmlns:x="http://www.w3.org/1999/html">
        @foreach(config('translatable.locales', []) as $lang)
            <div x-show="lang === '{{ $lang }}'">
                <div class="flex flex-wrap md:-mx-2">
                    <div class="md:px-2 w-full md:w-1/3">
                        <div class="pt-7 pb-2 px-4 bg-white border shadow-md relative rounded-md w-full mt-5">
                            <h2 class="flex bg-white border py-1 px-2 rounded-md absolute left-0 -top-3">
                                <x:label class="text-sm font-bold" name="section_name_{{ $lang }}" />
                            </h2>
                            <x:input name="section_name_{{ $lang }}" wire:model.defer="section_name_{{ $lang }}" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                            <x:error class="text-red-500" name="section_name_{{ $lang }}" />
                        </div>
                    </div>
                    <div class="md:px-2 w-full md:w-2/3">
                        <div class="pt-7 pb-2 px-4 bg-white border shadow-md relative rounded-md w-full mt-5">
                            <h2 class="flex bg-white border py-1 px-2 rounded-md absolute left-0 -top-3">
                                <x:label class="text-sm font-bold" name="section_title_{{ $lang }}" />
                            </h2>
                            <x:input name="section_title_{{ $lang }}" wire:model.defer="section_title_{{ $lang }}" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                            <x:error class="text-red-500" name="section_title_{{ $lang }}" />
                        </div>
                    </div>
                </div>
                <div class="pt-7 pb-2 px-4 bg-white border shadow-md relative rounded-md w-full mt-5">
                    <h2 class="flex bg-white border py-1 px-2 rounded-md absolute left-0 -top-3">
                        <x:label class="text-sm font-bold" name="description_{{ $lang }}" />
                    </h2>
                    <x:textarea rows="4" name="description_{{ $lang }}" wire:model.defer="description_{{ $lang }}" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                    <x:error class="text-red-500" name="description_{{ $lang }}" />
                </div>

                <div class="flex flex-wrap md:-mx-2">
                    <div class="md:px-2 w-full md:w-1/2">
                        <div class="pt-7 pb-2 px-4 bg-white border shadow-md relative rounded-md w-full mt-5">
                            <h2 class="flex bg-white border py-1 px-2 rounded-md absolute left-0 -top-3">
                                <x:label class="text-sm font-bold" name="home_{{ $lang }}" />
                            </h2>
                            <div class="mb-1">
                                <x:input name="home_title_{{ $lang }}" wire:model.defer="home_title_{{ $lang }}" placeholder="Title" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                                <x:error class="text-red-500" name="home_title_{{ $lang }}" />
                            </div>
                            <div class="mt-1">
                                <x:textarea rows="4" name="home_details_{{ $lang }}" wire:model.defer="home_details_{{ $lang }}" placeholder="Details" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                                <x:error class="text-red-500" name="home_details_{{ $lang }}" />
                            </div>
                        </div>
                    </div>
                    <div class="md:px-2 w-full md:w-1/2">
                        <div class="pt-7 pb-2 px-4 bg-white border shadow-md relative rounded-md w-full mt-5">
                            <h2 class="flex bg-white border py-1 px-2 rounded-md absolute left-0 -top-3">
                                <x:label class="text-sm font-bold" name="medical_{{ $lang }}" />
                            </h2>
                            <div class="mb-1">
                                <x:input name="medical_title_{{ $lang }}" wire:model.defer="medical_title_{{ $lang }}" placeholder="Title" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                                <x:error class="text-red-500" name="medical_title_{{ $lang }}" />
                            </div>
                            <div class="mt-1">
                                <x:textarea rows="4" name="medical_details_{{ $lang }}" wire:model.defer="medical_details_{{ $lang }}" placeholder="Details" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                                <x:error class="text-red-500" name="medical_details_{{ $lang }}" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap md:-mx-2">
                    <div class="md:px-2 w-full md:w-1/2">
                        <div class="pt-7 pb-2 px-4 bg-white border shadow-md relative rounded-md w-full mt-5">
                            <h2 class="flex bg-white border py-1 px-2 rounded-md absolute left-0 -top-3">
                                <x:label class="text-sm font-bold" name="food_{{ $lang }}" />
                            </h2>
                            <div class="mb-1">
                                <x:input name="food_title_{{ $lang }}" wire:model.defer="food_title_{{ $lang }}" placeholder="Title" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                                <x:error class="text-red-500" name="food_title_{{ $lang }}" />
                            </div>
                            <div class="mt-1">
                                <x:textarea rows="4" name="food_details_{{ $lang }}" wire:model.defer="food_details_{{ $lang }}" placeholder="Details" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                                <x:error class="text-red-500" name="food_details_{{ $lang }}" />
                            </div>
                        </div>
                    </div>
                    <div class="md:px-2 w-full md:w-1/2">
                        <div class="pt-7 pb-2 px-4 bg-white border shadow-md relative rounded-md w-full mt-5">
                            <h2 class="flex bg-white border py-1 px-2 rounded-md absolute left-0 -top-3">
                                <x:label class="text-sm font-bold" name="education_{{ $lang }}" />
                            </h2>
                            <div class="mb-1">
                                <x:input name="education_title_{{ $lang }}" wire:model.defer="education_title_{{ $lang }}" placeholder="Title" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                                <x:error class="text-red-500" name="education_title_{{ $lang }}" />
                            </div>
                            <div class="mt-1">
                                <x:textarea rows="4" name="education_details_{{ $lang }}" wire:model.defer="education_details_{{ $lang }}" placeholder="Details" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                                <x:error class="text-red-500" name="education_details_{{ $lang }}" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <x-jet-button wire:loading.attr="disabled" class="mt-6 py-3">
            Submit
        </x-jet-button>
    </x:form>
</div>

