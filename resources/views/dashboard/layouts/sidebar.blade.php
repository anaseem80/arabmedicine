<div class="side">
    <div class="side-bar rounded px-2">
        <div class="logo"><img src="{{asset('images/اللوجو (2).png')}}" alt=""></div>
        <div class="user-admin text-center mt-3 mb-3">
            <div class="bg-dark rounded-circle d-inline-block"><img src="{{asset('images/user.jpg')}}" width="40"
                                                                    height="40"
                                                                    alt=""></div>
            <p class="fw-bold mt-2 text-dark">Arab Medicine Team</p>
        </div>
        <ul>
            <a href="{{route('admin.dashboard')}}">
                <li><img src="{{asset('images/SVG/view-apps.svg')}}" width="12" height="20" alt="">
                    <span>Dashboard</span>
                </li>
            </a>
            <li class="direct"><img src="{{asset('images/SVG/archive.svg')}}" width="12" height="20" alt="">
                <span>Mange Courses</span>
                <p class="chevron"><i class="fa fa-chevron-down"></i></p>
                <ul>
                    <a href="{{route('courses-page')}}">
                        <li>Mange Courses</li>
                    </a>
                    <a href="{{route('add-course')}}">
                        <li>Add new course</li>
                    </a>
                </ul>
            </li>
            <li class="direct"><img src="{{asset('images/SVG/network-3.svg')}}" width="12" height="20" alt="">
                <span>Enrollment</span>
                <p class="chevron"><i class="fa fa-chevron-down"></i></p>
                <ul>
                    <a href="{{route('enrollment-history')}}">
                        <li>Enrollment history</li>
                    </a>
                    <a href="{{route('add-student')}}">
                        <li>Enroll a student</li>
                    </a>
                </ul>
            </li>
            <a href="{{route('settings')}}">
                <li><img src="{{asset('images/SVG/user.svg')}}" width="12" height="20" alt=""> <span>Settings</span>
                </li>
            </a>
        </ul>
    </div>
    <div class="shadow"></div>
</div>
