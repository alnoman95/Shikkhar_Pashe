@extends('user.layouts.master') 
@section('title','Donate') 
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
                    <h1>Donation</h1>
                    <ul class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="donation.html">Donate</a></li>
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

                <div id="causes" class="section">
                    <!-- container -->
                    <div class="container">
                        <!-- row -->
                        <div class="row">

                            <!-- EVENTS -->
                            <div id="events" class="section">
                                <!-- container -->
                                <div class="container">
                                    <!-- row -->
                                    <div class="row">
                                        <!-- section title -->
                                        <div class="col-md-8 col-md-offset-2">

                                        </div>
                                        <!-- /section title -->

                                        <!-- donation form -->

                                        <div class="container theme-background-white main-body">
                                            <div class="col-md-12">
                                                <div class="row donate-bar">
                                                    <div class="col-md-4 theme-blue">
                                                        GIVE WHERE NEEDED MOST
                                                    </div>
                                                    <div class="col-md-8">
                                                        <ul class="nav navbar-nav navbar-left donate-buttons" id="donate-buttons">
                                                            <li>
                                                                <a href="#">
                                                                    <button class="btn-blue active" data-dollars='25' data-impact="Covers housing or counseling services for one person">
                                                                        $25
                                                                    </button>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <button class="btn-blue" data-dollars='50' data-impact="Covers housing or counseling services for two people">
                                                                        $50
                                                                    </button>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <button class="btn-blue" data-dollars='100' data-impact="Covers housing or counseling services for four people">
                                                                        $100
                                                                    </button>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <button class="btn-blue" data-dollars='500' data-impact="Covers housing or counseling services for twenty people">
                                                                        $500
                                                                    </button>
                                                                </a>
                                                            </li>
                                                            <li id="other">
                                                                <a href="#">
                                                                    <button class="btn-blue-other" data-dollars='other' data-impact="Thank you!">
                                                                        Custom Amount
                                                                    </button>
                                                                </a>
                                                            </li>
                                                            <li id="other-input">
                                                                <span>$</span>
                                                                <input data-impact="That’s great. Thank you!">
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <button class="btn-green" data-toggle="modal" id="donate" data-target="#myModal">
                                                                        DONATE
                                                                    </button>
                                                                </a>
                                                            </li>
                                                            <li style="display: none;"><a href="#">
                                                                LEARN MORE<i class="fa fa-chevron-right margin-left"></i>
                                                            </a></li>
                                                        </ul>
                                                        <p class="impact">
                                                            Please Select Donation Amount.
                                                        </p>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header well text-center theme-background-blue">
                                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                                        <h2>You’re Donating:</h2>
                                                                        <h1 style="font-size: 5.5em; margin-top: 0;">$<span id="price"></span></h1>
                                                                        <em>Thank you!</em>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <section class="col-md-12">
                                                                                <form method="post" action="{{route('donte.store')}}">
                                                                                @csrf
                                                                                    <fieldset class="col-md-6">
                                                                                        <legend>
                                                                                            Your personal info
                                                                                        </legend>
                                                                                       
                                                                                        <input type="hidden" id="hideninputprice" name="taka" value="">
                                                                                        <label>Your Name</label>
                                                                                        <input type="text" name="name" placeholder="Your Name" class="form-control">
                                                                                        <label>Your email</label>
                                                                                        <input type="email" placeholder="Your Email" name="email" class="form-control">
                                                                                        <label>Address</label>
                                                                                        <input type="text" name="address" placeholder="Your Address" class="form-control">
                                                                                        <label>City, State, Zip Code</label>
                                                                                        <input type="text" name="city" placeholder="City, State, Zip Code" class="form-control">
                                                                                    </fieldset>
                                                                                    <fieldset class="col-md-6">
                                                                                        <legend>
                                                                                            Credit Card Information
                                                                                        </legend>
                                                                                        <label for="card-number">Credit Card Number</label>
                                                                                        <input placeholder="1234 5678 9012 3456" name="card_number" pattern="[0-9]*" type="text" class="form-control card-number" id="card-number">
                                                                                        <label for="card-number">Expiration Date</label>
                                                                                        <input placeholder="MM/YY" name="ex_date" pattern="[0-9]*" type="text" class="form-control card-expiration" id="card-expiration">
                                                                                        <label for="card-number">CVV Number</label>
                                                                                        <input placeholder="CVV" name="cvv" pattern="[0-9]*" type="text" class="form-control card-cvv" id="card-cvv">
                                                                                        <label for="card-number">Billing Zip Code</label>
                                                                                        <input placeholder="ZIP" name="zip" type="text" class="form-control card-zip" id="card-zip">
                                                                                    </fieldset>
                                                                                    <div class="modal-footer">
                                                                                        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">BACK</button> -->
                                                                                        <button type="submit" id="test" class="btn-green">DONATE</button>
                                                                                    </div>
                                                                                </form>
                                                                            </section>
                                                                        </div>
                                                                    </div>
                                                                   
                                                                </div>
                                                                <!-- /.modal-content -->
                                                            </div>
                                                            <!-- /.modal-dialog -->
                                                        </div>
                                                        <!-- /.modal -->
                                                    </div>
                                                </div>
                                                <!--/.donate-bar-->
                                            </div>
                                            <!-- /.col-md-12 -->

                                            <!-- /donation form -->

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
                    <!-- <form method="post" action="{{route('donte.store')}}">
                    @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Name</label>
                                <input type="text" name="name" class="form-control" id="inputPassword4">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Email</label>
                                <input type="email" name="email" class="form-control" id="inputEmail4">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inputEmail4">Address</label>
                            <input type="text" name="address" class="form-control" id="inputEmail4">
                            </div>
                            <div class="form-group col-md-6">
                            <label for="inputPassword4">City</label>
                            <input type="text" name="city" class="form-control" id="inputPassword4">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inputEmail4">card_number</label>
                            <input type="text" name="card_number" class="form-control" id="inputEmail4">
                            </div>
                            <div class="form-group col-md-6">
                            <label for="inputPassword4">Ex_date</label>
                            <input type="text" name="ex_date" class="form-control" id="inputPassword4">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inputEmail4">Cvv</label>
                            <input type="text" name="cvv" class="form-control" id="inputEmail4">
                            </div>
                            <div class="form-group col-md-6">
                            <label for="inputPassword4">Zip Code</label>
                            <input type="text" name="zip" class="form-control" id="inputPassword4">
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Donate</button>
                    </form> -->
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

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
@endsection