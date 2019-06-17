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

                <div class="product-page__main-info__subsection">
                    <h1 class="product-page__main-header-font">{{ $product->brand->title }}</h1>

                    <p class="product-page__main-subtitle-font">{{ $product->title }}</p>
                </div>

                <div class="product-page__main-info__subsection">
                    <p class="product-page__price-font">&euro; {{ number_format($product->price) }}</p>

                    <p class="product-page__VAT-font">BTW niet verrekenbaar</p>
                </div>

                <div class="grid-x product-page__main-info__subsection">

                    <div class="cell small-12">
                        <h3 class="product-page__main-subtitle-font">Interesse?</h3>                        
                    </div>

                    <div class="cell small-6">
                        <div class="product-page__contact-small-font">Bellen </div>
                        <div>
                            <a class="product-page__contact-large-font" href="tel:+31356944646"><u>0</u>35 694 4646</a> 
                        </div>
                    </div>

                    <div class="cell small-4 end">
                        <div class="product-page__contact-small-font">Delen </div>
                        <div class="product-page__social-icons-wrapper"> 
                            <img class="svg-injection" src="{{ asset('img/ui-icons/facebook.svg') }}">
                            <img class="svg-injection" src="{{ asset('img/ui-icons/link.svg') }}"> 
                            <img class="svg-injection" src="{{ asset('img/ui-icons/mail.svg') }}">
                        </div>
                    </div>

                    <div class="cell small-12 product-page__decorative-line">
                    </div>

                    <div class="cell small-12 medium-6">
                        <input class="product-page__input" placeholder="Naam">
                    </div>

                    <div class="cell small-12 medium-6">
                        <input class="product-page__input" placeholder="Telefoon nr.">
                    </div>

                    <div class="cell small-12 product-page__contact-large-font">
                        <u>Bel</u> mij terug
                    </div>
                    
                </div>

                <div class="grid-x product-page__main-info__subsection">
                    <div class="cell small-6">
                        <p class="product-page__detail-title-darkbg-font">Km stand</p>
                        <p class="product-page__detail-darkbg-font">{{ $product->mileage }} km</p>
                    </div>  

                    <div class="cell small-6">
                        <p class="product-page__detail-title-darkbg-font">Brandstof</p>
                        <p class="product-page__detail-darkbg-font">{{ config('site.products.fuel_types')[$product->fuel] }}</p>
                    </div>  

                    <div class="cell small-6">
                        <p class="product-page__detail-title-darkbg-font">Kleur</p>
                        <p class="product-page__detail-darkbg-font">{{ $product->color->title }}</p>
                    </div>  

                    <div class="cell small-6">
                        <p class="product-page__detail-title-darkbg-font">Transmissie</p>
                        <p class="product-page__detail-darkbg-font">{{ config('site.products.transmission_types')[$product->transmission] }}</p>
                    </div>  
                </div>

                <div class="product-page__main-info__subsection">
                    <p class="product-page__all-specs-font"><img class="product-page__all-specs-arrow svg-injection" src="{{ asset('img/ui-icons/arrow.svg') }}"> <u>BE</u>KIJK ALLE SPECIFICATIES</p>
                </div>

                {{-- Product Model --}}
                <!-- <p>{{ $product->model->title }}</p>

                {{-- Product Color --}}
                <p>{{ $product->color->title }}</p>                
                {{-- Product Price --}}
                

                {{-- Product Millage --}}
                <p>{{ $product->mileage }}</p>

                {{-- Product Year --}}
                <p>{{ $product->year }}</p>

                {{-- Product Transmission --}}
                <p>{{ config('site.products.transmission_types')[$product->transmission] }}</p>

                {{-- Product Transmission --}}
                <p>{{ config('site.products.fuel_types')[$product->fuel] }}</p> -->
            </div>
        </div>

        <div class="cell small-12 product-page__specificaties">
            <div class="grid-x product-page__specificaties__inner">
                <div class="cell small-12 product-page__specificaties__header"> 
                    <h1 class="product-page__main-header-dark-font">
                        SPECIFICATIES
                    </h1>
                </div>         
                @foreach($product->specification as $specification)
                <div class="cell small-6 large-3 product-page__specificaties__subsection"> 
                    <p class="product-page__detail-title-lightbg-font">
                        {{ $specification->title }}
                    </p>
                    <p class="product-page__detail-lightbg-font">
                        {{ $specification->value }}
                    </p>
                </div>    
                @endforeach
            </div>
        </div>

        <div class="cell small-12 product-page__opties">
            <div class="grid-x product-page__opties__inner">
                <div class="cell small-12 product-page__opties__header"> 
                    <h1 class="product-page__main-header-font">
                        OPTIES
                    </h1>
                </div>   
            {{-- Options --}}
                @foreach($product->options as $options)
                <div class="grid-x cell small-12 product-page__option-wrapper">
                    <div class="cell small-12">
                        <p class="product-page__main-subtitle-font--white">
                            {{ $options->title }}
                        </p>
                    </div>
                    <div class="grid-x cell small-12">
                            @foreach($options->items as $item)
                            <div class="cell small-12 medium-6 large-4">
                                <p class="product-page__options-font">- {{ $item->title }}</p>
                            </div>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endforeach
                <div class="product-page__main-info__subsection">
                    <p class="product-page__all-specs-font"><img class="product-page__all-specs-arrow svg-injection" src="{{ asset('img/ui-icons/plus.svg') }}"> <u>ME</u>ER WEERGEVEN</p>
                </div>
            </div>
        </div>

        <div class="cell small-12 product-page__service">
            <div class="grid-x product-page__service-inner">
                <div class="cell small-12 product-page__service-subsection">
                    <p class="product-page__bottom-specs-title-font">SERVICE</p>
                </div>
                @foreach($product->services as $services)
                <div class="cell small-12 medium-6">
                    <p class="product-page__service-subtitle">{{ $services->title }}</p> 
                    <p class="product-page__service-desc">{{ $services->value }}</p>
                </div>
                @endforeach

            {{-- Product Status --}}
            <p>{{ $product->status == 'available' ? 'Available' : 'Sold' }}</p>

            {{-- Product Note --}}
            <p>{{ $product->note }}</p>
            </div>
        </div>

        <div class="cell small-12 product-page__decorative-line--bottom">
        </div>

        <div class="cell small-12 product-page__over-gam">
            At GAM, we love money and cars!
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