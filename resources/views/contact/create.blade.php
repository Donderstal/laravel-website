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
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>

            @include('partials.general-info')
            @include('partials.contact-form')
        </div>
    </section>
@endsection
