@extends('user.layouts.master')
@section('title','About')
@section('user-content')
<!-- Page Header -->
<div id="page-header">
			<!-- section background -->
			<div class="section-bg" style="background-image: url({{asset('uploads/about/'.$about->bg_img)}});"></div>
			<!-- /section background -->

			<!-- page header content -->
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="header-content">
							<h1>{{ $about->heading }}</h1>
							<ul class="breadcrumb">
								<li><a href="{{route('user.index')}}">Home</a></li>
								<li class="active">about</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- /page header content -->
		</div>
		<!-- /Page Header -->
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
						<h2 class="title">{{ $about->heading }}</h2>
						<p class="sub-title">{{ $about->sub_heading }}</p>
                        <h2 class="title">{{ $about->title }}</h2>
                        <p class="sub-title">{{ $about->sub_title }}</p>
					</div>
					
				</div>
				<!-- /about content -->

				<!-- about video -->
				<div class="col-md-offset-1 col-md-6">
					<a href="{{route('abouts.index')}}" class="about-video">
							
							<img src="{{asset('uploads/about/'.$about->image)}}" alt="">
                        
						</a>
				</div>
				<!-- /about video -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /ABOUT -->
    
@endsection