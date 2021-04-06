<x:form wire:submit.prevent="submit" method="POST" multipart xmlns:x="http://www.w3.org/1999/html">
    <div class="flex flex-wrap md:-mx-2">
        <div class="md:px-2 w-full md:w-1/3">
            <div class="pt-7 pb-2 px-4 bg-white border shadow-md relative rounded-md w-full mt-5">
                <h2 class="flex bg-white border py-1 px-2 rounded-md absolute left-0 -top-3">
                    <x:label class="text-sm font-bold" name="section_name" />
                </h2>
                <x:input name="section_name" wire:model.defer="section_name" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                <x:error class="text-red-500" name="section_name" />
            </div>
        </div>
        <div class="md:px-2 w-full md:w-2/3">
            <div class="pt-7 pb-2 px-4 bg-white border shadow-md relative rounded-md w-full mt-5">
                <h2 class="flex bg-white border py-1 px-2 rounded-md absolute left-0 -top-3">
                    <x:label class="text-sm font-bold" name="section_title" />
                </h2>
                <x:input name="section_title" wire:model.defer="section_title" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                <x:error class="text-red-500" name="section_title" />
            </div>
        </div>
    </div>
    <div class="pt-7 pb-2 px-4 bg-white border shadow-md relative rounded-md w-full mt-5">
        <h2 class="flex bg-white border py-1 px-2 rounded-md absolute left-0 -top-3">
            <x:label class="text-sm font-bold" name="description" />
        </h2>
        <x:textarea rows="4" name="description" wire:model.defer="description" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
        <x:error class="text-red-500" name="description" />
    </div>

    <div class="flex flex-wrap md:-mx-2">
        <div class="md:px-2 w-full md:w-1/2">
            <div class="pt-7 pb-2 px-4 bg-white border shadow-md relative rounded-md w-full mt-5">
                <h2 class="flex bg-white border py-1 px-2 rounded-md absolute left-0 -top-3">
                    <x:label class="text-sm font-bold" name="home" />
                </h2>
                <div class="mb-1">
                    <x:input name="home_title" wire:model.defer="home_title" placeholder="Title" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                    <x:error class="text-red-500" name="home_title" />
                </div>
                <div class="mt-1">
                    <x:textarea rows="4" name="home_details" wire:model.defer="home_details" placeholder="Details" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                    <x:error class="text-red-500" name="home_details" />
                </div>
            </div>
        </div>
        <div class="md:px-2 w-full md:w-1/2">
            <div class="pt-7 pb-2 px-4 bg-white border shadow-md relative rounded-md w-full mt-5">
                <h2 class="flex bg-white border py-1 px-2 rounded-md absolute left-0 -top-3">
                    <x:label class="text-sm font-bold" name="medical" />
                </h2>
                <div class="mb-1">
                    <x:input name="medical_title" wire:model.defer="medical_title" placeholder="Title" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                    <x:error class="text-red-500" name="medical_title" />
                </div>
                <div class="mt-1">
                    <x:textarea rows="4" name="medical_details" wire:model.defer="medical_details" placeholder="Details" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                    <x:error class="text-red-500" name="medical_details" />
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-wrap md:-mx-2">
        <div class="md:px-2 w-full md:w-1/2">
            <div class="pt-7 pb-2 px-4 bg-white border shadow-md relative rounded-md w-full mt-5">
                <h2 class="flex bg-white border py-1 px-2 rounded-md absolute left-0 -top-3">
                    <x:label class="text-sm font-bold" name="food" />
                </h2>
                <div class="mb-1">
                    <x:input name="food_title" wire:model.defer="food_title" placeholder="Title" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                    <x:error class="text-red-500" name="food_title" />
                </div>
                <div class="mt-1">
                    <x:textarea rows="4" name="food_details" wire:model.defer="food_details" placeholder="Details" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                    <x:error class="text-red-500" name="food_details" />
                </div>
            </div>
        </div>
        <div class="md:px-2 w-full md:w-1/2">
            <div class="pt-7 pb-2 px-4 bg-white border shadow-md relative rounded-md w-full mt-5">
                <h2 class="flex bg-white border py-1 px-2 rounded-md absolute left-0 -top-3">
                    <x:label class="text-sm font-bold" name="education" />
                </h2>
                <div class="mb-1">
                    <x:input name="education_title" wire:model.defer="education_title" placeholder="Title" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                    <x:error class="text-red-500" name="education_title" />
                </div>
                <div class="mt-1">
                    <x:textarea rows="4" name="education_details" wire:model.defer="education_details" placeholder="Details" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                    <x:error class="text-red-500" name="education_details" />
                </div>
            </div>
        </div>
    </div>

    <x-jet-button wire:loading.attr="disabled" class="mt-6 py-3">
        Submit
    </x-jet-button>
</x:form>
