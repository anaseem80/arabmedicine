<!doctype html>

@yield('variables')
<?php
if (!isset($dir)) {
    $dir = "rtl";
}
?>
<html lang="en" dir="{{$dir}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--    <title>@yield('title')</title>--}}

    <title>Arab Medicine</title>
    @include('layouts.header')
    @yield('page_css')

</head>
<body oncontextmenu="return false">

@yield('content')

@include('layouts.scripts')
@yield('page_js')
</body>
</html>
