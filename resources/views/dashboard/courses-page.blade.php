@extends('dashboard.layouts.layout')
@section('content-dashboard')
    @include('dashboard.layouts.navbar')
    <div class="dashboard-content-side">
        @include('dashboard.layouts.sidebar')
        <div class="dashboard-content-right-side">

            <div class="main-page-title bg-white fw-bold main-shadow p-4"><img
                    src="{{asset('images/SVG/view-apps.svg')}}"
                    width="18" height="20" alt=""> Courses
            </div>
            <div class="page-details mt-3 bg-white main-shadow p-4">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Course Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($courses as $course)
                        <tr>
                            <th scope="row">{{$course ->id}}</th>
                            <td>{{$course ->name}}</td>
                            <td>
                                @if($course ->free == true )
                                    Free
                                @else
                                    {{$course ->price}} EGP
                                @endif
                            </td>
                            <td>
                                <a href="{{url('admin/edit-course/'.$course ->id)}}"
                                   class="text-decoration-none text-danger"><i
                                        class="fa fa-edit"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
