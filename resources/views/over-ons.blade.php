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
                <p>#1 Welcome to over ons! Sed conubia sit parturient praesent condimentum ornare adipiscing ad a id tempor quisque blandit lacus est vulputate adipiscing facilisis metus est malesuada a parturient ullamcorper himenaeos. Justo sed integer suscipit sodales mauris accumsan vitae vestibulum a a penatibus eget vestibulum facilisis id. Parturient vestibulum malesuada condimentum suspendisse ut laoreet neque a hendrerit duis a sem a aptent aliquet potenti hac a parturient placerat diam nec a. Ad a amet.</p>
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

