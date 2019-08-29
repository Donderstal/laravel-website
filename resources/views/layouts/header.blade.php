@if( Route::currentRouteName() === 'landing-page' )
    <section class="header header-home">
@else
    <section class="header header-general">
@endif
    <div class="top-bar grid-x">
        <div class="cell small-3 large-2 large-order-3 header-subsection">

            <p id="navbar__search-icon" class="header__search-icon-wrapper">
            @if( Route::currentRouteName() === 'landing-page' )
                <img class="navbar__search-icon svg-injection" src="{{ mix('img/ui-icons/search.svg') }}">
            @else
                <img class="navbar__search-icon svg-injection" src="{{ mix('img/ui-icons/search-black.svg') }}">
            @endif
            </p>

            <div class="navbar__searchbar">
                <input
                    id="navbar__searchbar-input"
                    class="navbar__searchbar__input"
                    placeholder="Zoeken..."
                    type="text"
                    @if (isset($gamSearchState))
                        value="{{ $gamSearchState['queryParams']['q'] ?? '' }}"
                    @endif
                    >
                <button id="navbar__searchbar__button" class="navbar__searchbar__button">ZOEKEN</button>
            </div>

        </div>
        <div class="cell small-6 large-2 large-order-1 header-subsection">
            <div class="navbar__GAM-log-wrapper">
            @if( Route::currentRouteName() === 'landing-page' )
                <img class="logo-white navbar__GAM-logo" src="{{ mix('img/ui-icons/GAM-logo-minimal-white.svg') }}">

                <img class="logo-black navbar__GAM-logo__do-not-display" src="{{ mix('img/ui-icons/GAM-logo-minimal.svg') }}">
            @else
                <img class="logo-white navbar__GAM-logo__do-not-display" src="{{ mix('img/ui-icons/GAM-logo-minimal-white.svg') }}">

                <img class="logo-black navbar__GAM-logo" src="{{ mix('img/ui-icons/GAM-logo-minimal.svg') }}">
            @endif
            </div>
        </div>
        <div class="cell small-3 large-8 large-order-2 header__main-navigation">
            <div class="hide-for-large">
                <p id="header__dropdown-button" class="header__dropdown-button"><u>M</u>ENU</p>
            </div>
            <div class="header-main-menu">
                <p class="navbar-link-font header__menu-paragraph">
                    <a class="header__menu-anchor" href="/"> Home</a>
                </p>
                <p class="navbar-link-font header__menu-paragraph">
                    <a class="header__menu-anchor" href="{{ route('products.list', ['status'=>'aanbod']) }}"> Ons aanbod</a>
                </p>
                <p class="navbar-link-font header__menu-paragraph">
                    <a class="header__menu-anchor" href="{{ route('products.list', ['status'=>'verkocht']) }}">Verkocht</a>
                </p>
                <p class="navbar-link-font header__menu-paragraph">
                    <a class="header__menu-anchor" href="{{ route('werkplaats') }}">Werkplaats</a>
                </p>
                <p class="navbar-link-font header__menu-paragraph">
                    <a class="header__menu-anchor" href="{{ route('financiering') }}">Financiering</a>
                </p>
                <p class="navbar-link-font header__menu-paragraph">
                    <a class="header__menu-anchor" href="{{ route('zoektocht') }}">Zoektocht</a>
                </p>
                <p class="navbar-link-font header__menu-paragraph">
                    <a class="header__menu-anchor" href="{{ route('over-ons') }}">Over ons</a>
                </p>
                <p class="navbar-link-font header__menu-paragraph">
                    <a class="header__menu-anchor" href="{{ route('contact.create') }}">Contact</a>
                </p>
            </div>
        </div>
    </div>
</section>
@push('scripts-ready')
    $('#navbar__searchbar__button').on('click', function() {
        window.gam.search.handleSearchRequest()
    });
    $('#navbar__searchbar-input').on('change', function() {
        window.gam.search.actionUpdateQuery(this.value);
    });
@endpush
