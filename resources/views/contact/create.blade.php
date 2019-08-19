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
                <p>#1 Welcome to contact! Sed conubia sit parturient praesent condimentum ornare adipiscing ad a id tempor quisque blandit lacus est vulputate adipiscing facilisis metus est malesuada a parturient ullamcorper himenaeos. Justo sed integer suscipit sodales mauris accumsan vitae vestibulum a a penatibus eget vestibulum facilisis id. Parturient vestibulum malesuada condimentum suspendisse ut laoreet neque a hendrerit duis a sem a aptent aliquet potenti hac a parturient placerat diam nec a. Ad a amet.</p>
            </div>

            @include('partials.general-info')
            @include('partials.contact-form')
        </div>
    </section>
@endsection
