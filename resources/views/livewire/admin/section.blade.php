<div class="py-3 lg:px-5 lg:py-7">
    <div class="px-1 mt-2 lg:mt-0">
        <div class="bg-white p-2 border shadow-sm">
            <h3 class="text-xl mb-3">
                <span class="border-b-2 border-dashed italic font-semibold">{{ ucwords($tab) }}</span>
            </h3>
            @if(view()->exists('livewire.admin.settings.'.$tab))
                @livewire('admin.settings.'.$tab)
            @else
                @livewire('admin.settings.section', compact('tab'))
            @endif
        </div>
    </div>
</div>
