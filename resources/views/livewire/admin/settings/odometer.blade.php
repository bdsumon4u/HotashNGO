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
    <x:form wire:submit.prevent="submit" method="POST" multipart>
        <div class="flex flex-wrap md:-mx-2">
            <div class="md:px-2 w-full md:w-1/2">
                <div class="pt-7 pb-2 px-4 bg-white border shadow-md relative rounded-md w-full mt-5">
                    <h2 class="flex bg-white border py-1 px-2 rounded-md absolute left-0 -top-3">
                        <x:label class="text-sm font-bold" name="fund_amount" />
                    </h2>
                    <div class="mb-2">
                        <x:input name="fund_amount" wire:model.defer="fund_amount" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                        <x:error class="text-red-500" name="fund_amount" />
                    </div>
                    @foreach(config('translatable.locales', []) as $lang)
                    <div x-show="lang === '{{ $lang }}'">
                        <x:input name="fund_message_{{ $lang }}" wire:model.defer="fund_message_{{ $lang }}" placeholder="Message {{ ucfirst($lang) }}" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                        <x:error class="text-red-500" name="fund_message_{{ $lang }}" />
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="md:px-2 w-full md:w-1/2">
                <div class="pt-7 pb-2 px-4 bg-white border shadow-md relative rounded-md w-full mt-5">
                    <h2 class="flex bg-white border py-1 px-2 rounded-md absolute left-0 -top-3">
                        <x:label class="text-sm font-bold" name="event_count" />
                    </h2>
                    <div class="mb-2">
                        <x:number name="event_count" wire:model.defer="event_count" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                        <x:error class="text-red-500" name="event_count" />
                    </div>
                    @foreach(config('translatable.locales', []) as $lang)
                        <div x-show="lang === '{{ $lang }}'">
                            <x:input name="event_message_{{ $lang }}" wire:model.defer="event_message_{{ $lang }}" placeholder="Message {{ ucfirst($lang) }}" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                            <x:error class="text-red-500" name="event_message_{{ $lang }}" />
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="flex flex-wrap md:-mx-2">
            <div class="md:px-2 w-full md:w-1/2">
                <div class="pt-7 pb-2 px-4 bg-white border shadow-md relative rounded-md w-full mt-5">
                    <h2 class="flex bg-white border py-1 px-2 rounded-md absolute left-0 -top-3">
                        <x:label class="text-sm font-bold" name="volunteer_count" />
                    </h2>
                    <div class="mb-2">
                        <x:number name="volunteer_count" wire:model.defer="volunteer_count" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                        <x:error class="text-red-500" name="volunteer_count" />
                    </div>
                    @foreach(config('translatable.locales', []) as $lang)
                        <div x-show="lang === '{{ $lang }}'">
                            <x:input name="volunteer_message_{{ $lang }}" wire:model.defer="volunteer_message_{{ $lang }}" placeholder="Message {{ ucfirst($lang) }}" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                            <x:error class="text-red-500" name="volunteer_message_{{ $lang }}" />
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="md:px-2 w-full md:w-1/2">
                <div class="pt-7 pb-2 px-4 bg-white border shadow-md relative rounded-md w-full mt-5">
                    <h2 class="flex bg-white border py-1 px-2 rounded-md absolute left-0 -top-3">
                        <x:label class="text-sm font-bold" name="donor_count" />
                    </h2>
                    <div class="mb-2">
                        <x:number name="donor_count" wire:model.defer="donor_count" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                        <x:error class="text-red-500" name="donor_count" />
                    </div>
                    @foreach(config('translatable.locales', []) as $lang)
                        <div x-show="lang === '{{ $lang }}'">
                            <x:input name="donor_message_{{ $lang }}" wire:model.defer="donor_message_{{ $lang }}" placeholder="Message {{ ucfirst($lang) }}" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                            <x:error class="text-red-500" name="donor_message_{{ $lang }}" />
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <x-jet-button wire:loading.attr="disabled" class="mt-6 py-3">
            Submit
        </x-jet-button>
    </x:form>
</div>
