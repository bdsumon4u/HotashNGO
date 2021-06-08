<div class="about-area pt-100 pb-70">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-img">
                    <img src="{{ setting('about', 'image') }}" alt="About">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-content">
                    <div class="section-title">
                        <span class="sub-title">@lang(setting('about', 'section_name_'.app()->getLocale()))</span>
                        <h2>@lang(setting('about', 'section_title_'.app()->getLocale()))</h2>
                    </div>
                    @php($description = setting('about', 'description_'.app()->getLocale()))
                    @if(($large = strlen(strip_tags($description)) > 500) && request()->fullUrlIs(url('/')))
                        <div>{!! substr($description, 0, 500) !!}</div>
                    @else
                        <div>{!! $description !!}</div>
                    @endif
                    <div class="about-btn-area">
                        @if($text = setting('about', 'button_text'))
                        <a class="common-btn about-btn" href="{{ setting('about', 'button_link') }}">@lang($text)</a>
                        @endif

                        @if(request()->fullUrlIs(url('/')) && $large)
                        <a class="common-btn" href="{{ route('about-us') }}">@lang('Read More')</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
