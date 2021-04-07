<x:form wire:submit.prevent="submit" method="POST" multipart xmlns:x="http://www.w3.org/1999/html">
    <div class="flex flex-wrap md:-mx-2">
        <div class="md:px-2 w-full md:w-1/3">
            <div class="pt-7 pb-2 px-4 bg-white border shadow-md relative rounded-md w-full mt-5">
                <h2 class="flex bg-white border py-1 px-2 rounded-md absolute left-0 -top-3">
                    <x:label class="text-sm font-bold" name="team_name" />
                </h2>
                <x:input name="team_name" wire:model.defer="team_name" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                <x:error class="text-red-500" name="team_name" />
            </div>
        </div>
        <div class="md:px-2 w-full md:w-2/3">
            <div class="pt-7 pb-2 px-4 bg-white border shadow-md relative rounded-md w-full mt-5">
                <h2 class="flex bg-white border py-1 px-2 rounded-md absolute left-0 -top-3">
                    <x:label class="text-sm font-bold" name="team_title" />
                </h2>
                <x:input name="team_title" wire:model.defer="team_title" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                <x:error class="text-red-500" name="team_title" />
            </div>
        </div>
    </div>
    <div class="pt-7 pb-2 px-4 bg-white border shadow-md relative rounded-md w-full mt-5">
        <h2 class="flex bg-white border py-1 px-2 rounded-md absolute left-0 -top-3">
            <x:label class="text-sm font-bold" name="team_description" />
        </h2>
        <x:textarea rows="4" name="team_description" wire:model.defer="team_description" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
        <x:error class="text-red-500" name="team_description" />
    </div>

    <div class="flex flex-wrap md:-mx-2">
        <div class="md:px-2 w-full md:w-1/3">
            <div class="pt-7 pb-2 px-4 bg-white border shadow-md relative rounded-md w-full mt-5">
                <h2 class="flex bg-white border py-1 px-2 rounded-md absolute left-0 -top-3">
                    <x:label class="text-sm font-bold" name="testimonial_name" />
                </h2>
                <x:input name="testimonial_name" wire:model.defer="testimonial_name" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                <x:error class="text-red-500" name="testimonial_name" />
            </div>
        </div>
        <div class="md:px-2 w-full md:w-2/3">
            <div class="pt-7 pb-2 px-4 bg-white border shadow-md relative rounded-md w-full mt-5">
                <h2 class="flex bg-white border py-1 px-2 rounded-md absolute left-0 -top-3">
                    <x:label class="text-sm font-bold" name="testimonial_title" />
                </h2>
                <x:input name="testimonial_title" wire:model.defer="testimonial_title" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                <x:error class="text-red-500" name="testimonial_title" />
            </div>
        </div>
    </div>
    <div class="pt-7 pb-2 px-4 bg-white border shadow-md relative rounded-md w-full mt-5">
        <h2 class="flex bg-white border py-1 px-2 rounded-md absolute left-0 -top-3">
            <x:label class="text-sm font-bold" name="testimonial_description" />
        </h2>
        <x:textarea rows="4" name="testimonial_description" wire:model.defer="testimonial_description" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
        <x:error class="text-red-500" name="testimonial_description" />
    </div>

    <div class="flex flex-wrap md:-mx-2">
        <div class="md:px-2 w-full md:w-1/3">
            <div class="pt-7 pb-2 px-4 bg-white border shadow-md relative rounded-md w-full mt-5">
                <h2 class="flex bg-white border py-1 px-2 rounded-md absolute left-0 -top-3">
                    <x:label class="text-sm font-bold" name="news_name" />
                </h2>
                <x:input name="news_name" wire:model.defer="news_name" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                <x:error class="text-red-500" name="news_name" />
            </div>
        </div>
        <div class="md:px-2 w-full md:w-2/3">
            <div class="pt-7 pb-2 px-4 bg-white border shadow-md relative rounded-md w-full mt-5">
                <h2 class="flex bg-white border py-1 px-2 rounded-md absolute left-0 -top-3">
                    <x:label class="text-sm font-bold" name="news_title" />
                </h2>
                <x:input name="news_title" wire:model.defer="news_title" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
                <x:error class="text-red-500" name="news_title" />
            </div>
        </div>
    </div>
    <div class="pt-7 pb-2 px-4 bg-white border shadow-md relative rounded-md w-full mt-5">
        <h2 class="flex bg-white border py-1 px-2 rounded-md absolute left-0 -top-3">
            <x:label class="text-sm font-bold" name="news_description" />
        </h2>
        <x:textarea rows="4" name="news_description" wire:model.defer="news_description" class="block w-full px-2 py-1 border rounded-md text-gray-700 bg-gray-100 appearance-none focus:outline-none focus:bg-gray-200 focus:shadow-inner" />
        <x:error class="text-red-500" name="news_description" />
    </div>

    <x-jet-button wire:loading.attr="disabled" class="mt-6 py-3">
        Submit
    </x-jet-button>
</x:form>
