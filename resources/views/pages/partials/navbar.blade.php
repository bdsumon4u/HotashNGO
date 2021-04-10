<div class="navbar-area sticky-top">

    <div class="mobile-nav">
        <a href="{{ url('/') }}" class="logo">
            <img src="{{ asset(setting('general', 'logo')) }}" style="height: 3.125rem; width: 10.625rem;" alt="Logo">
        </a>
    </div>

    <div class="main-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset(setting('general', 'logo')) }}" style="height: 3.125rem; width: 10.625rem;" alt="Logo">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        @foreach($items as $item)
                            @php $has_child = $item->childrens->isNotEmpty() @endphp
                        <li class="nav-item">
                            <a href="{{ url($item->link) }}" class="nav-link @if($has_child) dropdown-toggle @endif @if(request()->is($item->link)) active @endif">{{ __($item->label) }} @if($has_child)<i class="icofont-simple-down"></i>@endif</a>
                            @if($has_child)
                                <ul class="dropdown-menu">
                                    @foreach($item->childrens as $item)
                                        @php $has_child = $item->childrens->isNotEmpty() @endphp
                                    <li class="nav-item">
                                        <a href="{{ url($item->link) }}" class="nav-link @if($has_child) dropdown-toggle @endif @if(request()->is($item->link)) active @endif">{{ __($item->label) }} @if($has_child)<i class="icofont-simple-down"></i>@endif</a>
                                        @if($has_child)
                                            <ul class="dropdown-menu">
                                                @foreach($item->childrens as $item)
                                                    @php $has_child = $item->childrens->isNotEmpty() @endphp
                                                    <li class="nav-item">
                                                        <a href="{{ url($item->link) }}" class="nav-link @if($has_child) dropdown-toggle @endif @if(request()->is($item->link)) active @endif">{{ __($item->label) }} @if($has_child)<i class="icofont-simple-down"></i>@endif</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                        @endforeach
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
