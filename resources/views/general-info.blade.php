<!-- 
    Template for 'Zoektocht', 'Financiering', 'Over ons', 'Contact' and 'Werkplaats' pages 
    They're pretty much the same except for their content
-->

@extends('layouts.master')

@section('content')
    <section>
        <div>
            <!-- Top image -->
            <div class="general-info__top-image">
                GENERAL INFO BABY!
            </div>
            <!-- Main paragraph -->
            <div class="general-info__main-paragraph">

            </div>

        <!-- if not over ons -->    
            <!-- First subparagraph -->
            <div class="general-info__first-paragraph">

            </div>
            <!-- Second subparagraph -->
            <div class="general-info__second-pararaph">

            </div>

            <!-- Contact form -->
            <div class="general-info_contact-form">

            </div>
        <!-- end if -->

        <!-- else if over ons -->
            <div class="general-info__top-image">

            </div>
        <!-- end if -->
        
        </div>
    </section>
@endsection