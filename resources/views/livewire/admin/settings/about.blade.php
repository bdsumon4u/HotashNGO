<x:form wire:submit.prevent="submit" method="POST" multipart>
    <div class="flex flex-wrap md:-mx-2">
        <div class="md:px-2 w-full md:w-1/2">
            <x-file-browser name="image" :src="setting('about', 'image')" message="Recommended Size (800px x 600px)" />
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
        <div class="pt-7 pb-2 mx:px-2 px-4 bg-white border shadow-md relative rounded-md w-full mt-5">
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
                    <x:label class="text-sm font-bold" name="button_text" />
                </h2>
                <x:input name="button_text" wire:model.defer="button_text" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                <x:error class="text-red-500" name="button_text" />
            </div>
        </div>
        <div class="md:px-2 w-full md:w-2/3">
            <div class="pt-7 pb-2 px-4 bg-white border shadow-md relative rounded-md w-full mt-5">
                <h2 class="flex bg-white border py-1 px-2 rounded-md absolute left-0 -top-3">
                    <x:label class="text-sm font-bold" name="button_link" />
                </h2>
                <x:input name="button_link" wire:model.defer="button_link" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                <x:error class="text-red-500" name="button_link" />
            </div>
        </div>
    </div>

    <x-jet-button wire:loading.attr="disabled" class="mt-6 py-3">
        Submit
    </x-jet-button>
</x:form>
