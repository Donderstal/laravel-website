    <div class="ons-aanbod__nav-buttons__wrapper" role="navigation">
        <div class="ons-aanbod__nav-buttons">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <button class="ons-aanbod__bottom-button disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <img class="button-arrow-left svg-injection" src="{{ mix('img/ui-icons/arrow.svg') }}" aria-hidden="true">
            </button>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                <button class="ons-aanbod__bottom-button">
                    <img class="button-arrow-left svg-injection" src="{{ mix('img/ui-icons/arrow.svg') }}">
                </button>
            </a>
        @endif

        </div>
        <div class="ons-aanbod__nav-buttons">

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <!-- <li class="page&#45;item disabled" aria&#45;disabled="true"><span class="page&#45;link">{{ $element }}</span></li> -->
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <button class="ons-aanbod__bottom-button--active" aria-current="page">{{ $page }}</button>
                    @else
                        <a class="page-link" href="{{ $url }}">
                            <button class="ons-aanbod__bottom-button" aria-current="page">{{ $page }}</button>
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        </div>

        <div class="ons-aanbod__nav-buttons">
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
            <button class="ons-aanbod__bottom-button"> <img class="button-arrow-right svg-injection" src="{{ mix('img/ui-icons/arrow.svg') }}">  </button>
            </a>
        @else
            <button class="ons-aanbod__bottom-button disabled" aria-disabled="true" aria-label="@lang('pagination.next')"> <img class="button-arrow-right svg-injection" src="{{ mix('img/ui-icons/arrow.svg') }}">  </button>
        @endif
        </div>
    </div>
