@extends('layouts.master')

@section('content')
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="content">
            <div class="title m-b-md">
                Laravel boilerplate
                <br>
                <span class="sub-title">A Bigger Circle</span>
            </div>

            @include('partials.product-template')

            <div class="links">
                <a href="https://www.abiggercircle.com/">ABiggerCircle</a>
                <a href="https://github.com/abiggercircle/abc-laravel-boilerplate">Github Repository</a>
                <a href="https://laravel.com/docs">Docs</a>
            </div>
        </div>
    </div>
@stop