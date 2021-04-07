<x-site-layout>
    <div class="event-details-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="details-item">
                        <div class="details-img">
                            <img src="{{ $event->getFirstMediaUrl('events', '860x500') }}" alt="Details">
                            <h2>{{ $event->title }}</h2>
                            <div>{!! $event->content !!}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="widget-area">
                        <div class="search widget-item">
                            <form action="{{ route('search') }}">
                                <input type="text" name="q" class="form-control" placeholder="Search...">
                                <button type="submit" class="btn">
                                    <i class="icofont-search-1"></i>
                                </button>
                            </form>
                        </div>
                        <div class="information widget-item">
                            <h3>Event information</h3>
                            <ul>
                                <li>
                                    <span>Organizer:</span>
                                    {{ $event->organizer }}
                                </li>
                                <li>
                                    <span>Start:</span>
                                    {{ $event->starts_at->format('d-M-Y H:i A') }}
                                </li>
                                <li>
                                    <span>Finish:</span>
                                    {{ $event->finish_at->format('d-M-Y H:i A') }}
                                </li>
                                <li>
                                    <span>Location:</span>
                                    {{ $event->location }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-site-layout>
