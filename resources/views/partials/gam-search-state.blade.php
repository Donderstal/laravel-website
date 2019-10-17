@push('scripts')
    @if (isset($companySearchState))
        window.companySearchState = {!! json_encode($companySearchState) !!};
    @else
        window.companySearchState = {
            pathParams: {},
            queryParams: {}
        };
    @endif

    @if (isset($companySearchState) && empty($companySearchState['queryParams']))
        // Becase the params function will not work if the queryParams is and array
        window.companySearchState.queryParams = {};
    @endif
@endpush
