<div class="grid-x search-bar">
    <div class="cell small-12 medium-7 search-bar__left">
        <select id="search-select" class="search-bar__title">
            <option value="" disabled selected>Vind jouw merk</option>
            @foreach($brands as $indexKey => $brand)
                <option
                    class="search-bar__option"
                    value="{{ strtolower($brand->slug) }}"
                    @if ($selected_brand_slug === $brand->slug)
                        selected="true"
                    @endif
                    >{{ $brand->title }}</option>
            @endforeach
        </select>
        <img class="search-bar__icon svg-injection" src="{{ mix('img/ui-icons/list-arrows.svg')}}">
    </div>
    <div class="cell small-0 medium-1">
    </div>
    <div class="cell small-12 medium-4 search-bar__right">
        <button id="brands-search-button" class="search-bar__button">ZOEKEN</button>
    </div>
</div>
@push('scripts-ready')
// add the binding for the change of the select and the click of the search
@endpush
