@extends('user.layouts.master') 
@section('title','Student Blog') 
@section('user-content')
<!-- Page Header -->
<div id="page-header">
    <!-- section background -->
    <div class="section-bg" style="background-image: url(user/img/background-2.jpg);"></div>
    <!-- /section background -->

    <!-- page header content -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="header-content">
                    <h1>Student Blog</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{route('user.index')}}">Home</a></li>
                        <li><a href="single-cause.html">Blog</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- /page header content -->
</div>
<!-- /Page Header -->
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- MAIN -->
            <main id="main" class="col-md-9">
                <!-- article -->
                <div class="article causes-details">

                    <div id="causes" class="section">
                        <!-- container -->
                        <div class="container">
                            <!-- row -->
                            <div class="row">

                                <!-- section title -->
                                <div class="col-md-8 col-md-offset-2">
                                </div>

                                <!-- EVENTS -->
                                <div id="events" class="section">
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
                                                        <h3 class="article-title"><a href="student-blog.html">{{$item->title}}</a></h3>
                                                        <ul class="article-meta">
                                                            <li>{{ Carbon\Carbon::parse($item->created_at)->format('d-M-Y') }}</li>
                                                            <li>By {{$item->name}}</li>
                                                            <li>0 Comments</li>
                                                        </ul>
                                                        <p>{{$item->sub_title}}</p>
                                                        <a href="{{route('doner.index')}}" class="primary-button">Donate Now</a>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /blog -->
                                            @endforeach
                                            <div class="clearfix visible-md visible-lg"></div>

                                            <!-- /event -->
                                        </div>
                                        <!-- /row -->
                                    </div>
                                    <!-- /container -->
                                </div>
                                <!-- /EVENTS -->

                            </div>
                            <!-- /row -->
                        </div>
                        <!-- /container -->
                    </div>
                    <!-- /CAUSESS -->

                    <!-- article tags share -->
                    <div class="article-tags-share">
                        <!-- article tags -->
                        <ul class="share">
                            <!-- Go to www.addthis.com/dashboard to customize your tools --> 
                            <li><div class="addthis_inline_share_toolbox"></div></li>
                        </ul>
                    </div>
                    <!-- /article tags share -->

                     <!-- article reply form -->
                     <div class="article-reply">
                        <h3>Leave a reply</h3>
                        <p>Give us your opinion</p>                       
                        <div class="row">
                            <form action="{{route('reply.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input class="input" placeholder="Name" name="name" type="text">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input class="input" placeholder="Email" name="email" type="email">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input class="input" placeholder="Website" name="website" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="input" name="message" placeholder="Message"></textarea>
                                    </div>
                                    <button class="primary-button">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /article reply form -->
                </div>
                <!-- /article -->
            </main>
            <!-- /MAIN -->

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
@endsection