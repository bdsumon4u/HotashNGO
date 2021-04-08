<div class="col-sm-6 col-lg-4">
    <div class="blog-item">
        <div class="top">
            <a href="{{ route('projects.show', $project) }}">
                <img src="{{ $project->getFirstMediaUrl('projects', '430x250') }}" alt="Blog">
            </a>
        </div>
        <div class="bottom">
            <ul class="p-0">
                <li>
                    <div class="badge text-primary">{{ ucwords(str_replace('-', ' ', $project->category)) }}</div>
                </li>
            </ul>
            <h3>
                <a href="{{ route('projects.show', $project) }}">{{ $project->title }}</a>
            </h3>
            <div>{!! $project->excerpt !!}</div>
            <a class="blog-btn" href="{{ route('projects.show', $project) }}">Read More</a>
        </div>
    </div>
</div>
