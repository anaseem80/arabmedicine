@extends('dashboard.layouts.layout')
@section('content-dashboard')
    @include('dashboard.layouts.navbar')
    <div class="dashboard-content-side">
        @include('dashboard.layouts.sidebar')
        <div class="dashboard-content-right-side">

            <div class="main-page-title bg-white fw-bold main-shadow p-4"><img
                    src="{{asset('images/SVG/view-apps.svg')}}"
                    width="18" height="20" alt=""> Add new
                course
            </div>
            <div class="page-details mt-3">

                @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                    </div>
                @endif
                <form action="{{route('create-course')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="bg-white main-shadow py-4 px-5 border">
                        <h4 class="mb-4">Course Info</h4>
                        <div class="form-group">
                            <label for="cortitle">Course title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" id="cortitle"
                                   placeholder="Enter Course Title" value="{{old('name')}}" required>
                            @error('name')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group mt-4">
                            <label for="description">Description <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="description" id="description" cols="30"
<<<<<<< HEAD
                                      rows="10" required></textarea>
=======
                                      rows="10" ></textarea>
>>>>>>> b676c259ee7aeaa0390436da26f03122a108d88e
                            @error('description')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="bg-white main-shadow py-4 px-5 border my-4">
                        <h4 class="mb-4">Course Price</h4>
                        <div class="form-group">
                            <label for="price">Price <span class="text-danger">*</span></label>
                            <input type="text" name="price" class="form-control numeric" id="price"
                                   placeholder="Enter Course Price">
                            <label for="freecou" class="mt-3">free <span class="text-danger">*</span></label>
                            <input type="checkbox" name="free"  id="freecou" >
                            @error('price')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="bg-white main-shadow py-4 px-5 border my-4">
                        <h4 class="mb-4">Course thumbnail</h4>
                        <div class="form-group">
                            <label for="thumbnail">thumbnail <span class="text-danger">*</span></label>
                            <input type="file" name="image" class="form-control" id="thumbnail"
                                   placeholder="Enter Course Price">
                            @error('image')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <button class="btn btn-primary w-100 mt-2 mb-4 " type="submit">Add Course</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('page_js')
    <script src="{{asset('js/dashboard/course.js')}}"></script>
@endsection
