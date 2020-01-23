@extends('user.layouts.master')
@section('title','About')
@section('user-content')
<!-- Page Header -->
<div id="page-header">
    <!-- section background -->
    <div class="section-bg" style="background-image: url({{asset('uploads/navcauses/'.$navcauses->bg_img)}});"></div>
    <!-- /section background -->

    <!-- page header content -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="header-content">
                    <h1>{{$navcauses->heading}}</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{route('user.index')}}">Home</a></li>
                        <li><a href="single-cause.html">Causes</a></li>
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
                    <!-- article img -->
                    <div class="article-img">
                        <img src="{{asset('uploads/navcauses/'.$navcauses->image)}}" alt="">
                    </div>
                    <!-- article img -->

                    <!-- causes progress -->
                    <div class="clearfix">
                        <div class="causes-progress">
                            <div class="causes-progress-bar">
                                <div style="width: 53%;">
                                    <span>53%</span>
                                </div>
                            </div>
                            <div>
                                <span class="causes-raised">Raised: <strong>52.000$</strong></span>
                                <span class="causes-goal">Goal: <strong>{{$navcauses->goal}}$</strong></span>
                            </div>
                        </div>
                        <a href="{{route('doner.index')}}" class="primary-button causes-donate">Donate Now</a>
                    </div>
                    <!-- /causes progress -->

                    <!-- article content -->
                    <div class="article-content">
                        <!-- article title -->
                        <h2 class="article-title">{{$navcauses->title}}</h2>
                        <!-- /article title -->

                        <!-- article meta -->
                        <ul class="article-meta">
                            <li>{{ Carbon\Carbon::parse($navcauses->created_at)->format('d-M-Y') }}</li>
                            <li>By {{$navcauses->writer}}</li>
                            <li>0 Comments</li>
                        </ul>
                        <!-- /article meta -->

                        <p>{{$navcauses->sub_title}}</p>
                    </div>
                    <!-- CAUSESS -->
                    <div id="causes" class="section">
                        <!-- container -->
                        <div class="container">
                            <!-- row -->
                            <div class="row">
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

                    <!-- /article content -->

                    <!-- article tags share -->
                    <div class="article-tags-share">
                        <!-- article tags -->

                        <!-- /article tags -->

                        <!-- article share -->
                        <ul class="share">
                            <!-- Go to www.addthis.com/dashboard to customize your tools --> 
                            <li><div class="addthis_inline_share_toolbox"></div></li>
                        </ul>
                        <!-- /article share -->
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

            <!-- ASIDE -->
            <aside id="aside" class="col-md-3">

                <!-- posts widget -->
                <div class="widget">
                    @if($navcauses->post_head)
                    <h3 class="widget-title">{{ $navcauses->post_head  }}</h3>
                    @else
                    <h3 class="widget-title">Latest Posts</h3>
                    @endif
                    <!-- single post -->
                    @foreach($causespost as $item)
                    <div class="widget-post">
                        <a href="{{route('navcaus.index')}}">
                            <div class="widget-img">
                                <img src="{{asset('uploads/causespost/'.$item->image)}}" alt="">
                            </div>
                            <div class="widget-content">
                                {{$item->title}}
                            </div>
                        </a>
                        <ul class="article-meta">
                            <li>By {{$item->writer}}</li>
                            <li><td> {{ Carbon\Carbon::parse($item->created_at)->format('d-M-Y') }}</td></li>
                        </ul>
                    </div>
                    @endforeach
                    <!-- /single post -->
                </div>
                <!-- /posts widget -->

            </aside>
            <!-- /ASIDE -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
@endsection