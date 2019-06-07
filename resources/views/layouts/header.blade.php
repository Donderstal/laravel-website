
<section class="header">
    <div class="top-bar grid-x">
        <div class="cell small-3 large-2 large-order-3 header-subsection">
            <img src="{{ asset('img/ui-icons/search.svg') }}">
        </div>
        <div class="cell small-6 large-2 large-order-1 header-subsection">
            <!-- <p class="header__menu-paragraph navbar-header-font">G A M</p> --> 
            <img class="navbar__GAM-logo" src="{{ asset('img/ui-icons/GAM-logo-minimal-white.svg') }}">
        </div>
        <div class="cell small-3 large-8 large-order-2">
            <ul class="hide-for-large dropdown menu" data-dropdown-menu>
                <p class="header__dropdown-button"><u>M</u>ENU</p>
            </ul>
            <div class="show-for-large header-subsection">
                <p class="navbar-link-font header__menu-paragraph"><a class="header__menu-anchor" href="#"> Home</a></p>
                <p class="navbar-link-font header__menu-paragraph"><a class="header__menu-anchor"> Ons aanbod</a></p>
                <p class="navbar-link-font header__menu-paragraph"><a class="header__menu-anchor" href="{{ route('werkplaats') }}">Verkocht</a></p>
                <p class="navbar-link-font header__menu-paragraph"><a class="header__menu-anchor" href="{{ route('werkplaats') }}">Werkplaats</a></p>
                <p class="navbar-link-font header__menu-paragraph"><a class="header__menu-anchor" href="{{ route('financiering') }}">Financiering</a></p>
                <p class="navbar-link-font header__menu-paragraph"><a class="header__menu-anchor">Zoekopdracht</a></p>
                <p class="navbar-link-font header__menu-paragraph"><a class="header__menu-anchor" href="{{ route('over-ons') }}">Over ons</a></p>
                <p class="navbar-link-font header__menu-paragraph"><a class="header__menu-anchor" href="{{ route('contact') }}">Contact</a></p>
            </div>
        </div>
    </div>
</section>