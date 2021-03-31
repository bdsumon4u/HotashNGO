<div class="row align-items-center">
    <div class="col-lg-6">
        <div class="testimonial-img">
            <img src="{{ $testimonial->getFullUrl('510x300') }}" alt="{{ $testimonial->getCustomProperty('name') }}">
            <h3>Micheal Shon</h3>
            <span>Director</span>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="testimonial-content">
            <ul>
                @php($rating = $testimonial->getCustomProperty('rating'))
                @foreach(range(1, 5) as $i)
                <li>
                    <i class="icofont-star checked"></i>
                </li>
                @endforeach
            </ul>
            <div>
                <p>{!! $testimonial->getCustomProperty('review') !!}</p>
            </div>
            <i class="icofont-quote-left quote"></i>
        </div>
    </div>
</div>
