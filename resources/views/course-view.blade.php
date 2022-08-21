@extends('layouts.layout')
@section('page_css')
    <style>
        .search-form i {
            left: 15px;
            top: 11px;
        }
    </style>
@endsection
@section('content')
    @include('layouts.navbar')
    <div class="course-information py-5">
        <div class="container">
            <div class="d-flex flex-column text-start">
                <h1 class="font-family text-light">{{$course->name}}</h1>
                <p class="text-light font-family" dir="ltr">{{$users_count}} Students enrolled</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row course-main">
            <div class="col-lg-5 course-box-info py-5">
                <div class="card py-2" style="width: 300px;">
                    <div class="card-body">
                        <h1 class="card-title font-family fw-bold mb-4 text-success text-end" dir="ltr">
                            @if($course ->free)
                                <p>مجاني</p>
                            @else
                                {{$course ->price}} EGP
                            @endif
                        </h1>
                        <hr>
                        <p class="mt-3">يتضمن:</p>
                        <ul class="list-unstyled p-0">
                            <li>
                                <i class="far fa-file text-success"></i>
                                <span class="font-family">{{$lessons_count}}</span> حصة
                            </li>
                            <li>
                                <i class="far fa-compass text-danger"></i>
                                تحكم كامل اثناء المحاضرات
                            </li>
                            <li>
                                <i class="far fa-user text-primary"></i>
                                عضو <span class="font-family">{{$users_count}}</span> يوجد
                            </li>
                        </ul>
                        {{--                        {{$user ->status}}--}}

                        @if(!$access)

                            <a href="https://wa.me/+201024579388" target="_blank" class="">
                                <button class="btn btn-success mt-1 w-100 rounded-0">تواصل معنا لفتح الكورس <i
                                        class="fa fa-whatsapp"></i></button>
                            </a>
                        @else
                            <a href="{{route('course-page' , $course->id)}}" class="">
                                <button class="btn btn-danger w-100 rounded-0">الذهاب الي الكورس</button>
                            </a>
                        @endif


                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="container">
                    {{--                    <div class="what-you-get-box">--}}
                    {{--                        <div class="what-you-get-title">ماذا سأتعلم؟</div>--}}
                    {{--                    </div>--}}


                    {{--                    @foreach($sections as $section)--}}
                    {{--                        <hr>--}}
                    {{--                        <li class="text-decoration-none text-light p-2">--}}
                    {{--                            Section1: {{$section ->section_name}}--}}
                    {{--                            <ul class="mt-3">--}}
                    {{--                                @foreach($section->lesson as $lesson)--}}
                    {{--                                    <li data-name="{{$lesson->lesson_name}}" data-section="{{$section ->section_name}}"--}}
                    {{--                                        data-url="{{$lesson->url}}">{{$lesson->lesson_name}}</li>--}}
                    {{--                                @endforeach--}}
                    {{--                            </ul>--}}
                    {{--                        </li>--}}
                    {{--                        <hr>--}}
                    {{--                    @endforeach--}}


                    @foreach($sections as $section )
                        <div class="section-course-box">
                            <div class="what-you-get-box">
                                <div class="what-you-get-title font-family" dir="ltr"><i class="fas fa-screencast"></i>
                                    {{$section->section_name}}
                                </div>
                            </div>

                            <ul class="p-0 mt-3">
                                @foreach($section->lesson as $lesson)
                                    <li class="lecture mt-2 has-preview d-flex justify-content-between"
                                        style="padding-left: 20px;">
                                <span class="lecture-time font-family" dir="ltr">{{$lesson->duration}} <i
                                        class="fa fa-clock"></i></span>
                                        <span class="lecture-title font-family" dir="ltr"><i
                                                class="fa fa-graduation-cap"></i> {{$lesson->lesson_name}}</span>
                                    </li>
                                @endforeach
                            </ul>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
         tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/tTcWeU_moy4"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection

