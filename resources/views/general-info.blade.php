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
                <img class="general-info__cover-photo" src="{{ asset('img/admin/city-photo.jpg') }}">
            </div>
            <!-- Main paragraph -->
            <div class="cell small-12 medium-9 general-info__main-paragraph">
                <h1>{{ strtoupper($title) }}</h1>
                <p>{{ $text1 }}</p>
            </div>

            @if ($title == 'Over ons')
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
            @endif

            @if ($title == 'Contact')
            <div class="grid-x cell small-12 general-info__contact">
                <div class="grid-x general-info__contact__inner">
                    <!--- Contact details --->
                    <div class="cell small-12 medium-6"> 
                        <div class="grid-x footer__contact-details">

                            <div class="cell small-1">
                                <p><i class="fas fa-map-marker-alt"></i></p>
                            </div>
                            <div class="cell small-11">
                                <p><a class="contact-details__anchor"> Energiestraat 25B <br/>
                                <u>1</u>411 AR, Naarden </a></p>
                            </div>
                            
                        </div>
                        <div class="grid-x footer__contact-details">

                            <div class="cell small-1">
                                <p><i class="fas fa-phone"></i></p>
                            </div>
                            <div class="cell small-11">
                                <p><a class="contact-details__anchor"> <u>0</u>35 - 694 4646</a></p>
                            </div>      

                        </div>

                        <div class="grid-x footer__contact-details">

                            <div class="cell small-1">
                                <p><i class="far fa-envelope"></i></p>
                            </div>
                            <div class="cell small-11">
                                <p><a class="contact-details__anchor"> <u>i</u>nfo@gambv.nl</a></p>
                            </div>
                            
                        </div>
                    </div>

                    <!--- Opening hours --->
                    <div class="cell small-12 medium-6"> 
                        <div class="footer__opening-hours"> 
                            <p class="footer__opening-hours__day"> Maandag t/m vrijdag </p>
                            <p class="footer__opening-hours__type"> Showroom & werkplaats </p>
                            <p class="footer__opening-hours__time"> 08:00 - 18:00 </p>
                        </div>
                        <div class="footer__opening-hours"> 
                            <p class="footer__opening-hours__day"> Zaterdag </p>
                            <p class="footer__opening-hours__type"> Showroom </p>
                            <p class="footer__opening-hours__time"> 10:00 - 17:00 </p>
                            <p class="footer__opening-hours__type"> Werkplaats </p>
                            <p class="footer__opening-hours__time"> Gesloten </p>
                        </div>
                        <div class="footer__opening-hours"> 
                            <p class="footer__opening-hours__day"> Zondag </p>
                            <p class="footer__opening-hours__type"> Showroom & werkplaats </p>
                            <p class="footer__opening-hours__time"> Gesloten </p>
                        </div>
                    </div>
                </div>
            </div>
            @endif


            @if ($title != 'Contact' && $title != 'Over ons')
                <div class="cell small-12 medium-9 large-6 general-info__paragraph">
                    <h2> OVER {{ strtoupper($title) }} </h2>
                    <p> {{ $text2 }} </p>
                </div>
                <!-- Second subparagraph -->
                <div class="cell small-12 medium-9 large-6 general-info__paragraph">
                    <h2> OVER {{ strtoupper($title) }} </h2>
                    <p> {{ $text3 }} </p>
                </div>
            @endif

            <!-- Contact form -->
            @if ($title != 'Over ons')
            <div class="cell small-12 general-info__contact-form">
                <h1>CONTACT FORMULIER</h1>
                <form method="POST" action="/emails/contact-form" class="grid-x general-info__form">
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
                        <textarea id="opmerking" name="opmerking" placeholder="Vragen en opmerkingen">
                        </textarea>
                    </div>

                    <div class="cell small-12">
                        <input type="checkbox" id="voorwaarden" name="voorwaarden">
                        <label class="checkbox-label" for="voorwaarden">Ja, ik ga akkoord met de voorwaarden.</label>
                    </div>

                    <div class="cell small-12">
                        <button class="general-info__form-button">VERZENDEN</button>
                    </div>
                    
                </form>
            </div>
            @endif

        </div>
    </section>
@endsection