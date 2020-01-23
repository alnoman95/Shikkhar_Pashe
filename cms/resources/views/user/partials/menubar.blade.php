<!-- NAVGATION -->
<nav id="main-navbar">
    <div class="container">
        <div class="navbar-header">
            <!-- Logo -->
            <div class="navbar-brand">
                <a class="logo" href="{{route('user.index')}}"><img src="{{asset('user/img/logo1.png')}}" alt="logo"></a>
            </div>
            <!-- Logo -->

            <!-- Mobile toggle -->
            <button class="navbar-toggle-btn">
                <i class="fa fa-bars"></i>
            </button>
            <!-- Mobile toggle -->
        </div>


        <!-- Nav menu -->
        <ul class="navbar-menu nav navbar-nav navbar-right">
            <li><a href="{{route('user.index')}}">Home</a></li>
            <li><a href="{{route('abouts.index')}}">About</a></li>

            <li class="has-dropdown"><a href="{{route('navcaus.index')}}">Causes</a>
                <ul class="dropdown">
                    <li><a href="{{route('navcaus.index')}}">Our Causes</a></li>
                    <li><a href="{{route('causesgallary.index')}}">Gallery</a></li>

                </ul>
            </li>
            <li class="has-dropdown"><a href="{{route('running.index')}}">Events</a>
                <ul class="dropdown">
                    <li><a href="{{route('running.index')}}">Running Event</a></li>
                    <li><a href="{{route('upcomingevents.index')}}">Upcoming Event</a></li>
                </ul>
            </li>
            <li class="has-dropdown"><a href="student-blog.html">Blog</a>
                <ul class="dropdown">
                    <li><a href="{{route('studentblog.index')}}">Student Blog</a></li>
                    <li><a href="{{route('userblogs.index')}}">User Blog</a></li>
                </ul>
            </li>
            <li><a href="{{route('contact.index')}}">Contact</a></li>
            @guest
            <li>              
                <a href="{{route('login')}}">Log In/Registration</a>
            </li>
            @else
            <li>
                <li class="has-dropdown"><a href="student-blog.html">Hi, {{Auth::user()->name}}</a>
                <ul class="dropdown">
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="os-icon os-icon-signs-11"></i><span>Logout</span>
                </a></li>    
                </ul>
                <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none">
                  @csrf
                </form>
            </li>
            @endguest
        </ul>
        <!-- Nav menu -->
    </div>
</nav>
<!-- /NAVGATION -->