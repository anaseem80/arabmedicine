<div class="navbar-dashboard-site">
    <div class="left-side-navbar">
        <div class="menu-navbar">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="logo"><img src="{{asset('images/1.png')}}" alt=""></div>
    </div>
    <div class="right-side-navbar">
        <span class="fw-bold">Arab Medicine</span>
        <div class="profile-user">
            <img src="{{asset('images/user.jpg')}}" alt="">
            <div class="dropdown-profile-user">
                <ul>
                    <li><a href="{{route('settings')}}">Settings</a></li>
                    {{--                    <li><a href="#">Logout</a></li>--}}
                    <li><a href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </ul>
            </div>
        </div>
    </div>
</div>
