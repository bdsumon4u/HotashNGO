<div class="header-area d-none d-md-block">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="left">
                    <ul>
                        <li>
                            <i class="icofont-location-pin"></i>
                            <a href="#">6B, Helvetica street, Jordan</a>
                        </li>
                        <li>
                            <i class="icofont-ui-call"></i>
                            <a href="tel:+0123456987">+0123-456-987</a>
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
                    <div class="language">
                        <form action="{{ route('locale') }}" method="POST">
                            @csrf
                            <select name="locale" onchange="$(this).parent().submit()">
                                <option value="en" @if(app()->getLocale() == 'en')) selected @endif>English</option>
                                <option value="bn" @if(app()->getLocale() == 'bn')) selected @endif>বাংলা</option>
                            </select>
                        </form>
                    </div>
                    <div class="header-search">
                        <i id="search-btn" class="icofont-search-2"></i>
                        <div id="search-overlay" class="block">
                            <div class="centered">
                                <div id="search-box">
                                    <i id="close-btn" class="icofont-close"></i>
                                    <form>
                                        <input type="text" class="form-control" placeholder="{{ __('Search') }}..."/>
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
