@extends('layouts.master')

@section('content')

<section class="product-page">

    <div class="grid-x">

        <div class="cell small-12 large-6 product-page__image-header">
            <img class="product-page__image-header__img" src="{{ route('image.action', ['cover', $product->cover->picture]) }}">
            <div class="product-page__image-header__button-wrapper">
                <button class="ons-aanbod__bottom-button"> <img class="button-arrow-left svg-injection" src="{{ asset('img/ui-icons/arrow.svg') }}"> </button>
                    x / xx
                <button class="ons-aanbod__bottom-button"> <img class="button-arrow-right svg-injection" src="{{ asset('img/ui-icons/arrow.svg') }}">  </button>
            </div>
        </div>

        <div class="cell small-12 large-6 product-page__main-info">
            <div class="product-page__main-info__inner">
                {{-- Product Title --}}
                <h1>{{ $product->title }}</h1>

                {{-- Product Brand --}}
                <p>{{ $product->brand->title }}</p>

                {{-- Product Model --}}
                <p>{{ $product->model->title }}</p>

                {{-- Product Color --}}
                <p>{{ $product->color->title }}</p>

                {{-- Product Price --}}
                <p>{{ number_format($product->price) }}</p>

                {{-- Product Millage --}}
                <p>{{ $product->mileage }}</p>

                {{-- Product Year --}}
                <p>{{ $product->year }}</p>

                {{-- Product Transmission --}}
                <p>{{ config('site.products.transmission_types')[$product->transmission] }}</p>

                {{-- Product Transmission --}}
                <p>{{ config('site.products.fuel_types')[$product->fuel] }}</p>
            </div>
        </div>

        <div class="cell small-12 product-page__specificaties">
            <div class="product-page__specificaties__inner">
                {{-- Specification --}}
                <ul>
                    @foreach($product->specification as $specification)
                        <li>{{ $specification->title }} : {{ $specification->value }}</li>
                    @endforeach
            </ul>
            </div>
        </div>

        <div class="cell small-12 product-page__opties">
            {{-- Options --}}
            <ul>
                @foreach($product->options as $options)
                    <li>{{ $options->title }}
                        <ul>
                            @foreach($options->items as $item)
                                <li>{{ $item->title }}</li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="cell small-12 product-page__extra-specificaties">
            {{-- Services --}}
            <ul>
                @foreach($product->services as $services)
                    <li>{{ $services->title }} : {{ $services->value }}</li>
                @endforeach
            </ul>

            brrruh

            {{-- Product Status --}}
            <p>{{ $product->status == 'available' ? 'Available' : 'Sold' }}</p>

            {{-- Product Note --}}
            <p>{{ $product->note }}</p>
        </div>

        <div class="cell small-12 product-page__over-gam">
            At GAM, we love money!
        </div>

        <div class="cell small-12 product-page__related-products">
            {{-- Related Products --}}
            <h1>Related Products</h1>
            <ul>
            @foreach($related_products as $related)
                <li>
                    Brand: {{ $related->brand->title }}
                    <br>
                    Title: {{ $related->title }}
                    <br>
                    cover: {{ route('image.action', ['thumbnail', $related->cover->picture]) }}
                    <br>
                    Price: {{ $related->price }}
                    <br>
                    Mileage: {{ $related->mileage }}
                    <br>
                    Year: {{ $related->year }}
                </li>
            @endforeach
            </ul>
        </div>

        {{-- Product Gallery--}}
        <ul>
            @foreach($product->gallery as $picture)
                @if ($picture->id != $product->cover_id)
                    <li>
                        Label: {{ $picture->label }}
                        <br>
                        Cover: {{ route('image.action', ['thumbnail', $picture->picture]) }}
                        <br>
                        Thumbnail: {{ route('image.action', ['thumbnail', $picture->picture]) }}
                    </li>
                @endif
            @endforeach
        </ul>

    <div>
</section>

@endsection