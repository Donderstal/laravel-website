
@extends('layouts.master')

@section('content')
    <section class="ons-aanbod">
        <div class="grid-container">
            <div class="grid-x">
                @foreach($products as $indexKey => $product)
                    @include('products.card')
                @endforeach
            </div> 
        </div>
    <section>
@endsection