<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{--    <title>@yield('title')</title>--}}
    <title>Arab Medicine</title>

    @include('dashboard.layouts.header')
    @yield('page_css')

</head>
<body>

@yield('content-dashboard')

@include('dashboard.layouts.scripts')
@yield('page_js')
</body>
</html>
