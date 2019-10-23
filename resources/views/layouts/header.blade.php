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
                    @if (isset($companySearchState))
                        value="{{ $companySearchState['queryParams']['q'] ?? '' }}"
                    @endif
                    >
                <button id="navbar__searchbar__button" class="navbar__searchbar__button">ZOEKEN</button>
            </div>

        </div>
        <div class="cell small-6 large-2 large-order-1 header-subsection">
            <div class="navbar__company-log-wrapper">
            @if( Route::currentRouteName() === 'landing-page' )
                <img class="clickable__logo logo-white navbar__company-logo" src="{{ mix('img/ui-icons/plus.svg') }}">

                <img class="clickable__logo logo-black navbar__company-logo__do-not-display" src="{{ mix('img/ui-icons/link.svg') }}">
            @else
                <img class="clickable__logo logo-white navbar__company-logo__do-not-display" src="{{ mix('img/ui-icons/plus.svg') }}">

                <img class="clickable__logo logo-black navbar__company-logo" src="{{ mix('img/ui-icons/link.svg') }}">
            @endif
            </div>
        </div>
        <div class="cell small-3 large-8 large-order-2 header__main-navigation">
            <div class="hide-for-large">
                <p id="header__dropdown-button" class="header__dropdown-button"><u>ME</u>NU</p>
            </div>
            <div class="header-main-menu">
                <p class="navbar-link-font header__menu-paragraph">
                    <a class="header__menu-anchor {{ (Route::currentRouteName() === 'landing-page')  ? 'header__active-link' : '' }}" href="{{ route('landing-page') }}"> Home</a>
                </p>
                <p class="navbar-link-font header__menu-paragraph">
                    <a class="header__menu-anchor {{ ( Route::currentRouteName() === 'products.list' && $page_title === 'Aanbod' ) ? 'header__active-link' : '' }}" href="{{ route('products.list', ['status'=>'aanbod']) }}"> Ons aanbod</a>
                </p>
                <p class="navbar-link-font header__menu-paragraph">
                    <a class="header__menu-anchor {{ ( Route::currentRouteName() === 'products.list' && $page_title === 'Verkocht' ) ? 'header__active-link' : '' }}" href="{{ route('products.list', ['status'=>'verkocht']) }}">Verkocht</a>
                </p>
                <p class="navbar-link-font header__menu-paragraph">
                    <a class="header__menu-anchor {{ ( Route::currentRouteName() === 'page1')? 'header__active-link' : '' }}" href="{{ route('page1') }}">page1</a>
                </p>
                <p class="navbar-link-font header__menu-paragraph">
                    <a class="header__menu-anchor {{ ( Route::currentRouteName() === 'page2')? 'header__active-link' : '' }}" href="{{ route('page2') }}">page2</a>
                </p>
                <p class="navbar-link-font header__menu-paragraph">
                    <a class="header__menu-anchor {{ ( Route::currentRouteName() === 'page3')? 'header__active-link' : '' }}" href="{{ route('page3') }}">page3</a>
                </p>
                <p class="navbar-link-font header__menu-paragraph">
                    <a class="header__menu-anchor {{ ( Route::currentRouteName() === 'page4')? 'header__active-link' : '' }}" href="{{ route('page4') }}">Over ons</a>
                </p>
                <p class="navbar-link-font header__menu-paragraph">
                    <a class="header__menu-anchor {{ ( Route::currentRouteName() === 'contact.create' || Route::currentRouteName() === 'contact.store ')? 'header__active-link' : '' }}" href="{{ route('contact.create') }}">Contact</a>
                </p>
            </div>
        </div>
    </div>
</section>
@push('scripts-ready')
    $('#navbar__searchbar__button').on('click', function() {
        window.company.search.handleSearchRequest()
    });
    $('#navbar__searchbar-input').on('change', function() {
        window.company.search.actionUpdateQuery(this.value);
    });
@endpush
@if( Route::currentRouteName() === 'landing-page' )
    <section class="header-sticky header-home">
@else
    <section class="header-sticky header-general">
