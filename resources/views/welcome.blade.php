@extends('layouts.master')

@section('content')
    <section class="homepage">

        <div class="homepage__header-image-wrapper">
            <div class="homepage__header-image">
                
            </div>
        </div>

        <div class="grid-x homepage__main-content">
            <div class="grid-x homepage__search-bar">
                <div class="cell small-12 medium-8 search-bar__left">
                    <span class="search-bar__title">Vind jouw merk</span>
                    <img class="search-bar__icon" src="{{ asset('img/ui-icons/list-arrows.svg')}}">
                </div>
                <div class="cell small-12 medium-4 search-bar__right">
                    <button class="search-bar__button">ZOEKEN</button>
                </div>
            </div>
            
            <div class="cell small-12 homepage__featured grid-x">

                <div class="cell small-12">
                    <h2>UITGELICHT</h2>
                </div>

                <div class="cell small-12 grid-x">
                    @include('products.card')
                    @include('products.card')
                    @include('products.card')
                </div>

                <button class="homepage__our-products-button">Check dit aanbod bro</button>

            </div>

            <div class="homepage__about-and-info">
                <h2>GOOISCHE AUTO MEDIAIR</h2>
                <div>
                Adipiscing vestibulum molestie eros suspendisse habitant ullamcorper scelerisque volutpat dictumst adipiscing in accumsan iaculis vivamus parturient dis. Mus dictumst non congue condimentum curabitur mi vel ridiculus sem suspendisse senectus a convallis nostra condimentum tincidunt ac auctor orci nec ligula.
                </div>
                <div>
                    <div>
                    <p><i class="fas fa-map-marker-alt"></i><span> Energiestraat 25B <br/>
                    <u>1</u>411 AR, Naarden </span></p>
                </div>
                <div>
                    <p><i class="fas fa-phone"></i><span> <u>0</u>35 - 694 4646</span></p>
                </div>
                <div>
                    <p><i class="far fa-envelope"></i><span> <u>i</u>nfo@gambv.nl</span></p>
                </div>
                </div>
            </div>
        </div>

    </section>
@stop