<div class="grid-y product-card ">

    <div class="cell small-7 product-card__image-wrapper">
        <img class="product-card__car-image" src="{{ route('image.action', ['cover', $product->cover->picture]) }}">
    </div>
    <div class="cell small-3 grid-x product-card__top-text-row">
        <div class="cell small-12 grid-x">
            <div class="cell small-6 product-card__car-name">{{ $product['title'] }} </div> 
            <div class="cell small-6 product-card__car-price"> {{ $product['price'] }} </div>
            <div class="cell small-12 product-card__car-model"> {{ $product['model']['title'] }} </div> 
        </div>
        <div class="product-card__decorative-line">
        </div>
    </div>

    
    
    <div class="cell small-2 grid-x product-card__bottom-text-row">
        <div class="cell small-4">
            <div class="product-card__kilometers-header">KM stand</div>
            <div class="product-card__kilometers"> {{ $product['mileage'] }} </div>
        </div>
        <div class="cell small-4">
            <div class="product-card__year-header">Bouwjaar</div>
            <div class="product-card__year"> {{ $product['year'] }} </div>
        </div>
        <div class="cell small-4 product-card__check-me-wrapper">
            <a class="product-card__check-me-out" href=""><u>BE</u>KIJKEN</a>
        </div>
    </div>

</div>