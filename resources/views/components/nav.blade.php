<nav class="nav full">
    <h2 class="nav__title sro">@lang('nav.title')</h2>
    <a href="{{ route('home') }}" class="nav__item nav__item--logo">@lang('nav.home')</a>
    <a href="{{ route('contact') }}" class="nav__item nav__item--contact">
        @lang('nav.contact')
        <span class="item__arrow">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
            </svg>
        </span>
    </a>
</nav>
