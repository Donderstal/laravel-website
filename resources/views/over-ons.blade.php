<!--
    Template for 'Zoektocht', 'Financiering', 'Over ons', 'Contact' and 'Werkplaats' pages
    They're pretty much the same except for their content
-->

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
                <h1>{{ strtoupper($title) }}</h1>
                <p>Zoek je een nieuwe auto en het wow-gevoel van een goede aankoop? Bij de Gooische Auto Mediair vind je topklasse auto’s en service. Welk merk en type je ook zoekt, wij vinden de auto die het beste op je wensen aansluit. Nieuw of jong gebruikt: je hebt altijd een goede deal. De GAM staat voor exclusieve mobiliteit en de persoonlijke zorg die daarbij past. Wil je weten hoe je favoriete auto rijdt? Kom langs voor een proefrit.</p>
            </div>

            <div class="grid-x cell small-12 general-info__reviews">

                <div class="cell small-12">
                    <h1 class="main-header-font">WAT ANDEREN <br/> DENKEN OVER GAM</h1>
                </div>

                @foreach($reviews as $review)
                <div class="general-info__review-panel cell small-12 medium-10 large-6">
                    <h2 class="general-info__review-title"> {{ $review['title'] }} </h2>
                    <sub class="general-info__review-car">{{ $review['car'] }}</sub>
                    <p class="general-info__review-text"> {{ $review['text'] }} </p>
                </div>
                @endforeach

            </div>


            <div class="grid-x cell small-12 grid-margin-x grid-margin-y general-info__our-team">
                <div class="cell small-12">
                    <h1 class="main-header-font">ONS TEAM</h1>
                </div>

                @foreach($employees as $employee)
                <div class="general-info__employee cell small-6 medium-4 large-3">
                    <img class="general-info__employee-photo" src="{{ $employee['img'] }}">
                    <div class="general-info__employee-wrapper">
                        <p class="general-info__employee-name">{{ $employee['name'] }}</p>
                        <p class="general-info__employee-job-title"> {{ $employee['job-title'] }} </p>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection

