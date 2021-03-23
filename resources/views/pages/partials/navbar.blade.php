<div class="navbar-area sticky-top">

    <div class="mobile-nav">
        <a href="{{ url('/') }}" class="logo">
            <img src="{{ asset(setting('general', 'logo')) }}" alt="Logo">
        </a>
    </div>

    <div class="main-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset(setting('general', 'logo')) }}" alt="Logo">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link @if(request()->is('/')) active @endif">{{ __('Home') }}</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link dropdown-toggle">{{ __('Pages') }} <i class="icofont-simple-down"></i></a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="#" class="nav-link dropdown-toggle">Users <i
                                            class="icofont-simple-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="sign-in.html" class="nav-link">Sign In</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="sign-up.html" class="nav-link">Sign Up</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="gallery.html" class="nav-link">Gallery</a>
                                </li>
                                <li class="nav-item">
                                    <a href="testimonials.html" class="nav-link">Testimonials</a>
                                </li>
                                <li class="nav-item">
                                    <a href="team.html" class="nav-link">Team</a>
                                </li>
                                <li class="nav-item">
                                    <a href="faq.html" class="nav-link">FAQ</a>
                                </li>
                                <li class="nav-item">
                                    <a href="404.html" class="nav-link">404 Error Page</a>
                                </li>
                                <li class="nav-item">
                                    <a href="coming-soon.html" class="nav-link">Coming Soon</a>
                                </li>
                                <li class="nav-item">
                                    <a href="privacy-policy.html" class="nav-link">Privacy Policy</a>
                                </li>
                                <li class="nav-item">
                                    <a href="terms-conditions.html" class="nav-link">Terms & Conditions</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('about-us') }}" class="nav-link @if(request()->is('about-us')) active @endif">{{ __('About Us') }}</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link dropdown-toggle">{{ __('Donations') }} <i
                                    class="icofont-simple-down"></i></a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="donations.html" class="nav-link">Donations</a>
                                </li>
                                <li class="nav-item">
                                    <a href="donation-details.html" class="nav-link">Donation Details</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link dropdown-toggle @if(request()->is(['events', 'events/*'])) active @endif">{{ __('Events') }} <i class="icofont-simple-down"></i></a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="{{ route('events.index') }}" class="nav-link @if(request()->is('events')) active @endif">Events</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('events.show', mt_rand()) }}" class="nav-link @if(request()->is('events/*')) active @endif">Event Details</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link dropdown-toggle">{{ __('Blog') }} <i class="icofont-simple-down"></i></a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="blog.html" class="nav-link">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a href="blog-details.html" class="nav-link">Blog Details</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('contact-us') }}" class="nav-link @if(request()->is('contact-us')) active @endif">{{ __('Contact Us') }}</a>
                        </li>
                    </ul>
                    <div class="side-nav">
                        <a class="donate-btn" href="{{ route('donate') }}">
                            {{ __('Donate') }}
                            <i class="icofont-heart-alt"></i>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
