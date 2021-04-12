<x-site-layout>
    <section class="testimonial-area two ptb-100">
        <div class="container">
            @each('pages.partials.testimonial', $testimonials, 'testimonial')
            <div class="pagination-area">
                {{ $testimonials->links('pages.partials.pagination') }}
            </div>
        </div>
    </section>
</x-site-layout>