@endif
    <div class="top-bar grid-x">
        <div class="cell small-3 large-2 large-order-3 header-subsection">

            <p id="navbar__search-icon--sticky" class="header__search-icon-wrapper">
            @if( Route::currentRouteName() === 'landing-page' )
                <img class="navbar__search-icon svg-injection" src="{{ mix('img/ui-icons/search.svg') }}">
            @else
                <img class="navbar__search-icon svg-injection" src="{{ mix('img/ui-icons/search-black.svg') }}">
            @endif
            </p>

            <div class="navbar__searchbar--sticky">
                <input
                    id="navbar__searchbar-input--sticky"
                    class="navbar__searchbar__input"
                    placeholder="Zoeken..."
                    type="text"
                    @if (isset($companySearchState))
                        value="{{ $companySearchState['queryParams']['q'] ?? '' }}"
                    @endif
                    >
                <button id="navbar__searchbar__button" class="navbar__searchbar__button">ZOEKEN</button>
            </div>

        </div>
        <div class="cell small-6 large-2 large-order-1 header-subsection">
            <div class="navbar__company-log-wrapper">
            @if( Route::currentRouteName() === 'landing-page' )
                <img class="clickable__logo logo-white navbar__company-logo" src="{{ mix('img/ui-icons/plus.svg') }}">

                <img class="clickable__logo logo-black navbar__company-logo__do-not-display" src="{{ mix('img/ui-icons/link.svg') }}">
            @else
                <img class="clickable__logo logo-white navbar__company-logo__do-not-display" src="{{ mix('img/ui-icons/plus.svg') }}">

                <img class="clickable__logo logo-black navbar__company-logo" src="{{ mix('img/ui-icons/link.svg') }}">
            @endif
            </div>
        </div>
        <div class="cell small-3 large-8 large-order-2 header__main-navigation">
            <div class="hide-for-large">
                <p id="header__dropdown-button--sticky" class="header__dropdown-button"><u>ME</u>NU</p>
            </div>
            <div class="header-main-menu">
                <p class="navbar-link-font header__menu-paragraph">
                    <a class="header__menu-anchor {{ (Route::currentRouteName() === 'landing-page')  ? 'header__active-link' : '' }}" href="{{ route('landing-page') }}"> Home</a>
                </p>
                <p class="navbar-link-font header__menu-paragraph">
                    <a class="header__menu-anchor {{ ( Route::currentRouteName() === 'products.list' && $page_title === 'Aanbod' ) ? 'header__active-link' : '' }}" href="{{ route('products.list', ['status'=>'aanbod']) }}"> Ons aanbod</a>
                </p>
                <p class="navbar-link-font header__menu-paragraph">
                    <a class="header__menu-anchor {{ ( Route::currentRouteName() === 'products.list' && $page_title === 'Verkocht' ) ? 'header__active-link' : '' }}" href="{{ route('products.list', ['status'=>'verkocht']) }}">Verkocht</a>
                </p>
                <p class="navbar-link-font header__menu-paragraph">
                    <a class="header__menu-anchor {{ ( Route::currentRouteName() === 'page1')? 'header__active-link' : '' }}" href="{{ route('page1') }}">page1</a>
                </p>
                <p class="navbar-link-font header__menu-paragraph">
                    <a class="header__menu-anchor {{ ( Route::currentRouteName() === 'page2')? 'header__active-link' : '' }}" href="{{ route('page2') }}">page2</a>
                </p>
                <p class="navbar-link-font header__menu-paragraph">
                    <a class="header__menu-anchor {{ ( Route::currentRouteName() === 'page3')? 'header__active-link' : '' }}" href="{{ route('page3') }}">page3</a>
                </p>
                <p class="navbar-link-font header__menu-paragraph">
                    <a class="header__menu-anchor {{ ( Route::currentRouteName() === 'page4')? 'header__active-link' : '' }}" href="{{ route('page4') }}">Over ons</a>
                </p>
                <p class="navbar-link-font header__menu-paragraph">
                    <a class="header__menu-anchor {{ ( Route::currentRouteName() === 'contact.create' || Route::currentRouteName() === 'contact.store ')? 'header__active-link' : '' }}" href="{{ route('contact.create') }}">Contact</a>
                </p>
            </div>
        </div>
    </div>
</section>
