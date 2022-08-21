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
    @include('layouts.banner')
    <div class="container mt-5">
        <h3>{{$title}}</h3>
        <div class="row">
            @foreach($data as $item)
                <div class="col-lg-3 my-3">
                    <div class="card course-item-card m-auto" style="width: 230px;">
                        <a href="{{url('course-view/'.$item->id)}}" class="text-decoration-none text-dark">
                            <img src="{{asset('images/courses/'.$item->image)}}" class="card-img-top course-img"
                                 alt="...">
                            <div class="card-body py-3 border-top">
                                <h5 class="card-title font-family text-start mb-3" dir="ltr">{{$item ->name}}</h5>
                                <p class="font-family text-start mb-2"
                                   dir="ltr">{{\Str::words($item -> description , 15)}}</p>
                                <div class="d-flex justify-content-between mt-4">
                                    <p class="font-family text-end m-0 text-success" dir="ltr">
                                        <span class="fw-bold">
                                        @if($item ->free == true )
                                                <span>مجاني</span>
                                            @else
                                                {{$item ->price}} EGP
                                            @endif
                                        </span>
                                    </p>
                                    <span class="text-end font-family text-danger" dir="ltr"><i
                                            class="fa fa-graduation-cap"
                                            aria-hidden="true"></i>{{$item->users_count}}</span>

                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection

