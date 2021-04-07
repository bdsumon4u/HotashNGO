<div class="header-area d-none d-md-block">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="left">
                    <ul class="d-flex">
                        <li class="text-truncate">
                            <i class="icofont-location-pin"></i>
                            <a style="max-width: 190px;" title="{{ setting('general', 'address') }}" href="javascript:void(0)">{{ setting('general', 'address') }}</a>
                        </li>
                        <li>
                            <i class="icofont-ui-call"></i>
                            <a href="tel:{{ setting('general', 'contact_phone') }}">{{ setting('general', 'contact_phone') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="right">
                    <ul>
                        <li>
                            <span>{{ __('Follow Us') }}:</span>
                        </li>
                        <li>
                            <a href="{{ setting('social', 'facebook') }}" target="_blank">
                                <i class="icofont-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ setting('social', 'twitter') }}" target="_blank">
                                <i class="icofont-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ setting('social', 'instagram') }}" target="_blank">
                                <i class="icofont-instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ setting('social', 'youtube') }}" target="_blank">
                                <i class="icofont-youtube-play"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="language">
                        <form action="{{ route('locale') }}" method="POST">
                            @csrf
                            <select name="locale" onchange="$(this).parent().submit()">
                                @foreach(['bn' => 'বাংলা', 'en' => 'English'] as $lang => $label)
                                <option value="{{ $lang }}" @if(app()->getLocale() === $lang)) selected @endif>{{ $label }}</option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                    <div class="header-search">
                        <i id="search-btn" class="icofont-search-2"></i>
                        <div id="search-overlay" class="block">
                            <div class="centered">
                                <div id="search-box">
                                    <i id="close-btn" class="icofont-close"></i>
                                    <form action="{{ route('search') }}">
                                        <input type="text" name="q" class="form-control" placeholder="{{ __('Search') }}..."/>
                                        <button type="submit" class="btn">{{ __('Search') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
