<div class="grid-x search-bar">
    <div class="cell small-12 medium-7 search-bar__left">
        <select id="search-select" class="search-bar__title">
            <option value="" disabled selected>Vind jouw merk</option>
            @foreach($brands as $indexKey => $brand)
                <option
                    class="search-bar__option"
                    value="{{ strtolower($brand->slug) }}"
                    @if (isset($selected_brand_slug) && $selected_brand_slug === $brand->slug)
                        selected="true"
                    @endif
                    >{{ $brand->title }}</option>
            @endforeach
        </select>
        <span id="search-bar__icon" class="search-bar__icon-wrapper" >
            <span class="search-bar__inner-wrapper">
                <img class="search-bar__icon" src="{{ mix('img/ui-icons/list-arrows.svg')}}">
            </span>
        </span>
    </div>
    <div class="cell search-bar__middle small-0 medium-1">
    </div>
    <div class="cell small-12 medium-4 search-bar__right">
        <button id="brands-search-button" class="search-bar__button">ZOEKEN</button>
    </div>
</div>
@push('scripts-ready')
    $('#brands-search-button').on('click', function() {
        window.gam.search.handleSearchRequest()
    });
    $('#search-select').on('change', function() {
        window.gam.search.actionUpdateBrand(this.value);
    });
@endpush
