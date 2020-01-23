@extends('user.layouts.master') 
@section('title','User Blog') 
@section('user-content')
<!-- Page Header -->
<div id="page-header">
    <!-- section background -->
    <div class="section-bg" style="background-image: url({{asset('uploads/userblog/'.$userblog->bg_img)}});"></div>
    <!-- /section background -->

    <!-- page header content -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="header-content">
                    <h1>{{$userblog->heading}}</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{route('user.index')}}">Home</a></li>
                        <li><a href="student-blog.html">Blog</a></li>
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
                <div class="article">
                    <!-- article img -->
                    <div class="article-img">
                        <img src="user/img/post-img.jpg" alt="">
                    </div>
                    <!-- article img -->

                    <!-- article content -->
                    <div class="article-content">
                        <!-- article title -->
                        <h2 class="article-title">{{$userblog->title}}</h2>
                        <!-- /article title -->

                        <!-- article meta -->
                        <ul class="article-meta">
                            <li>{{ Carbon\Carbon::parse($userblog->created_at)->format('d-M-Y') }}</li>
                            <li>By {{$userblog->writer}}</li>
                            <li>0 Comments</li>
                        </ul>
                        <!-- /article meta -->

                        <p>{{$userblog->sub_title1}}</p>
                        <blockquote>
                            <p>You believe, as we do, that every child deserves a future. Every last child.</p>
                        </blockquote>
                        <p>{{$userblog->sub_title2}}</p>
                    </div>
                    <!-- /article content -->

                    <!-- article tags share -->
                    <div class="article-tags-share">
                        <!-- article tags -->
                        <ul class="share">
                            <!-- Go to www.addthis.com/dashboard to customize your tools --> 
                            <li><div class="addthis_inline_share_toolbox"></div></li>
                        </ul>
                    </div>
                    <!-- /article tags share -->

                    <!-- article comments -->
                    <div class="article-comments">
                        <h3>Comments (3)</h3>

                        @foreach($reply as $item)
                        <!-- comment -->
                        <div class="media">
                            <div class="media-left">
                                <img class="media-object" src="user/img/avatar-1.jpg" alt="">
                            </div>
                            <div class="media-body">
                                <div class="media-heading">
                                    <h4>{{$item->name}}</h4>
                                    <span class="time">{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span>
                                    
                                </div>
                                <p>{{$item->message}}</p>
                            </div>
                        </div>
                        <!-- /comment -->
                        @endforeach
                        {{ $reply->links() }}
                    </div>
                    <!-- /article comments -->

                     <!-- article reply form -->
                     <div class="article-reply">
                        <h3>Leave a reply</h3>
                        <p>your Opinion Matter To Us.</p>                       
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
                    <h3 class="widget-title">Latest Posts</h3>
                    <!-- single post -->
                    @foreach($causespost as $item)
                    <div class="widget-post">
                        <a href="{{route('userblogs.index')}}">
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