<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                <li class="nav-item"><span><i class="fa fa-graduation-cap"></i></span><a class="nav-link active d-inline-block" aria-current="page"
                                        href="{{route('home')}}">الكورسات</a>
                </li>
                <li class="nav-item"><span><i class="fa fa-dashboard"></i></span><a class="nav-link active d-inline-block" aria-current="page"
                                        href="{{route('home')}}?myCourses=true">كورساتي
                        الخاصة</a></li>
            </ul>
        </div>
        <!-- If user is admin -->
        @if(App\Http\Controllers\AdminController::isAdmin())
            <a class="navbar-brand" href="{{route('admin.dashboard')}}">
                <button class="btn btn-success rounded-0">لوحة التحكم</button>
            </a>
    @endif
    <!-- If user is admin -->
        <a class="navbar-brand" href="{{route('home')}}">
            <img src="{{asset('images/1.png')}}" height="25" width="100" alt="">
        </a>
        <div class="User-area me-2">
            <div class="User-avtar">
                <img src="{{asset(auth()->user()->profile_photo_path??'images/user.jpg')}}" width="200" class="border"/>

            </div>
            <ul class="User-Dropdown">
                <li><a href="{{route('settings')}}">الإعدادات</a></li>
                <li><a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">الخروج</a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </ul>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>
