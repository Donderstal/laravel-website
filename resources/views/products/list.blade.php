@extends('layouts.master', ['gamSearchState' =>  $gamSearchState])

@section('content')
    <section class="ons-aanbod-wrapper">

        <div class="grid-x grid-container">

            @include('partials.search-bar')

            <div class="cell small-12 grid-x ons-aanbod__title-bar">
                <div class="cell small-12 medium-6">
                    <div class="ons-aanbod__header-wrapper">
                        <h2 class="ons-aanbod__header"> {{ strtoupper( $title ) }} </h2> <br class="hide-for-large" />
                        <h2 class="ons-aanbod__header-number"> {{ $products->total() }} </h2>
                    </div>
                </div>

                <div class="cell small-12 medium-6">
                    <div class="ons-aanbod__sort-wrapper">
                        <span class="ons-aanbod__sort-text"> Sorteren op </span>
                        <select id="ons-aanbod-sorter" class="ons-aanbod__sort-select">
                            <option value="" selected="">Sorteer aanbod...</option>
                            @foreach(config('site.sortables') as $indexKey => $sortable)
                                <option
                                    value="{{ strtolower($sortable['slug']) }}"
                                    @if ($sortable['slug'] === $selected_sortable_slug)
                                        selected=""
                                    @endif
                                    >{{ $sortable['title'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div id="products-wrapper" class="cell small-12 grid-x grid-margin-y">
                @foreach($products as $indexKey => $product)
                 <div class="cell small-12 medium-6 large-4 xlarge-3">
                    @include('products.card')
                </div>
                @endforeach
            </div>

            {{-- bootstrap-4.blade.php is being used as the blade--}}
            {{ $products->links() }}
        </div>

    </section>
@endsection
@push('scripts-ready')
    $('#ons-aanbod-sorter').on('change', function() {
        window.gam.search.actionUpdateSort(this.value);
        window.gam.search.handleSearchRequest();
    });
@endpush
