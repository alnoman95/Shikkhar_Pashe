@extends('user.layouts.master') 
@section('title','Contact Us') 
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
                    <h1>Contact With Us</h1>
                    <ul class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="contact.html">Contact</a></li>
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
                        <iframe style="width:100%;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7962.010031898207!2d90.44637958152694!3d23.797338926232765!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c7d8042caf2d%3A0x686fa3e360361ddf!2sUnited%20International%20University!5e0!3m2!1sen!2sbd!4v1579674371846!5m2!1sen!2sbd" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                    </div>
                    <!-- article img -->

                    <!-- article content -->
                    <div class="article-content">
                        <!-- article title -->
                        <h2 class="article-title">Contact With  Us</h2>
                        <!-- /article title -->
                        <h3 class="article-title">Located In :</h3>
                        <p> United City</p>

                        <h3 class="article-title">Address : </h3>
                        <p> United City, Madani Ave, Dhaka 1212</p>

                        <h3 class="article-title">Phone : </h3>
                        <p> 01414146, 01461461, 04154151</p>

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
                        <a href="gallery.html">
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