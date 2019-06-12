@extends('layouts.master')

@section('content')
    <section class="ons-aanbod-wrapper">

        <div class="grid-x grid-container">

        @include('partials.search-bar')
            <div class="cell small-12 grid-x ons-aanbod__title-bar">
                <div class="cell small-12 medium-6">
                    <div class="ons-aanbod__header-wrapper">
                        <h2 class="ons-aanbod__header">ONS AANBOD</h2> <br class="show-for-small" />
                        <h2 class="ons-aanbod__header-number"> 00 </h2>
                    </div>
                </div>

                <div class="cell small-12 medium-6">
                    <div class="ons-aanbod__sort-wrapper">
                        <span class="ons-aanbod__sort-text"> Sorteren op </span>
                        <select class="ons-aanbod__sort-select">    
                            <option value="bouwjaar">Bouwjaar</option>
                            <option value="prijs">Prijs</option>
                            <option value="merk">Merk</option>
                            <option value="km-stand">Km-stand</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="cell small-12 grid-x grid-margin-y">
                @foreach($products as $indexKey => $product)
                 <div class="cell small-12 medium-6 large-3">
                    @include('products.card')
                </div>
                @endforeach
            </div> 

            <div class="ons-aanbod__nav-buttons__wrapper">
                <div class="ons-aanbod__nav-buttons">
                    <button class="ons-aanbod__bottom-button"> <img class="button-arrow-left svg-injection" src="{{ asset('img/ui-icons/arrow.svg') }}"> </button>
                </div> 
                <div class="ons-aanbod__nav-buttons">
                    <button class="ons-aanbod__bottom-button--active"> 1 </button>
                    <button class="ons-aanbod__bottom-button"> 2 </button>
                    <button class="ons-aanbod__bottom-button"> 3 </button>
                </div> 
                <div class="ons-aanbod__nav-buttons">
                    <button class="ons-aanbod__bottom-button"> <img class="button-arrow-right svg-injection" src="{{ asset('img/ui-icons/arrow.svg') }}">  </button>
                </div> 
            </div> 

        </div>

    </section>
@endsection