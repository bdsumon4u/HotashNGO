<x-site-layout>
    <section class="team-area ptb-100">
        <div class="container">
            <div class="row">
                @each('pages.partials.person', $people, 'person')
            </div>
            <div class="pagination-area">
                {{ $people->links('pages.partials.pagination') }}
            </div>
        </div>
    </section>
</x-site-layout>
