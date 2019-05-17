@if ($type == 'submit')
    <button type="submit" class="btn btn-{{ $action }}">
        @isset($icon)
            <i class="{{ $icon }}"></i>
        @endisset
        {{ $text }}
    </button>
@elseif($type == 'delete')
    <button rel="delete" type="button" class="btn btn-outline-danger btn-sm delete-btn"
            data-route="{{ route($route[0], $route[1]) }}">
        <i class="far fa-trash-alt"></i>
        Delete
    </button>
@elseif($type == 'link')
    <a href="{{ $url }}" class="btn btn-{{ $action }} {{ $class }}">
        @isset($icon)
            <i class="{{ $icon }}"></i>
        @endisset
        {{ $text }}
    </a>
@endif
