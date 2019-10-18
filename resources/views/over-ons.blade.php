@extends('layouts.master')

@section('content')
    <section class="general-info">
        <div class="grid-x">
            <!-- Top image -->
            <div class="cell small-12 medium-9 medium-offset-3 general-info__top-image">
                <img class="general-info__cover-photo" src="{{ mix('img/city-street.jpg') }}">
            </div>
            <!-- Main paragraph -->
            <div class="cell small-12 medium-9 general-info__main-paragraph">
                <h1>{{ strtoupper($title) }}</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>

            <div class="grid-x cell small-12 general-info__reviews">

                <div class="cell small-12">
                    <h1 class="main-header-font">Lorem ipsum <br/> id est laborum.</h1>
                </div>

                @foreach($reviews as $review)
                <div class="general-info__review-panel cell small-12 medium-10 large-6">
                    <h2 class="general-info__review-title"> {{ $review['title'] }} </h2>
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
                        <p class="general-info__employee-contact-details"> 
                            <a class="general-info__employee-contact-details--anchor"
                            href="tel:{!! $employee['tel'] !!}">
                            {{ $employee['tel'] }} 
                            </a>
                        </p>
                        <p class="general-info__employee-contact-details"> 
                            <a class="general-info__employee-contact-details--anchor" 
                            href="mailto:{!! $employee['mail'] !!}">
                            {{ $employee['mail'] }} 
                            </a>
                        </p>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection

