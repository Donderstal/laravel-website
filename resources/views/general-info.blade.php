<!-- 
    Template for 'Zoektocht', 'Financiering', 'Over ons', 'Contact' and 'Werkplaats' pages 
    They're pretty much the same except for their content
-->

@extends('layouts.master')

@section('content')
    <section class="general-info">
        <div class="grid-x">
            <!-- Top image -->
            <div class="cell small-12 general-info__top-image">

            </div>
            <!-- Main paragraph -->
            <div class="cell small-12 large-10 large-offset-2 general-info__main-paragraph">
                <h1>{{ $title }}</h1>
                <p>{{ $text1 }}</p>
            </div>

        <!-- if not over ons -->    
            <!-- First subparagraph -->
            <div class="cell small-12 large-10 end general-info__paragraph">
                <h2> Over {{ $title }} </h2>
                <p> {{ $text2 }} </p>
            </div>
            <!-- Second subparagraph -->
            <div class="cell small-12 large-10 large-offset-2 general-info__paragraph">
                <h2> Over {{ $title }} </h2>
                <p> {{ $text3 }} </p>
            </div>

            <!-- Contact form -->
            <div class="cell small-12 large-10 end general-info_contact-form">

            </div>
        <!-- end if -->

        <!-- else if over ons -->
            <div class="cell small-12 general-info__top-image">

            </div>
        <!-- end if -->
        
        </div>
    </section>
@endsection