@extends('user.layouts.master')
@section('title','Home')
@section('user-content')
    <!-- HEADER -->
    <header id="home">
        
        <!-- HOME OWL -->
        <div id="home-owl" class="owl-carousel owl-theme">
            <!-- home item -->
            @foreach($slider as $key=>$item)
            <div class="home-item">
                <!-- section background -->
                <div class="section-bg" style="background-image: url({{asset('uploads/slider/'.$item->image)}});"></div>
                <!-- /section background -->

                <!-- home content -->
                <div class="home">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="home-content">
                                    <h1>{{$item->title}}</h1>
                                    <p class="lead">{{$item->info}}</p>
                                    @if($item->button == 'Donate Now')
                                    <a href="{{route('doner.index')}}" class="primary-button">{{ $item->button }}</a>
                                    @else
                                    <a href="{{route('login')}}" class="primary-button">{{ $item->button }}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /home content -->
            </div>
            @endforeach
            <!-- /home item -->
  
        </div>
        <!-- /HOME OWL -->
    </header>
    <!-- /HEADER -->
    <!-- ABOUT -->
    <div id="about" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- about content -->
                <div class="col-md-5">
                    <div class="section-title">
                        <h2 class="title">{{$charity->title}}</h2>
                        <p class="sub-title">{{$charity->sub_title}}
                        </p>
                    </div>
                    <div class="about-content">
                        <p>{{$charity->about}}</p>
                        <a href="{{route('abouts.index')}}" class="primary-button">Read More</a>
                    </div>
                </div>
                <!-- /about content -->

                <!-- about video -->
                <div class="col-md-offset-1 col-md-6">
                    <a href="{{route('causesgallary.index')}}" class="about-video">
                        <img src="{{asset('uploads/charity/'.$charity->image)}}" alt="">
                    </a>
                </div>
                <!-- /about video -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /ABOUT -->

    <!-- NUMBERS -->
    <div id="numbers" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- number -->
                <div class="col-md-3 col-sm-6">
                    <div class="number">
                        <i class="fa fa-smile-o"></i>
                        <h3>{{$donar}}</h3>
                        <span>Donors</span>
                    </div>
                </div>
                <!-- /number -->

                <!-- number -->
                <div class="col-md-3 col-sm-6">
                    <div class="number">
                        <i class="fa fa-heartbeat"></i>
                        <h3>{{$student}}</h3>
                        <span>Student</span>
                    </div>
                </div>
                <!-- /number -->

                <!-- number -->
                <div class="col-md-3 col-sm-6">
                    <div class="number">
                        <i class="fa fa-money"></i>
                        <h3>{{$donate}} $</h3>
                        <span>Donated</span>
                    </div>
                </div>
                <!-- /number -->

                <!-- number -->
                <div class="col-md-3 col-sm-6">
                    <div class="number">
                        <i class="fa fa-handshake-o"></i>
                        <h3>{{$volunteers}}</h3>
                        <span>Volunteers</span>
                    </div>
                </div>
                <!-- /number -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /NUMBERS -->

    <!-- CAUSESS -->
    <div id="causes" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-8 col-md-offset-2">
                    <div class="section-title text-center">
                        <h2 class="title">{{$allheading->causes_heading}}</h2>
                        <p class="sub-title">{{$allheading->causes_subheading}}</p>
                    </div>
                </div>
                <!-- section title -->
                @foreach($causes as $key=>$item)
                <!-- causes -->
                <div class="col-md-4">
                    <div class="causes">
                        <div class="causes-img">
                            <a href="{{route('navcaus.index')}}">
                                <img src="{{asset('uploads/causes/'.$item->image)}}" alt="">
                            </a>
                        </div>
                        <div class="causes-progress">
                            <div class="causes-progress-bar">
                                <div style="width: 87%;">
                                    <span>87%</span>
                                </div>
                            </div>
                            <div>
                                <span class="causes-raised">Raised: <strong>52.000$</strong></span>
                                <span class="causes-goal">Goal: <strong>{{$item->goal}}$</strong></span>
                            </div>
                        </div>
                        <div class="causes-content">
                            <h3><a href="single-cause.html">{{$item->title}}</a></h3>
                            <p>{{$item->sub_title}}</p>
                            <a href="{{route('doner.index')}}" class="primary-button causes-donate">Donate Now</a>
                        </div>
                    </div>
                </div>
                <!-- /causes -->
                @endforeach
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /CAUSESS -->

    <!-- CTA -->
    <div id="cta" class="section">
        <!-- background section -->
        <div class="section-bg volunteer" style="background-image: url({{asset('uploads/volunteer/'.$volunteer->image)}});"></div>
        <!-- /background section -->

        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- cta content -->
                <div class="col-md-offset-2 col-md-8">
                    <div class="cta-content text-center">
                        <h1>{{$volunteer->title}}</h1>
                        <p class="lead">{{$volunteer->sub_title}}</p>
                        <a href="{{route('register')}}" class="primary-button">Join Us Now!</a>
                    </div>
                </div>
                <!-- /cta content -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /CTA -->

    <!-- EVENTS -->
    <div id="events" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- section title -->
                <div class="col-md-8 col-md-offset-2">
                    <div class="section-title text-center">
                        <h2 class="title">{{$allheading->events_heading}}</h2>
                        <p class="sub-title">{{$allheading->events_subheading}}</p>
                    </div>
                </div>
                <!-- /section title -->

                <!-- event -->
                @foreach($events as $item)
                <div class="col-md-6">
                    <div class="event">
                        <div class="event-img">
                            <a href="{{route('running.index')}}">
                                <img src="{{asset('uploads/events/'.$item->image)}}" alt="">
                            </a>
                        </div>
                        <div class="event-content">
                            <h3><a href="running-event.html">{{$item->title}}</a></h3>
                            <ul class="event-meta">
                                <li><i class="fa fa-clock-o"></i>{{ Carbon\Carbon::parse($item->created_at)->format('d-M-Y | g:i:s A') }}</li>
                                <li><i class="fa fa-map-marker"></i> {{$item->location}}</li>
                            </ul>
                            <p>{{$item->sub_title}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- /event -->

                <div class="clearfix visible-md visible-lg"></div>

                <!-- /event -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /EVENTS -->

    <!-- BLOG -->
    <div id="blog" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- section title -->
                <div class="col-md-8 col-md-offset-2">
                    <div class="section-title text-center">
                        <h2 class="title">{{$allheading->story_heading}}</h2>
                        <p class="sub-title">{{$allheading->story_subheading}}</p>
                    </div>
                </div>
                <!-- /section title -->
                @foreach($story as $item)
                <!-- blog -->
                <div class="col-md-4">
                    <div class="article">
                        <div class="article-img">
                            <a href="{{route('studentblog.index')}}">
                                <img src="{{asset('uploads/story/'.$item->image)}}" alt="">
                            </a>
                        </div>
                        <div class="article-content">
                            <h3 class="article-title"><a href="{{route('studentblog.index')}}">{{$item->title}}</a></h3>
                            <ul class="article-meta">
                                <li>{{ Carbon\Carbon::parse($item->created_at)->format('d-M-Y') }}</li>
                                <li>By {{$item->name}}</li>
                                <li>0 Comments</li>
                            </ul>
                            <p>{{ $item->sub_title }}</p>
                            <a href="{{route('studentblog.index')}}" class="primary-button">Read More</a>

                        </div>
                    </div>
                </div>
                <!-- /blog -->
                @endforeach
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /BLOG -->
     <!-- Load Facebook SDK for JavaScript -->
     <!-- Load Facebook SDK for JavaScript -->
     
      
@endsection