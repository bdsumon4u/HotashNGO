<x-site-layout>
    @include('pages.partials.banner')

    @include('pages.partials.about')

    <div class="benefit-area three pt-100 pb-70">
        <div class="container">
            <div class="section-title">
                <span class="sub-title">{{ setting('mission', 'section_name_'.app()->getLocale()) }}</span>
                <h2>{{ setting('mission', 'section_title_'.app()->getLocale()) }}</h2>
                <div>{{ setting('mission', 'description_'.app()->getLocale()) }}</div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="benefit-item">
                        <i class="flaticon-house"></i>
                        <h3>{{ setting('mission', 'home_title_'.app()->getLocale()) }}</h3>
                        <div>{{ setting('mission', 'home_details_'.app()->getLocale()) }}</div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="benefit-item two">
                        <i class="flaticon-hospital"></i>
                        <h3>{{ setting('mission', 'medical_title_'.app()->getLocale()) }}</h3>
                        <div>{{ setting('mission', 'medical_details_'.app()->getLocale()) }}</div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="benefit-item three">
                        <i class="flaticon-fast-food"></i>
                        <h3>{{ setting('mission', 'food_title_'.app()->getLocale()) }}</h3>
                        <div>{{ setting('mission', 'food_details_'.app()->getLocale()) }}</div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="benefit-item four">
                        <i class="flaticon-graduation-cap"></i>
                        <h3>{{ setting('mission', 'education_title_'.app()->getLocale()) }}</h3>
                        <div>{{ setting('mission', 'education_details_'.app()->getLocale()) }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($events = recent_events(4))
        <section class="event-area pt-100 pb-70">
            <div class="container">
                <div class="section-title">
                    <span class="sub-title">{{ setting('section', 'events_name_'.app()->getLocale()) }}</span>
                    <h2>{{ setting('section', 'events_title_'.app()->getLocale()) }}</h2>
                    <div class="text-light">{{ setting('section', 'events_description_'.app()->getLocale()) }}</div>
                </div>
                @if($events->isNotEmpty())
                <div class="row align-items-center">
                    @include('pages.partials.event', ['event' => $events[0]])
                    <div class="col-lg-6">
                        @foreach($events->skip(1) as $event)
                            <div class="event-item-right">
                                <h4>{{ $event->starts_at->day }} <span>{{ $event->starts_at->format('M') }}</span></h4>
                                <h3>
                                    <a href="{{ route('events.show', $event) }}">{{ $event->title }}</a>
                                </h3>
                                <ul>
                                    <li>
                                        <i class="icofont-stopwatch"></i>
                                        <span>{{ $event->starts_at->format('H:i A') }}</span>
                                    </li>
                                    <li>
                                        <i class="icofont-location-pin"></i>
                                        <span>{{ $event->location }}</span>
                                    </li>
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif
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
                        <p>{{ setting('odometer', 'fund_message_'.app()->getLocale()) }}</p>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-lg-3">
                    <div class="counter-item">
                        <i class="flaticon-event"></i>
                        <h3>
                            <span class="odometer" data-count="{{ setting('odometer', 'event_count') }}">00</span>
                        </h3>
                        <p>{{ setting('odometer', 'event_message_'.app()->getLocale()) }}</p>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-lg-3">
                    <div class="counter-item">
                        <i class="flaticon-charity"></i>
                        <h3>
                            <span class="odometer" data-count="{{ setting('odometer', 'volunteer_count') }}">00</span>
                        </h3>
                        <p>{{ setting('odometer', 'volunteer_message_'.app()->getLocale()) }}</p>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-lg-3">
                    <div class="counter-item">
                        <i class="flaticon-helping-hand"></i>
                        <h3>
                            <span class="odometer" data-count="{{ setting('odometer', 'donor_count') }}">00</span>
                        </h3>
                        <p>{{ setting('odometer', 'donor_message_'.app()->getLocale()) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('pages.partials.volunteer')

    <section class="testimonial-area ptb-100">
        <div class="container">
            <div class="section-title">
                <span class="sub-title">{{ setting('section', 'testimonial_name_'.app()->getLocale()) }}</span>
                <h2>{{ setting('section', 'testimonial_title_'.app()->getLocale()) }}</h2>
                <div>{{ setting('section', 'testimonial_description_'.app()->getLocale()) }}</div>
            </div>
            <div class="testimonial-slider owl-theme owl-carousel">
                @each('pages.partials.testimonial', $testimonials, 'testimonial')
            </div>
        </div>
    </section>


    <section class="blog-area three pt-100 pb-70">
        <div class="container">
            <div class="section-title">
                <span class="sub-title">{{ setting('section', 'news_name_'.app()->getLocale()) }}</span>
                <h2>{{ setting('section', 'news_title_'.app()->getLocale()) }}</h2>
                <div>{{ setting('section', 'news_description_'.app()->getLocale()) }}</div>
            </div>
            <div class="row">
                @each('pages.partials.news', $news, 'news')
            </div>
        </div>
    </section>
</x-site-layout>
