@extends('dashboard.layouts.layout')
@section('page_css')
    <style>
        /*.select2-results__option--selectable[aria-selected="true"]{*/
        /*    display:none !important;*/
        /*}*/
        .select2-results__option[aria-selected="true"] {
            display: none;
        }
    </style>
@endsection
@section('content-dashboard')
    @include('dashboard.layouts.navbar')
    <div class="dashboard-content-side">
        @include('dashboard.layouts.sidebar')
        <div class="dashboard-content-right-side">

            <div class="main-page-title bg-white fw-bold main-shadow p-4"><img src="../images/SVG/view-apps.svg"
                                                                               width="18" height="20" alt=""> Dashboard
            </div>
            <div class="page-details mt-3 bg-white fw-bold main-shadow p-4">
                @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {!! Session::get('success')!!}
                    </div>
                @endif
                <form action="{{route('enrollment')}}" method="post">
                    @csrf
                    <label for="SelExample">Select User</label>
                    <select name="users[]" id="SelExample" class="form-control px-3" multiple>

{{--                        <option value="0" selected disabled>Select students</option>--}}
                        @foreach($users as $user)
                            <option value="{{$user -> id}}">{{$user ->email .' - '. $user ->firstname . ' ' . $user ->lastname}}</option>
                        @endforeach
                    </select>
                    <select name="status" id="" class="form-select select-form mt-4">
                        <option value="" disabled selected>Status</option>
                        <option value="0">close</option>
                        <option value="1">open</option>
                    </select>


                    {{--                    <div class="bg-white main-shadow p-3 mt-4 border">--}}
                    {{--                        <button id="but_read" class="btn btn-primary mt-3 mb-3">Selected Value</button>--}}
                    {{--                        <div id="result"></div>--}}
                    {{--                    </div>--}}

                    <label for="selectcourse" class="mt-4">Select Course</label>
                    <select id="selectcourse" name="course_id" class="form-control px-3">
                        <option value="0" selected disabled>Select course</option>
                        @foreach($courses as $course)
                            <option value="{{$course->id}}">{{$course -> name}}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-success w-100 mt-3" type="submit">Enroll Student</button>
                </form>
            </div>
        </div>
    </div>
@endsection
