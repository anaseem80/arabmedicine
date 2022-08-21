@extends('dashboard.layouts.layout')
@section('content-dashboard')
    @include('dashboard.layouts.navbar')
    <div class="dashboard-content-side">
        @include('dashboard.layouts.sidebar')
        <div class="dashboard-content-right-side">

            <div class="main-page-title bg-white fw-bold main-shadow p-4"><img
                    src="{{asset('images/SVG/view-apps.svg')}}"
                    width="18" height="20" alt=""> Dashboard
            </div>
            <div class="page-details mt-3">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="bg-white main-shadow text-center p-4">
                            <img src="{{asset('images/SVG/archive.svg')}}" width="30" height="25" alt="">
                            <p class="fw-bold fs-4 text-dark my-2">{{$courses}}</p>
                            <p class="fw-bold" style="font-size: 13px;">Number of Courses</p>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="bg-white main-shadow text-center p-4">
                            <img src="{{asset('images/SVG/camcorder.svg')}}" width="30" height="25" alt="">
                            <p class="fw-bold fs-4 text-dark my-2">{{$lessons}}</p>
                            <p class="fw-bold" style="font-size: 13px;">Number of Lessons</p>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="bg-white main-shadow text-center p-4">
                            <img src="{{asset('images/SVG/network-1.svg')}}" width="30" height="25" alt="">
                            <p class="fw-bold fs-4 text-dark my-2">{{$enroll}}</p>
                            <p class="fw-bold" style="font-size: 13px;">Number of enrollment</p>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="bg-white main-shadow text-center p-4">
                            <img src="{{asset('images/SVG/user-group.svg')}}" width="30" height="25" alt="">
                            <p class="fw-bold fs-4 text-dark my-2">{{$users}}</p>
                            <p class="fw-bold" style="font-size: 13px;">Number of Students</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
