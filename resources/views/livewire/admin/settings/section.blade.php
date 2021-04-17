<x:form wire:submit.prevent="submit" method="POST" multipart xmlns:x="http://www.w3.org/1999/html">
    <div class="flex flex-wrap md:-mx-2">
        <div class="md:px-2 w-full md:w-1/3">
            <div class="pt-7 pb-2 px-4 bg-white border shadow-md relative rounded-md w-full mt-5">
                <h2 class="flex bg-white border py-1 px-2 rounded-md absolute left-0 -top-3">
                    <x:label class="text-sm font-bold" :name="$tab.'_name'" text="Section Name" />
                </h2>
                <x:input :name="$tab.'_name'" :wire:model.defer="$tab.'_name'" placeholder="Section Name" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                <x:error class="text-red-500" :name="$tab.'_name'" />
            </div>
        </div>
        <div class="md:px-2 w-full md:w-2/3">
            <div class="pt-7 pb-2 px-4 bg-white border shadow-md relative rounded-md w-full mt-5">
                <h2 class="flex bg-white border py-1 px-2 rounded-md absolute left-0 -top-3">
                    <x:label class="text-sm font-bold" :name="$tab.'_title'" text="Section Title" />
                </h2>
                <x:input :name="$tab.'_title'" :wire:model.defer="$tab.'_title'" placeholder="Section Title" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                <x:error class="text-red-500" :name="$tab.'_title'" />
            </div>
        </div>
    </div>
    <div class="pt-7 pb-2 px-4 bg-white border shadow-md relative rounded-md w-full mt-5">
        <h2 class="flex bg-white border py-1 px-2 rounded-md absolute left-0 -top-3">
            <x:label class="text-sm font-bold" :name="$tab.'_description'" text="Section Description" />
        </h2>
        <x:textarea rows="4" :name="$tab.'_description'" :wire:model.defer="$tab.'_description'" placeholder="Section Description" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
        <x:error class="text-red-500" :name="$tab.'_description'" />
    </div>

    <x-jet-button wire:loading.attr="disabled" class="mt-6 py-3">
        Submit
    </x-jet-button>
</x:form>
