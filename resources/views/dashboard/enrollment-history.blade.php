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
            <div class="page-details mt-3 bg-white fw-bold main-shadow p-4">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Photo</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Enrolled course</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $item)
                        <tr>
                            <th scope="row"><img src="{{asset($item->profile_photo_path??'images/user.jpg')}}"
                                                 width="40"
                                                 class="rounded-circle border"
                                                 height="40" alt=""></th>
                            <td style="font-size: 12px;">
                                <p>{{$item->firstname}} {{$item->lastname}}</p>
                                Email: {{$item->email}}
                            </td>
                            <td style="font-size: 12px;">{{$item->name}}</td>
                            <td>
                                <a href="{{route('delete-user',$item->cid)}}" class="delete_student"><i
                                        class="fa fa-trash  text-danger"></i></a>
                                <a href="{{route('edit-status' , $item->cid)}}"
                                   title="@if($item->status==1) Enroll is opened click to Close @else Enroll is closed click to Open @endif"><i @class([
        'fa',
        'fa-check text-success'=>$item->status==0,
        'fa-times text-warning'=>$item->status==1,

])></i></a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
