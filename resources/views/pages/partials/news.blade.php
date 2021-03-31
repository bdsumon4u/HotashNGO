<div class="col-sm-6 col-lg-4">
    <div class="blog-item">
        <div class="top">
            <a href="{{ route('news.show', $news) }}">
                <img src="{{ $news->getFirstMediaUrl('news', '430x250') }}" alt="Blog">
            </a>
        </div>
        <div class="bottom">
            <ul>
                <li>
                    <i class="icofont-calendar"></i>
                    <span>{{ $news->created_at->format('d-M-Y') }}</span>
                </li>
            </ul>
            <h3>
                <a href="{{ route('news.show', $news) }}">{{ $news->title }}</a>
            </h3>
            <div>{!! $news->excerpt !!}</div>
            <a class="blog-btn" href="{{ route('news.show', $news) }}">Read More</a>
        </div>
    </div>
</div>
