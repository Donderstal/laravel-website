@extends('layouts.master')

@section('content')
    <section class="homepage">

        <div class="homepage__header-image-wrapper">
            <div class="homepage__header-image" style="background-image: url( {{ mix('img/city-street.jpg')}} )">
                @include('partials.search-bar')
                <div class="homepage__uitgelicht-pointer-wrapper">
                    <p id="homepage__uitgelicht-pointer" class="homepage__uitgelicht-pointer">
                        UITGELICHT
                        <img class="homepage__uitgelicht-pointer__icon svg-injection" src="{{ mix('img/ui-icons/arrows-down.svg')}}">
                    </p>
                </div>
            </div>
        </div>

        <div class="grid-x homepage__main-content">

            <div id="homepage__featured" class="cell small-12 homepage__featured grid-x">

                <div class="cell small-12">
                    <h2 id="homepage__featured-title" class="homepage__featured-title">UITGELICHT</h2>
                </div>

                <div class="cell small-12 homepage__featured-cars grid-x">
                    @foreach($products as $indexKey => $product)
                    <div class="cell small-12 large-4">
                        @include('products.card')
                    </div>
                    @endforeach
                </div>
                <div class="cell small-12 ">
                    <a class="homepage__our-products-button" href="{{ route('products.list', ['status'=>'aanbod']) }}">ONS AANBOD BEKIJKEN</a>
                </div>
                
            </div>

            <div class="cell small-12 homepage__about-and-info">
                <div class="homepage__about">
                    <h2 class="homepage__about-title">Dummy Company</h2>
                    <div>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </div>
                </div>

                <div class="cell small-12 grid-x homepage__contact-details-wrapper">

                    <div class="cell small-12 medium-4 grid-x homepage__contact-details">
                        <div class="cell small-1 medium-2 homepage__contact-details__left-div">
                            <p><i class="fas fa-map-marker-alt"></i></p>
                        </div>
                        <div class="cell small-11 medium-10 homepage__contact-details__right-div">
                            <p><a class="contact-details__anchor" target="_blank"> Voorbeeldstraat 13 <br/>
                            <u>14</u>90 XQ, Duckstad </a></p>
                        </div>
                    </div>

                    <div class="cell small-12 medium-4 grid-x homepage__contact-details">
                        <div class="cell small-1 medium-2 homepage__contact-details__left-div">
                            <p><i class="fas fa-phone"></i></p>
                        </div>
                        <div class="cell small-11 medium-10 homepage__contact-details__right-div">
                            <p> <a class="contact-details__anchor" target="_blank" href="tel:0356944646"><u>06</u> - 1234 5678</a></p>
                        </div>      
                    </div>

                    <div class="cell small-12 medium-4 grid-x homepage__contact-details">
                        <div class="cell small-1 medium-2 homepage__contact-details__left-div">
                            <p><i class="far fa-envelope"></i></p>
                        </div>
                        <div class="cell small-11 medium-10 homepage__contact-details__right-div">
                            <p><a href="mailto:info@companybv.nl" target="_blank" class="contact-details__anchor"> <u>in</u>fo@companybv.nl</a></p>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </section>
@stop
