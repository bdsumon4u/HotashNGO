<div class="col-sm-6 col-lg-4">
    <div class="team-item">
        <div class="top">
            <img src="{{ $person->getFullUrl('510x450') }}" alt="{{ $person->getCustomProperty('name') }}">
            <ul>
                <li>
                    <a href="{{ $person->getCustomProperty('facebook') }}" target="_blank">
                        <i class="icofont-facebook"></i>
                    </a>
                </li>
                <li>
                    <a href="{{ $person->getCustomProperty('twitter') }}" target="_blank">
                        <i class="icofont-twitter"></i>
                    </a>
                </li>
                <li>
                    <a href="{{ $person->getCustomProperty('instagram') }}" target="_blank">
                        <i class="icofont-instagram"></i>
                    </a>
                </li>
                <li>
                    <a href="{{ $person->getCustomProperty('youtube') }}" target="_blank">
                        <i class="icofont-youtube-play"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="bottom">
            <h3>{{ $person->getCustomProperty('name') }}</h3>
            <span>{{ $person->getCustomProperty('designation') }}</span>
        </div>
    </div>
</div>
