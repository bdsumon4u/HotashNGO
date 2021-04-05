<x-app-layout>
    <x-slot name="header">
        <span class="font-bold">{{ __('Pages') }}</span>
    </x-slot>
    <div class="max-w-5xl mx-auto">
        <div class="bg-white shadow-md rounded-sm m-1 lg:m-6 overflow-x-scroll">
            <table class="min-w-max w-full table-auto">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="w-5 py-3 px-6 text-left">ID</th>
                        <th class="py-3 px-6 text-left">Title</th>
                        <th class="w-36 py-3 px-6 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach($pages as $page)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-2 px-4 text-left whitespace-nowrap">{{ $page->id }}</td>
                        <td class="py-2 px-4 text-left">
                            <x:a target="_blank" :href="route('page.show', $page->slug)" class="text-blue-500 underline hover:text-blue-700">{{ $page->title }}</x:a>
                        </td>
                        <td class="py-2 px-4 text-center">
                            <div class="flex flex-wrap m-auto">
                                <x:a class="rounded px-2 py-1 m-1 text-xs border-b-4 border-l-2 shadow-lg bg-blue-700 border-blue-800" :href="route('admin.pages.edit', $page)">
                                    <svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white fill-current text-center">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                    </svg>
                                </x:a>
                                <form method="post" action="{{ route('admin.pages.destroy', $page) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="rounded px-2 py-1 m-1 text-xs border-b-4 border-l-2 shadow-lg bg-red-700 border-red-800">
                                        <svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white fill-current text-center">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
