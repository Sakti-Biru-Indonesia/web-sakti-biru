<div class="dropdown">
    <button class="btn btn-secondary active-language" type="button" data-bs-toggle="dropdown" aria-expanded="true">
        @if (App::getLocale() == 'id')
            <img src="{{ asset('images/indo.png') }}" alt="Indonesia Flag">
            <span>ID</span>
        @else
            <img src="{{ asset('images/en.png') }}" alt="English Flag">
            <span>EN</span>
        @endif
    </button>
    <ul class="dropdown-menu dropdown-menu-end">
        <li>
            <a href="{{ route('lang.swap', ['locale' => 'id']) }}">
                <span>Bahasa Indonesia</span>
                <img src="{{ asset('images/indo.png') }}"alt="Indonesia Flag">
            </a>
        </li>
        <li>
            <a href="{{ route('lang.swap', ['locale' => 'en']) }}">
                <span>English</span>
                <img src="{{ asset('images/en.png') }}" alt="English Flag">
            </a>
        </li>
    </ul>
</div>
