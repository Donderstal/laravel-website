<!doctype html>
<html lang="en" dir="ltr">
<head>
    @include('admin.layouts.head')
</head>

<body class="app header-fixed sidebar-fixed sidebar-lg-show">
@include('admin.layouts.header')
<div class="app-body">
    @include('admin.layouts.sidebar')
    <main class="main">
        @include('admin.layouts.breadcrumb')
        <div class="container-fluid">
            @yield('content')
        </div>
    </main>
</div>

@include('admin.layouts.footer')
@include('admin.layouts.modal')

<script src="{{ mix('js/admin.js') }}"></script>
<script>
    @stack('scripts')
    {!!  show_flash_message()  !!}
    $(document).ready(function () {
        @stack('scripts-ready')
    });
</script>
</body>
</html>