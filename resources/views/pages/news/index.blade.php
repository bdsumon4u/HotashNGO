<x-site-layout>
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
</x-site-layout>
