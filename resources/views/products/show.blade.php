@extends('layouts.master')

@section('content')

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

    {{-- Product Cover--}}
    <p>{{ route('image.action', ['cover', $product->cover->picture]) }}</p>

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

    {{-- Specification --}}
    <ul>
        @foreach($product->specification as $specification)
            <li>{{ $specification->title }} : {{ $specification->value }}</li>
        @endforeach
    </ul>

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

    {{-- Services --}}
    <ul>
        @foreach($product->services as $services)
            <li>{{ $services->title }} : {{ $services->value }}</li>
        @endforeach
    </ul>

    {{-- Product Status --}}
    <p>{{ $product->status == 'available' ? 'Available' : 'Sold' }}</p>

    {{-- Product Note --}}
    <p>{{ $product->note }}</p>

@endsection