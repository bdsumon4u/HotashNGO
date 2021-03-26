<ul>
    @foreach($items as $item)
    <li>
        <a href="{{ $item->link }}">
            <i class="icofont-simple-right"></i>
            {{ __($item->label) }}
        </a>
    </li>
    @endforeach
</ul>
