
@extends('layouts.master')

@section('content')
    <section class="ons-aanbod">

        <div class="grid-x homepage__search-bar">
            <div class="cell small-12 medium-8 search-bar__left">
                <span class="search-bar__title">Vind jouw merk</a>
                <img class="search-bar__icon" src="{{ asset('img/ui-icons/list-arrows.svg')}}">
            </div>
            <div class="cell small-12 medium-4 search-bar__right">
                <button class="search-bar__button">ZOEKEN</button>
            </div>
        </div>

        <div class="grid-x ons-aanbod">

            <div class="cell small-12 medium-6">
                <h2 class="ons-aanbod__header">ONS AANBOD</h2>
                <h2 class="ons-aanbod__header-number"> 00 </h2>
            </div>

            <div class="cell small-12 medium-6">
                <span class="ons-aanbod__sort-text"> Sorteren op </span>
                <select class="ons-aanbod__sort-select">    
                    <option value="volvo">Volvo</option>
                    <option value="saab">Saab</option>
                    <option value="mercedes">Mercedes</option>
                    <option value="audi">Audi</option>
                </select>
            </div>

        </div>

        <div class="grid-container">
            <div class="grid-x grid-margin-x grid-margin-y">
                @foreach($products as $indexKey => $product)
                    @include('products.card')
                @endforeach
            </div> 
        </div>
    <section>
@endsection