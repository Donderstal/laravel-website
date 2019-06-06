@extends('layouts.master')

@section('content')
    {{-- Search Result --}}
    <h1>Search Result</h1>
    <ul>
        @forelse($products as $product)
            <li>
                Brand: {{ $product->brand->title }}
                <br>
                Title: {{ $product->title }}
                <br>
                cover: {{ route('image.action', ['thumbnail', $product->cover->picture]) }}
                <br>
                Price: {{ $product->price }}
                <br>
                Mileage: {{ $product->mileage }}
                <br>
                Year: {{ $product->year }}
            </li>
        @empty
            <li>
                -- Products not found ! ---
            </li>
        @endforelse
    </ul>

    {{-- Paginate --}}
    {{ $products->links() }}
@endsection