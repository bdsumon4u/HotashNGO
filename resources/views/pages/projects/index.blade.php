<x-site-layout>
    <section class="blog-area three ptb-100">
        <div class="container">
            <div class="row">
                @each('pages.partials.project', $projects, 'project', 'pages.partials.no-item-found')
            </div>
            <div class="pagination-area">
                {!! $projects->links() !!}
            </div>
        </div>
    </section>
</x-site-layout>
