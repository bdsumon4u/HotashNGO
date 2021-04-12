<div class="row">
    <div class="col-lg-6">
        <div class="testimonial-img">
            <img src="{{ $testimonial->getFullUrl('510x300') }}" alt="{{ $testimonial->getCustomProperty('name') }}">
            <h3>{{ $testimonial->getCustomProperty('name') }}</h3>
            <span>{{ $testimonial->getCustomProperty('designation') }}</span>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="testimonial-content">
            <ul class="d-none">
                @php($rating = $testimonial->getCustomProperty('rating'))
                @foreach(range(1, 5) as $i)
                <li>
                    <i class="icofont-star @if($i <= $rating) checked @endif"></i>
                </li>
                @endforeach
            </ul>
            <div>
                @if(request()->fullUrlIs(url('/speeches/*')))
                    {!! nl2br($testimonial->getCustomProperty('review')) !!}
                @else
                    {{ get_excerpt($testimonial->getCustomProperty('review'), 500) }}
                    <div class="mt-2">
                        <a class="common-btn" href="{{ route('testimonials.show', $testimonial) }}">
                            @lang('Read More')
                        </a>
                    </div>
                @endif
            </div>
            <i class="icofont-quote-left quote"></i>
        </div>
    </div>
</div>
