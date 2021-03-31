<div class="col-lg-6">
    <div class="event-item">
        <img src="{{ $event->getFirstMediaUrl('events', '510x300') }}" alt="Event">
        <div class="inner">
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
    </div>
</div>
