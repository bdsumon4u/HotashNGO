<x-site-layout>
    @include('pages.partials.banner')

    @include('pages.partials.about')

    <div class="benefit-area three pt-100 pb-70">
        <div class="container">
            <div class="section-title">
                <span class="sub-title">@lang(setting('mission', 'section_name'))</span>
                <h2>@lang(setting('mission', 'section_title'))</h2>
                <div>{{ setting('mission', 'description') }}</div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="benefit-item">
                        <i class="flaticon-house"></i>
                        <h3>@lang(setting('mission', 'home_title'))</h3>
                        <div>{{ setting('mission', 'home_details') }}</div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="benefit-item two">
                        <i class="flaticon-hospital"></i>
                        <h3>@lang(setting('mission', 'medical_title'))</h3>
                        <div>{{ setting('mission', 'medical_details') }}</div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="benefit-item three">
                        <i class="flaticon-fast-food"></i>
                        <h3>@lang(setting('mission', 'food_title'))</h3>
                        <div>{{ setting('mission', 'food_details') }}</div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="benefit-item four">
                        <i class="flaticon-graduation-cap"></i>
                        <h3>@lang(setting('mission', 'education_title'))</h3>
                        <div>{{ setting('mission', 'education_details') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($events = recent_events(4))
    <section class="event-area pt-100 pb-70">
        <div class="container">
            <div class="section-title">
                <span class="sub-title">Our events</span>
                <h2>Upcoming/recent events</h2>
            </div>
            <div class="row align-items-center">
                @include('pages.partials.event', ['event' => $events[0]])
                <div class="col-lg-6">
                    @foreach($events->skip(1) as $event)
                    <div class="event-item-right">
                        <h4>{{ $events[0]->starts_at->day }} <span>{{ $events[0]->starts_at->format('M') }}</span></h4>
                        <h3>
                            <a href="{{ route('events.show', $events[0]) }}">{{ $events[0]->title }}</a>
                        </h3>
                        <ul>
                            <li>
                                <i class="icofont-stopwatch"></i>
                                <span>{{ $events[0]->starts_at->format('H:i A') }}</span>
                            </li>
                            <li>
                                <i class="icofont-location-pin"></i>
                                <span>{{ $events[0]->location }}</span>
                            </li>
                        </ul>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif

    <div class="counter-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-6 col-sm-6 col-lg-3">
                    <div class="counter-item">
                        <i class="flaticon-index"></i>
                        <h3>
                            @php($data = explode(' ', setting('odometer', 'fund_amount')))
                            <span class="odometer" data-count="{{ data_get($data, 0, 0) }}">00</span>
                            <span class="target">{{ data_get($data, 1, '') }}</span>
                        </h3>
                        <p>Total fund raised</p>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-lg-3">
                    <div class="counter-item">
                        <i class="flaticon-event"></i>
                        <h3>
                            <span class="odometer" data-count="{{ setting('odometer', 'event_count') }}">00</span>
                        </h3>
                        <p>Successful events</p>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-lg-3">
                    <div class="counter-item">
                        <i class="flaticon-charity"></i>
                        <h3>
                            <span class="odometer" data-count="{{ setting('odometer', 'volunteer_count') }}">00</span>
                        </h3>
                        <p>Worldwide volunteers</p>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-lg-3">
                    <div class="counter-item">
                        <i class="flaticon-helping-hand"></i>
                        <h3>
                            <span class="odometer" data-count="{{ setting('odometer', 'donor_count') }}">00</span>
                        </h3>
                        <p>Our donner</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('pages.partials.volunteer')

    <section class="testimonial-area ptb-100">
        <div class="container">
            <div class="section-title">
                <span class="sub-title">Testimonials</span>
                <h2>Review from our clients</h2>
            </div>
            <div class="testimonial-slider owl-theme owl-carousel">
                @each('pages.partials.testimonial', $testimonials, 'testimonial')
            </div>
        </div>
    </section>


    <section class="blog-area three pt-100 pb-70">
        <div class="container">
            <div class="section-title">
                <span class="sub-title">Latest news & blog</span>
                <h2>Latest charity blog</h2>
                <p>We exist for non-profits, social enterprises, community groups, activists,lorem politicians and
                    individual citizens that are making.</p>
            </div>
            <div class="row">
                @each('pages.partials.news', $news, 'news')
            </div>
        </div>
    </section>
</x-site-layout>
