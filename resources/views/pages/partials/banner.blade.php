<div class="banner-area-two three">
    <div class="banner-slider owl-theme owl-carousel">
        @foreach($slides as $slide)
        <div class="banner-slider-item" style="background-image: url('{{ $slide->getFullUrl('1920x600') }}')">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="banner-content">
                            <h1>{{ $slide->getCustomProperty('title_'.app()->getLocale()) }}</h1>
                            <p>{{ $slide->getCustomProperty('text_'.app()->getLocale()) }}</p>
                            <div class="banner-btn-area">
                                @if($text = $slide->getCustomProperty('button1_text_'.app()->getLocale()))
                                <a class="common-btn banner-btn" href="{{ $slide->getCustomProperty('button1_link') }}">{{ __($text) }}</a>
                                @endif
                                @if($text = $slide->getCustomProperty('button2_text_'.app()->getLocale()))
                                    <a class="common-btn" href="{{ $slide->getCustomProperty('button2_link') }}">{{ __($text) }}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
