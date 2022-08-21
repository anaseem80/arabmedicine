@extends('layouts.layout')
@section('variables')
    <?php
    $dir = "ltr";
    ?>
@endsection
@section('page_css')
    <style>

        a.nav-link.active {
            color: #ffffff !important;
        }

        .slide-videos-list {
            font-family: Roboto, sans-serif;
            width: 250px;
            max-width: 250px;
            min-width: 250px;
            height: 100vh;
            background: #333 !important;
            top:0;
            color: #fff;
            transition: .5s;
            padding-top: 17px;
            z-index: 10000;
            left:-400px
        }
        .slide-videos-list.open{
            left:0
        }
        .slide-videos-list l {

        }

        .slide-videos-list li li {
            color: #fff;
            display: block;
            cursor: pointer;
            padding: 11px 17px;
            border-top: 1px solid #4d4d4d;
            transition: 0.3s;
            border-bottom: 1px solid #1a1a1a;
            margin-bottom: 7px;
        }

        .slide-videos-list li:hover {
            box-shadow: 0 0 15px 3px #222 inset;
        }

        .slide-videos-list li.active {
            box-shadow: 0 0 15px 3px #222 inset;
        }

        .navbar {
            background: #333 !important;
        }

        .video-section video {
            width: 100%;
        }

        .ms-auto {
            margin-right: auto !important;
            margin-left: unset !important;

        }

        .video-section {
            position: relative;
        }

        p#name {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 999;
            -webkit-text-stroke: 0.8px #fff !important;
            font-size: 40px;
            font-weight: 900;
            opacity: 0.5;
            height: 60px;
        }
        .hidden-logo {
            position: absolute;
            bottom: -22px;
            background: #000;
            transform: translate(-50%, -50%);
            z-index: 999;
            -webkit-text-stroke: 0.8px #fff !important;
            font-size: 5px;
            font-weight: 900;
            opacity: 1;
            height: 38px;
            width: 27px;
            overflow: hidden;
            right: 7px;
            width: 91px;
        }
        .hidden-logo {
            position: absolute;
            bottom: -18px;
            background: #000;
            transform: translate(-50%, -50%);
            z-index: 999;
            -webkit-text-stroke: 0.8px #fff !important;
            font-size: 5px;
            font-weight: 900;
            opacity: 1;
            height: 30px;
            overflow: hidden;
            right: 12px;
            width: 83px;
            color: #000 !important;
        }
        .hidden-title {
            position: absolute;
            top: 110px;
            background: #000;
            z-index: 999;
            -webkit-text-stroke: 0.8px #fff !important;
            font-size: 5px;
            font-weight: 900;
            opacity: 1;
            height: 70px;
            overflow: hidden;
            right: 0;
            width: 100%;
            color: #000 !important;
        }
        .close-slide{
            cursor: pointer;
        }
        iframe{
            width: 100% !important;
            height: 100vh !important;
        }
    </style>
@endsection
@section('content')
    @include('layouts.navbar')

    <div class="d-flex" id="userTitle" data-email="{{\Illuminate\Support\Facades\Auth::user()->email}}">
        <div class="slide-videos-list shadow-lg position-absolute bg-dark">
            <i class="fa fa-times text-light ms-3 close-slide"></i>
            <ul class="list-unstyled p-0" style="background:#333 !important">
                @foreach($sections as $section)
                    <hr>
                    <li class="text-decoration-none text-light p-2">
                        Section {{ $loop->index }}: {{$section ->section_name}}
                        <ul class="mt-3">
                            @foreach($section->lesson as $lesson)
                                <li data-name="{{$lesson->lesson_name}}" data-section="{{$section ->section_name}}"
                                    data-url="{{$lesson->url}}">{{$lesson->lesson_name}}</li>
                            @endforeach
                        </ul>
                    </li>
                    <hr>
                @endforeach

            </ul>
        </div>
        <div class="video-section w-100">
            <button class="btn btn-primary m-3 open-slide">Open Courses List</button>
            <h2 id="title"></h2>
            <p class="hidden-logo">.</p>
            <p class="hidden-title">.</p>
            <p id="name">

            </p>
            {{--            <iframe class="video-player" frameborder="0"--}}
            {{--                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"--}}
            {{--                    width="100%" height="600" frameBorder="2" allow="encrypted-media">--}}


            {{--            </iframe>--}}
            <iframe class="video-player"
                    src=""
                    style="border:0;height:360px;width:640px;max-width:100%"
                    allow="autoplay"></iframe>
        </div>
    </div>
@endsection
@section('page_js')
    <script src="{{asset('js/dashboard/course-page.js')}}"></script>
@endsection


