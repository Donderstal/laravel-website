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
                    <h2 class="homepage__about-title">GOOISCHE AUTO MEDIAIR</h2>
                    <div>
                    Persoonlijke service, aandacht, maatwerk en vooral veel liefde voor auto’s. Dat is de Gooische Auto Mediair. We zoeken, leveren en onderhouden auto’s van alle premiummerken voor klanten in heel Nederland. Dit doen wij met enorm veel passie en plezier en veel tevreden klanten als resultaat.
                    </div>
                </div>

                <div class="cell small-12 grid-x homepage__contact-details-wrapper">

                    <div class="cell small-12 medium-4 grid-x homepage__contact-details">
                        <div class="cell small-1 medium-2 homepage__contact-details__left-div">
                            <p><i class="fas fa-map-marker-alt"></i></p>
                        </div>
                        <div class="cell small-11 medium-10 homepage__contact-details__right-div">
                            <p><a class="contact-details__anchor" href="https://www.google.nl/maps/place/Gooische+Auto+Mediair/@52.3021958,5.1486849,17z/data=!3m1!4b1!4m5!3m4!1s0x47c61398213618f1:0xcfc786d55ee1656f!8m2!3d52.3021925!4d5.1508736" target="_blank"> Energiestraat 25B <br/>
                            <u>14</u>11 AR, Naarden </a></p>
                        </div>
                    </div>

                    <div class="cell small-12 medium-4 grid-x homepage__contact-details">
                        <div class="cell small-1 medium-2 homepage__contact-details__left-div">
                            <p><i class="fas fa-phone"></i></p>
                        </div>
                        <div class="cell small-11 medium-10 homepage__contact-details__right-div">
                            <p> <a class="contact-details__anchor" target="_blank" href="tel:0356944646"><u>03</u>5 - 694 4646</a></p>
                        </div>      
                    </div>

                    <div class="cell small-12 medium-4 grid-x homepage__contact-details">
                        <div class="cell small-1 medium-2 homepage__contact-details__left-div">
                            <p><i class="far fa-envelope"></i></p>
                        </div>
                        <div class="cell small-11 medium-10 homepage__contact-details__right-div">
                            <p><a href="mailto:info@gambv.nl" target="_blank" class="contact-details__anchor"> <u>in</u>fo@gambv.nl</a></p>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </section>
@stop
