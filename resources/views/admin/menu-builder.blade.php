<x-app-layout>
    @push('styles')
        <x:asset path="vendor/menu-h/css/menu-h.css" />
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    @endpush
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Settings') }}
        </h2>
    </x-slot>

    <div class="overflow-hidden shadow-md sm:rounded-md">
        {!! MenuH::builder() !!}
    </div>
        @push('scripts')
            <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
            <x:asset path="vendor/menu-h/js/scripts.js" />
            <x:asset path="vendor/menu-h/js/scripts2.js" />
            <script>
                var menus = {
                    "oneThemeLocationNoMenus" : "",
                    "moveUp" : "Move up",
                    "moveDown" : "Mover down",
                    "moveToTop" : "Move top",
                    "moveUnder" : "Move under of %s",
                    "moveOutFrom" : "Out from under  %s",
                    "under" : "Under %s",
                    "outFrom" : "Out from %s",
                    "menuFocus" : "%1$s. Element menu %2$d of %3$d.",
                    "subMenuFocus" : "%1$s. Menu of subelement %2$d of %3$s."
                };
            </script>
            <x:asset path="vendor/menu-h/js/menu-h.js" />
        @endpush
</x-app-layout>
