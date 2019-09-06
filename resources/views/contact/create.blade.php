@extends('layouts.master')

@section('content')
    <section class="general-info">
        <div class="grid-x">
            <!-- Top image -->
            <div class="cell small-12 medium-9 medium-offset-3 general-info__top-image">
                <img class="general-info__cover-photo" src="{{ mix('img/admin/city-photo.jpg') }}">
            </div>
            <!-- Main paragraph -->
            <div class="cell small-12 medium-9 general-info__main-paragraph">
                <h1>CONTACT</h1>
                <p>In de showroom van 1.500 m2 van de GAM vind je elk merk en model auto, nieuw en jong gebruikt. Ons grote aanbod aan luxe en exclusieve occasions van premium automerken is doorlopend in beweging. Deze exclusieve auto’s zijn altijd compleet uitgerust en technisch in perfecte staat. Schroom dus vooral niet om langs te komen of contact met ons op te nemen. Wij staan voor u klaar.</p>
            </div>

            @include('partials.general-info')
            @include('partials.contact-form')
        </div>
    </section>
@endsection
