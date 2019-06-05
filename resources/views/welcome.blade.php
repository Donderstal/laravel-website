@extends('layouts.master')

@section('content')
    <section>

        <div class="homepage__header-image">
            <img class="homepage__img" src="{{ asset('img/admin/city-photo.jpg') }}">
        </div>

        <div class="homepage__search-bar">
            <p>VIND JOUW MERK</p>
            <p>kies een merk</p>
            <button class="homepage__search-button">ZOEKEN</button>
        </div>
        
        <div class="homepage__featured grid-x">

            <div>
                <h2>UITGELICHT</h2>
            </div>

            <div>
                @include('products.card')
                @include('products.card')
                @include('products.card')
            </div>

            <button>Check dit aanbod broer -></button>

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

    </section>
@stop