<x-site-layout>
    <div class="gallery-area ptb-100">
        <div class="container">
            <div class="row">
                @foreach($images as $image)
                <div class="col-sm-6 col-lg-4">
                    <div class="gallery-item">
                        <a href="{{ $image->getFullUrl() }}" data-lightbox="roadtrip">
                            <img src="{{ $image->getFullUrl() }}" alt="Gallery">
                            <i class="icofont-eye"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="pagination-area">
                {{ $images->links('pages.partials.pagination') }}
            </div>
        </div>
    </div>
</x-site-layout>
