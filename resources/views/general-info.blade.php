<!-- 
    Template for 'Zoektocht', 'Financiering', 'Over ons', 'Contact' and 'Werkplaats' pages 
    They're pretty much the same except for their content
-->

@extends('layouts.master')

@section('content')
    <section class="general-info">
        <div class="grid-x">
            <!-- Top image -->
            <div class="cell small-12 medium-10 medium-offset-2 general-info__top-image">
                <img src="{{ asset('img/admin/city-photo.jpg') }}">
            </div>
            <!-- Main paragraph -->
            <div class="cell small-12 medium-10 general-info__main-paragraph">
                <h1>{{ strtoupper($title) }}</h1>
                <p>{{ $text1 }}</p>
            </div>

        <!-- if not over ons -->    
            <!-- First subparagraph -->
            <div class="cell small-12 medium-10 general-info__paragraph">
                <h2> OVER {{ strtoupper($title) }} </h2>
                <p> {{ $text2 }} </p>
            </div>
            <!-- Second subparagraph -->
            <div class="cell small-12 medium-10 general-info__paragraph">
                <h2> OVER {{ strtoupper($title) }} </h2>
                <p> {{ $text3 }} </p>
            </div>

            <!-- Contact form -->
            <div class="general-info__contact-form">
                <h1>CONTACTFORMULIER</h1>
                <form class="grid-x general-info__form">
                    <div class="cell small-12 medium-6">
                        <label for="first-name">Voornaam:</label>
                        <input type="text" id="first-name" name="first-name" placeholder='Voornaam'>
                    </div>

                    <div class="cell small-12 medium-6">
                        <label for="last-name">Achternaam:</label>
                        <input type="text" id="last-name" name="last-name" placeholder="Achternaam">
                    </div>
                    
                    <div class="cell small-12 medium-6">
                        <label for="email">E-mailadres:</label>
                        <input type="email" id="email" name="email" placeholder="E-mailadres">
                    </div>

                    <div class="cell small-12 medium-6">
                        <label for="telefoon">Telefoonnummer:</label>
                        <input type="tel" id="telefoon" name="telefoon" placeholder="Telefoonnummer">
                    </div>
                    
                    <div class="cell small-12 medium-6 end">
                        <label for="subject">Onderwerp:</label>
                        <input type="text" id="subject" name="subject" placeholder="Onderwerp">
                    </div>
                    
                    <div class="cell small-12">
                        <label for="opmerking">Vragen en opmerkingen:</label>
                        <textarea type="text" id="opmerking" name="opmerking" placeholder="Vragen en opmerkingen">
                        </textarea>
                    </div>

                    <div class="cell small-12">
                        <input type="checkbox" id="voorwaarden" name="voorwaarden">
                        <label for="voorwaarden">Ja, ik ga akkoord met de voorwaarden.</label>
                    </div>

                    <div class="cell small-12">
                        <button>NU VERZENDEN -></button>
                    </div>
                    
                </form>
            </div>
        <!-- end if -->

        <!-- else if over ons -->
            <div class="cell small-12 general-info__top-image">
                    
            </div>
        <!-- end if -->
        
        </div>
    </section>
@endsection