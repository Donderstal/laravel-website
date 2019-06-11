@extends('layouts.master')

@section('content')
    <section class="homepage">

        <div class="homepage__header-image-wrapper">
            <div class="homepage__header-image">
                @include('partials.search-bar')
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

                <div class="cell small-12 homepage__featured-cars grid-x">
                    @include('products.card')
                    @include('products.card')
                    @include('products.card')
                </div>
                <div class="cell small-12 ">
                    <a class="homepage__our-products-button" href="{{ route('products.list') }}">ONS AANBOD BEKIJKEN</a>
                </div>
                
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
                        <div class="cell small-1 medium-2 homepage__contact-details__left-div">
                            <p><i class="fas fa-map-marker-alt"></i></p>
                        </div>
                        <div class="cell small-11 medium-10 homepage__contact-details__right-div">
                            <p><a class="contact-details__anchor"> Energiestraat 25B <br/>
                            <u>1</u>411 AR, Naarden </a></p>
                        </div> 
                    </div>

                    <div class="cell small-12 medium-4 grid-x homepage__contact-details">
                        <div class="cell small-1 medium-2 homepage__contact-details__left-div">
                            <p><i class="fas fa-phone"></i></p>
                        </div>
                        <div class="cell small-11 medium-10 homepage__contact-details__right-div">
                            <p> <a class="contact-details__anchor"><u>0</u>35 - 694 4646</a></p>
                        </div>      
                    </div>

                    <div class="cell small-12 medium-4 grid-x homepage__contact-details">
                        <div class="cell small-1 medium-2 homepage__contact-details__left-div">
                            <p><i class="far fa-envelope"></i></p>
                        </div>
                        <div class="cell small-11 medium-10 homepage__contact-details__right-div">
                            <p><a class="contact-details__anchor"> <u>i</u>nfo@gambv.nl</a></p>
                        </div>
                    </div>

                </div>
                
            </div>
        </div>

    </section>
@stop