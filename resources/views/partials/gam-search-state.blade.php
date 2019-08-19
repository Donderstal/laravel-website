@push('scripts')
    @if (isset($gamSearchState))
        window.gamSearchState = {!! json_encode($gamSearchState) !!};
    @else
        window.gamSearchState = {
            pathParams: {},
            queryParams: {}
        };
    @endif

    @if (isset($gamSearchState) && empty($gamSearchState['queryParams']))
        // Becase the params function will not work if the queryParams is and array
        window.gamSearchState.queryParams = {};
    @endif
@endpush
