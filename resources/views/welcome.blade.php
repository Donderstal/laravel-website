@extends('layouts.master')

@section('content')
    <section class="homepage">

        <div class="homepage__header-image-wrapper">
            <div class="homepage__header-image">
                <div class="grid-x homepage__search-bar">
                    <div class="cell small-12 medium-8 search-bar__left">
                        <span class="search-bar__title">Vind jouw merk</span>
                        <img class="search-bar__icon" src="{{ asset('img/ui-icons/list-arrows.svg')}}">
                    </div>
                    <div class="cell small-12 medium-4 search-bar__right">
                        <button class="search-bar__button">ZOEKEN</button>
                    </div>
                </div>
                <div class="homepage__uitgelicht-pointer-wrapper">
                    <p class="homepage__uitgelicht-pointer">
                        UITGELICHT
                        <img class="homepage__uitgelicht-pointer__icon" src="{{ asset('img/ui-icons/arrows-down.svg')}}">
                    </p>
                </div>
            </div>
        </div>

        <div class="grid-x homepage__main-content">
            
            <div class="cell small-12 homepage__featured grid-x">

                <div class="cell small-12">
                    <h2 class="homepage__featured-title">UITGELICHT</h2>
                </div>

                <div class="cell small-12 grid-x">
                    @include('products.card')
                    @include('products.card')
                    @include('products.card')
                </div>

                <button class="homepage__our-products-button">ONS AANBOD BEKIJKEN</button>

            </div>

            <div class="cell small-12 homepage__about-and-info">
                <div class="homepage__about">
                    <h2 class="homepage__about-title">GOOISCHE AUTO MEDIAIR</h2>
                    <div>
                    Adipiscing vestibulum molestie eros suspendisse habitant ullamcorper scelerisque volutpat dictumst adipiscing in accumsan iaculis vivamus parturient dis. Mus dictumst non congue condimentum curabitur mi vel ridiculus sem suspendisse senectus a convallis nostra condimentum tincidunt ac auctor orci nec ligula.
                    </div>
                </div>

                <div class="cell small-12 grid-x homepage__contact-details-wrapper"> 

                    <div class="cell small-12 medium-4 grid-x homepage__contact-details">
                        <div class="cell small-2 homepage__contact-details__left-div">
                            <p><i class="fas fa-map-marker-alt"></i></p>
                        </div>
                        <div class="cell small-10 homepage__contact-details__right-div">
                            <p><span> Energiestraat 25B <br/>
                            <u>1</u>411 AR, Naarden </span></p>
                        </div> 
                    </div>

                    <div class="cell small-12 medium-4 grid-x homepage__contact-details">
                        <div class="cell small-2 homepage__contact-details__left-div">
                            <p><i class="fas fa-phone"></i></p>
                        </div>
                        <div class="cell small-10 homepage__contact-details__right-div">
                            <p> <u>0</u>35 - 694 4646</span></p>
                        </div>      
                    </div>

                    <div class="cell small-12 medium-4 grid-x homepage__contact-details">
                        <div class="cell small-2 homepage__contact-details__left-div">
                            <p><i class="far fa-envelope"></i></p>
                        </div>
                        <div class="cell small-10 homepage__contact-details__right-div">
                            <p><span> <u>i</u>nfo@gambv.nl</span></p>
                        </div>
                    </div>

                </div>
                
            </div>
        </div>

    </section>
@stop