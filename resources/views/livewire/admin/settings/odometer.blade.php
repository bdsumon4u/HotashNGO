<x:form wire:submit.prevent="submit" method="POST" multipart>
    <div class="flex flex-wrap md:-mx-2">
        <div class="md:px-2 w-full md:w-1/2">
            <div class="pt-7 pb-2 px-4 bg-white border shadow-md relative rounded-md w-full mt-5">
                <h2 class="flex bg-white border py-1 px-2 rounded-md absolute left-0 -top-3">
                    <x:label class="text-sm font-bold" name="fund_amount" />
                </h2>
                <x:input name="fund_amount" wire:model.defer="fund_amount" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                <x:error class="text-red-500" name="fund_amount" />
            </div>
        </div>
        <div class="md:px-2 w-full md:w-1/2">
            <div class="pt-7 pb-2 px-4 bg-white border shadow-md relative rounded-md w-full mt-5">
                <h2 class="flex bg-white border py-1 px-2 rounded-md absolute left-0 -top-3">
                    <x:label class="text-sm font-bold" name="event_count" />
                </h2>
                <x:number name="event_count" wire:model.defer="event_count" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                <x:error class="text-red-500" name="event_count" />
            </div>
        </div>
    </div>

    <div class="flex flex-wrap md:-mx-2">
        <div class="md:px-2 w-full md:w-1/2">
            <div class="pt-7 pb-2 px-4 bg-white border shadow-md relative rounded-md w-full mt-5">
                <h2 class="flex bg-white border py-1 px-2 rounded-md absolute left-0 -top-3">
                    <x:label class="text-sm font-bold" name="volunteer_count" />
                </h2>
                <x:number name="volunteer_count" wire:model.defer="volunteer_count" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                <x:error class="text-red-500" name="volunteer_count" />
            </div>
        </div>
        <div class="md:px-2 w-full md:w-1/2">
            <div class="pt-7 pb-2 px-4 bg-white border shadow-md relative rounded-md w-full mt-5">
                <h2 class="flex bg-white border py-1 px-2 rounded-md absolute left-0 -top-3">
                    <x:label class="text-sm font-bold" name="donor_count" />
                </h2>
                <x:number name="donor_count" wire:model.defer="donor_count" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                <x:error class="text-red-500" name="donor_count" />
            </div>
        </div>
    </div>

    <x-jet-button wire:loading.attr="disabled" class="mt-6 py-3">
        Submit
    </x-jet-button>
</x:form>
