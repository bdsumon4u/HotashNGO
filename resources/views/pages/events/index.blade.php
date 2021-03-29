<x-site-layout>
    <section class="event-area four ptb-100">
        <div class="container">
            <div class="row">
                @each('pages.partials.event', $events, 'event')
            </div>
            <div class="pagination-area">
                {!! $events->links() !!}
            </div>
        </div>
    </section>
</x-site-layout>
