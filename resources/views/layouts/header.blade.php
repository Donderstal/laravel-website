@if(Request::url() === 'http://www.gam.test' )
    <section class="header-home">
@else 
    <section class="header-general">
@endif
    <div class="top-bar grid-x">
        <div class="cell small-3 large-2 large-order-3 header-subsection">

            <p id="navbar__search-icon" class="header__search-icon-wrapper">
             <img class="navbar__search-icon svg-injection" src="{{ mix('img/ui-icons/search-black.svg') }}">
            </p>

            <div class="navbar__searchbar">
                <input id="navbar__searchbar-input" class="navbar__searchbar__input" placeholder="Zoeken..." type="text">
                <button id="navbar__searchbar__button" class="navbar__searchbar__button">ZOEKEN</button>
            </div>
            
        </div>
        <div class="cell small-6 large-2 large-order-1 header-subsection">
            @if(Request::url() === 'http://www.gam.test' )
                <img class="navbar__GAM-logo svg-injection" src="{{ mix('img/ui-icons/GAM-logo-minimal-white.svg') }}">
            @else 
                <img class="navbar__GAM-logo svg-injection" src="{{ mix('img/ui-icons/GAM-logo-minimal.svg') }}">
            @endif
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
                    <a class="header__menu-anchor" href="{{ route('contact') }}">Contact</a>
                </p>
            </div>
        </div>
    </div>
</section>