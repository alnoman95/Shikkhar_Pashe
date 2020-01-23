
  {{-- main menu start --}}
  <div class="menu-w color-scheme-light color-style-transparent menu-position-side menu-side-left menu-layout-compact sub-menu-style-over sub-menu-color-bright selected-menu-color-light menu-activated-on-hover menu-has-selected-link">
    <div class="logo-w">
      <a class="logo" href="index.html">
        <div class="logo-element"></div>
        <div class="logo-label">
          Sikkhar Pashe
        </div>
      </a>
    </div>
    <div class="logged-user-w avatar-inline">
      <div class="logged-user-i">
        <div class="avatar-w">
        <img alt="" src="{{asset('backend/img/user.png')}}">
        </div>
        <div class="logged-user-info-w">
          <div class="logged-user-name">
            {{Auth::user()->name}}
          </div>
          <div class="logged-user-role">
            {{Auth::user()->post}}
          </div>
        </div>
        <div class="logged-user-toggler-arrow">
          <div class="os-icon os-icon-chevron-down"></div>
        </div>
        <div class="logged-user-menu color-style-bright">
          <div class="logged-user-avatar-info">
            <div class="avatar-w">
            <img alt="" src="{{asset('backend/img/user.png')}}">
            </div>
            <div class="logged-user-info-w">
              <div class="logged-user-name">
                {{Auth::user()->name}}
              </div>
              <div class="logged-user-role">
               {{Auth::user()->post}}
              </div>
            </div>
          </div>
          <div class="bg-icon">
            <i class="os-icon os-icon-wallet-loaded"></i>
          </div>
          <ul>
            <!-- <li>
              <a href="apps_email.html"><i class="os-icon os-icon-mail-01"></i><span>Incoming Mail</span></a>
            </li> -->
            <!-- <li>
              <a href="users_profile_big.html"><i class="os-icon os-icon-user-male-circle2"></i><span>Profile Details</span></a>
            </li>
            
            <li>
              <a href="#"><i class="os-icon os-icon-others-43"></i><span>Notifications</span></a>
            </li> -->
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                  <i class="os-icon os-icon-signs-11"></i><span>Logout</span>
                </a>
                <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none">
                  @csrf
                </form>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <h1 class="menu-page-header">
      Page Header
    </h1>
    <ul class="main-menu">
      <li class="sub-header">
        <span>Layouts</span>
      </li>
      <li class="selected has-sub-menu">
      <a href="">
          <div class="icon-w">
            <div class="os-icon os-icon-layout"></div>
          </div>
          <span>Dashboard</span></a>
        <div class="sub-menu-w">
          <div class="sub-menu-header">
            Dashboard
          </div>
          <div class="sub-menu-icon">
            <i class="os-icon os-icon-layers"></i>
          </div>
          <div class="sub-menu-i">
            <ul class="sub-menu">
              <li>
                <a href="{{route('dashboard.index')}}">Admin Home</a>
              </li>
              <li>
                <a href="{{route('user.index')}}">User Home</a>
              </li>
            </ul>
          </div>
        </div>  
      </li>
      <li class=" has-sub-menu">
      <a href="">
          <div class="icon-w">
            <div class="os-icon os-icon-layers"></div>
          </div>
          <span>Home</span></a>
        <div class="sub-menu-w">
          <div class="sub-menu-header">
            Home
          </div>
          <div class="sub-menu-icon">
            <i class="os-icon os-icon-layers"></i>
          </div>
          <div class="sub-menu-i">
            <ul class="sub-menu">
              <li>
                <a href="{{route('slider.index')}}">Slider</a>
              </li>
              <li>
                <a href="{{route('charity.index')}}">Charity</a>
              </li>
              <li>
                <a href="{{route('causes.index')}}">Causes</a>
              </li>
              <li>
                <a href="{{route('volunteer.index')}}">Volunteer</a>
              </li>
              
              </ul><ul class="sub-menu">
              <li>
                <a href="{{route('events.index')}}">Events</a>
              </li>
              <li>
              <a href="{{route('story.index')}}">Story</a>
              </li>
              <li>
                <a href="{{route('allheading.index')}}">All Heading</a>
              </li>
              <li>
              <a href="{{route('footer.index')}}">Footer</a>
              </li>
            </ul> 
          </div>
        </div>
      </li>
      <li class="sub-header">
        <span>Options</span>
      </li>
      <li class=" has-sub-menu">
        <a href="">
          <div class="icon-w">
            <div class="os-icon os-icon-package"></div>
          </div>
          <span>About</span></a>
        <div class="sub-menu-w">
          <div class="sub-menu-header">
            About
          </div>
          <div class="sub-menu-icon">
            <i class="os-icon os-icon-package"></i>
          </div>
          <div class="sub-menu-i">
            <ul class="sub-menu">
              <li>
              <a href="{{route('about.index')}}">about list</a>
              </li>
            </ul>
          </div>
        </div>
      </li>
      <li class=" has-sub-menu">
      <a href="">
          <div class="icon-w">
            <div class="os-icon os-icon-file-text"></div>
          </div>
          <span>Causes</span></a>
        <div class="sub-menu-w">
          <div class="sub-menu-header">
            Causes
          </div>
          <div class="sub-menu-icon">
            <i class="os-icon os-icon-file-text"></i>
          </div>
          <div class="sub-menu-i">
            <ul class="sub-menu">
              <li>
                <a href="{{route('navcauses.index')}}">Causes List</a>
              </li>
              <li>
                <a href="{{route('causespost.index')}}">Causes Post</a>
              </li>
              <li>
                <a href="{{route('gallery.index')}}">Gallary Image</a>
              </li>
              
            </ul>
          </div>
        </div>
      </li>
      <li class=" has-sub-menu">
      <a href="">
          <div class="icon-w">
            <div class="os-icon os-icon-file-text"></div>
          </div>
          <span>Blog</span></a>
        <div class="sub-menu-w">
          <div class="sub-menu-header">
            Blog
          </div>
          <div class="sub-menu-icon">
            <i class="os-icon os-icon-file-text"></i>
          </div>
          <div class="sub-menu-i">
            <ul class="sub-menu">
              <li>
              <a href="{{route('userblog.index')}}">User Blog</a>
              </li>
            </ul>
          </div>
        </div>
      </li>
      <li class=" has-sub-menu">
      <a href="">
          <div class="icon-w">
            <div class="os-icon os-icon-life-buoy"></div>
          </div>
          <span>Nav Events</span></a>
        <div class="sub-menu-w">
          <div class="sub-menu-header">
            Nav Events
          </div>
          <div class="sub-menu-icon">
            <i class="os-icon os-icon-life-buoy"></i>
          </div>
          <div class="sub-menu-i">
            <ul class="sub-menu">
              <li>
                <a href="{{route('runevents.index')}}">Running Events</a>
              </li>
              <li>
                <a href="{{route('upcoming.index')}}">Upcoming Events</a>
              </li>
              <li>
                <a href="{{route('upcomingcontent.index')}}">Upcoming Content</a>
              </li>
            </ul>
          </div>
        </div>
      </li>
      <li class=" has-sub-menu">
      <a href="">
          <div class="icon-w">
            <div class="os-icon os-icon-mail-18"></div>
          </div>
          <span>Reply</span></a>
        <div class="sub-menu-w">
          <div class="sub-menu-header">
            Reply
          </div>
          <div class="sub-menu-icon">
            <i class="os-icon os-icon-mail-18"></i>
          </div>
          <div class="sub-menu-i">
            <ul class="sub-menu">
              <li>
                <a href="{{route('reply.index')}}">All Reply</a>
              </li>
              <li>
                <a href="{{route('subscribe.index')}}">All Subscribe</a>
              </li>
              <li>
                <a href="{{route('donte.index')}}">Donate List</a>
              </li>
            </ul>
          </div>
        </div>
      </li>
      <li class=" has-sub-menu">
      <a href="">
          <div class="icon-w">
            <div class="os-icon os-icon-users"></div>
          </div>
          <span>Users</span></a>
        <div class="sub-menu-w">
          <div class="sub-menu-header">
            Users
          </div>
          <div class="sub-menu-icon">
            <i class="os-icon os-icon-users"></i>
          </div>
          <div class="sub-menu-i">
            <ul class="sub-menu">
              <li>
              <a href="{{route('usershow.index')}}">All User</a>
              </li>
            </ul>
          </div>
        </div>
      </li>
    </ul>
    
  </div>
  {{-- main menu end --}}