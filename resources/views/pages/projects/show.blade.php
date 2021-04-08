<x-site-layout>
    <div class="blog-details-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="details-item">
                        <div class="details-img">
                            <img src="{{ $project->getFirstMediaUrl('projects', '860x500') }}" alt="Details">
                            <ul>
                                <li>
                                    <div class="badge text-primary">{{ ucwords(str_replace('-', ' ', $project->category)) }}</div>
                                </li>
                            </ul>
                            <h2>{{ $project->title }}</h2>
                            <div class="page-content">{!! $project->content !!}</div>
                        </div>
                        <div class="details-share">
                            <div class="row">
                                <div class="col-sm-6 col-lg-6">
                                    <div class="left">
                                        <ul>
                                            <li>
                                                <span>Share:</span>
                                            </li>
                                            <li>
                                                <a href="#" target="_blank">
                                                    <i class="icofont-facebook"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" target="_blank">
                                                    <i class="icofont-twitter"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" target="_blank">
                                                    <i class="icofont-youtube-play"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" target="_blank">
                                                    <i class="icofont-instagram"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-6">
                                    <div class="right">
                                        <ul>
                                            <li>
                                                <!-- <span>Tags:</span> -->
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
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
                        <div class="post widget-item">
                            <h3>@lang('Recent Projects')</h3>
                            @foreach(recent_projects(5, $project->id) as $project)
                            <div class="post-inner">
                                <ul class="align-items-center">
                                    <li>
                                        <img src="{{ $project->getFirstMediaUrl('projects', '430x250') }}" alt="Details">
                                    </li>
                                    <li>
                                        <h4>
                                            <a href="{{ route('projects.show', $project) }}">{{ $project->title }}</a>
                                        </h4>
                                        <i class="icofont-calendar"></i>
                                        {{ $project->created_at->format('d-M-Y') }}
                                    </li>
                                </ul>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-site-layout>
