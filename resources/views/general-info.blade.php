<!--
    Template for 'Zoektocht', 'Financiering', and 'Werkplaats' pages
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
                <p>{{ $text1 }}</p>
            </div>

            <div class="cell small-12 medium-9 large-6 general-info__paragraph">
                <h2> OVER {{ strtoupper($title) }} </h2>
                <p> {{ $text2 }} </p>
            </div>
            <!-- Second subparagraph -->
            <div class="cell small-12 medium-9 large-6 general-info__paragraph">
                <h2> OVER {{ strtoupper($title) }} </h2>
                <p> {{ $text3 }} </p>
            </div>

            @include('partials.contact-form')
        </div>
    </section>
@endsection
