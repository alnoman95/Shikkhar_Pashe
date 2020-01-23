@extends('user.layouts.master')
@section('title','Gallary') 
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
                    <h1>Gallery</h1>
                    <ul class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="gallery.html">Gallery</a></li>
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

                    <!-- CAUSESS -->
                    <div id="causes" class="section">
                        <!-- container -->
                        <div class="container">
                            <!-- row -->
                            <div class="row">

                                <!-- section title -->
                                <div class="col-md-8 col-md-offset-2">
                                </div>
                                <!-- section title -->

                                @foreach($gallery as $item)
                                <!-- causes -->
                                <div class="col-md-4">
                                    <div class="causes">
                                        <div class="causes-img">
                                            <a href="#">
                                                <img style="width:100%; height:200px;" src="{{asset('uploads/gallery/'.$item->image)}}" alt="">
                                            </a>
                                        </div>
                                        <div class="causes-progress">

                                        </div>
                                    </div>
                                </div>
                                <!-- /causes -->
                                @endforeach
                                {{ $gallery->links() }}
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

            <!-- ASIDE -->
            <aside id="aside" class="col-md-3">

            </aside>
            <!-- /ASIDE -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

@endsection