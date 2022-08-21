@extends('layouts.layout')
@section('content')
    @include('layouts.navbar')

    <div class="dashboard-content-side">
        @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{Session::get('success')}}
            </div>
        @endif
        <div class="container mb-5">
            <h1 class="text-center my-5">تعديل بيانات الحساب</h1>
            <form action="{{route('update-info')}}" method="post" class="form-edit-info" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3 position-relative text-center">
                    <div class="profile-pic" style="position:relative;">
                        <label class="-label position-relative" for="file">
                            <span class="glyphicon glyphicon-camera"></span>
                            <span>تغيير الصورة</span>
                            <button type="button" class="btn btn-transparent"
                                style="position: absolute;top: 0;left: 5px;z-index: 99999;" title="حذف الصورة"
                                id="removeImageBtn"
                                data-type="{{$user->profile_photo_path?1:0}}"
                                data-empty="{{asset('images/user.jpg')}}"><i class="fa fa-trash text-danger"></i>
                            </button>
                        </label>
                        <input id="file" type="file" name="profile_photo_path" onchange="loadFile(event)"/>
                        <img src="{{asset($user->profile_photo_path??'images/user.jpg')}}" id="output"
                             width="200"/>
                    </div>
                </div>
                <div class="form-group mb-3 position-relative">
                    <label for="name">الاسم الاول</label>
                    <i class="fa fa-user position-absolute"></i>
                    <input type="text" class="form-control py-2" id="name" name="firstname" value="{{$user->firstname}}"
                           placeholder="الاسم الاول">
                    @error('firstname')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group mb-3 position-relative">
                    <label for="name2">الاسم الاوسط والاخير</label>
                    <i class="fa fa-user-check position-absolute"></i>
                    <input type="text" class="form-control py-2" id="name2" name="lastname" value="{{$user->lastname}}"
                           placeholder="الاسم الاوسط والاخير">
                    @error('lastname')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group mb-3 position-relative">
                    <label for="email">البريد الالكتروني</label>
                    <i class="fa fa-user-check position-absolute"></i>
                    <input type="email" class="form-control py-2 font-family" name="email" id="email"
                           value="{{$user->email}}"
                           placeholder="البريد الالكتروني">
                    @error('email')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group mb-3 position-relative">
                    <label for="password">كلمة السر</label>
                    <i class="fa fa-key position-absolute"></i>
                    <input type="password" class="form-control py-2" name="password" id="password" value=""
                           placeholder="كلمة السر">
                    @error('password')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group position-relative">
                    <label for="repassword">تأكيد كلمة السر</label>
                    <i class="fa fa-key position-absolute"></i>
                    <input type="password" class="form-control py-2" name="password_confirmation" id="repassword"
                           value=""
                           placeholder="تأكيد كلمة السر">
                    {{--                    @error('password')--}}
                    {{--                    <small class="form-text text-danger">{{$message}}</small>--}}
                    {{--                    @enderror--}}
                </div>
                <button class="btn btn-primary w-100 mt-3" type="submit">حفظ التغييرات</button>
            </form>
        </div>

    </div>

    <form id="removeImageForm" method="post" action="{{route('remove-image')}}">
        @csrf
    </form>
@endsection
@section('page_js')
    <script>
        $('#removeImageBtn').on('click', function () {
            var type = $(this).data('type');
            var empty = $(this).data('empty');
            if (type == 1) {
                $('#removeImageForm').submit()
            } else {
                $('#file').val('');
                $('#output').attr('src', empty);
            }

        })
    </script>
@endsection
