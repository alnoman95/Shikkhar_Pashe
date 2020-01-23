<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Shikkhar Pashe | @yield('title')</title>
    <link href="{{asset('backend/img/icon/favicon.png')}}" rel="shortcut icon">
    <link href="{{asset('backend/img/icon/apple-touch-icon.png')}}" rel="apple-touch-icon">
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400%7CSource+Sans+Pro:700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{asset('user/css/bootstrap.min.css')}}" />

    <!-- Owl Carousel -->
    <link type="text/css" rel="stylesheet" href="{{asset('user/css/owl.carousel.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('user/css/owl.theme.default.css')}}" />

    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{asset('user/css/font-awesome.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('user/css/login.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('user/css/donation.css')}}"/>
    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{asset('user/css/style.css')}}" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
<!-- menu section -->
    @include('user.partials.menubar') 
<!-- main content section -->
    @yield('user-content') 
<!-- footer section -->
    @include('user.partials.footer')

    <!-- jQuery Plugins -->
    <script src="{{asset('user/js/jquery.min.js')}}"></script>
    <script src="{{asset('user/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('user/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('user/js/jquery.stellar.min.js')}}"></script>
    <script src="{{asset('user/js/main.js')}}"></script>
    <script src="{{asset('user/js/donation.js')}}"></script>
    <script src="{{asset('user/js/login.js')}}"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}
    <!-- Go to www.addthis.com/dashboard to customize your tools --> 
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e15882deb285eaf"></script>
    <script>
       $(document).ready(function () {
                $("#myselect").change(function () {
                    // var selectedVal = $("#myselect option:selected").text();
                    var selectedVal = $("#myselect option:selected").attr("id");
                    if(selectedVal == "toggle"){
                        $("#content").show();
                    } else{
                        $("#content").hide();
                    }
                    console.log("|"+selectedVal);
                });
            });
    </script>    

</body>

</html>