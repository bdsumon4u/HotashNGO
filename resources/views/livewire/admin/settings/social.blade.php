<H:form wire:submit.prevent="submit" method="POST">
    <div class="flex flex-wrap md:-mx-2">
        @foreach(['facebook', 'twitter', 'instagram', 'youtube'] as $name)
            <div class="md:px-2 w-full md:w-1/2">
                <div class="flex flex-wrap items-stretch w-full mb-4 relative">
                    <div class="flex -mr-px">
                    <span class="flex items-center leading-normal bg-grey-lighter rounded rounded-r-none border border-r-0 border-grey-light px-3 whitespace-no-wrap text-grey-dark text-sm">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                            {!! $svg[$name] !!}
                        </svg>
                    </span>
                    </div>
                    <H:input :name="$name" :wire:model.defer="$name" type="text" class="flex-shrink flex-grow flex-auto leading-normal w-px flex-1 h-10 rounded rounded-l-none px-3 relative focus:border-blue focus:shadow" />
                </div>
            </div>
        @endforeach
    </div>

    <x-jet-button wire:loading.attr="disabled" class="mt-6 py-3">
        Submit
    </x-jet-button>
</H:form>
