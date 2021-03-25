<div class="banner-area-two three">
    <div class="banner-slider owl-theme owl-carousel">
        @foreach($slides as $slide)
        <div class="banner-slider-item" style="background-image: url('{{ $slide->getFullUrl('1920x800') }}')">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="banner-content">
                            <h1>{{ $slide->getCustomProperty('title') }}</h1>
                            <p>{{ $slide->getCustomProperty('text') }}</p>
                            <div class="banner-btn-area">
                                <a class="common-btn banner-btn" href="#">Get Start A Fundraising</a>
                                <a class="common-btn" href="#">{{ __('Donate') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
