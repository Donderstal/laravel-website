@foreach($navigation as $nav)
    <li class="nav-item {{ count($nav['children']) ? 'nav-dropdown' : null }}">
        <a class="nav-link {{ count($nav['children']) ? 'nav-dropdown-toggle' : null}}" href="{{ count($nav['children']) ? '#' : $nav['link'] }}">
            @if ($nav['icon'])
                <i class="{{ $nav['icon'] }}"></i>
            @endif
            {{ $nav['title'] }}
        </a>
        @if(count($nav['children']))
            <ul class="nav-dropdown-items">
                @include('admin.layouts.navigation.create_items', ['navigation' => $nav['children']])
            </ul>
        @endif
    </li>
@endforeach