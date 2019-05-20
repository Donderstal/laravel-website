@isset($breadcrumb)
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    @foreach($breadcrumb as $link => $title)
        <li class="breadcrumb-item {{ $loop->last ? 'active' : null }}">
            @if(!empty($link))
                <a href="{{ $link }}">
            @endif

            {{ $title }}

            @if(!empty($link))
                </a>
            @endif
        </li>
    @endforeach
</ol>
@endisset