<x-site-layout>
    @if($news->isNotEmpty())
    <section class="blog-area three ptb-100">
        <div class="container">
            <div class="row">
                @each('pages.partials.news', $news, 'news')
            </div>
            <div class="pagination-area">
                {!! $news->links() !!}
            </div>
        </div>
    </section>
    @endif
    @if($events->isNotEmpty())
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
    @endif
</x-site-layout>
