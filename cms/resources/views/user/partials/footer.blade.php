<!-- FOOTER -->
<footer id="footer" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- footer contact -->
            <div class="col-md-4">
                <div class="footer">
                    <div class="footer-logo">
                        <a class="logo" href="{{route('user.index')}}"><img src="user/img/logo1.png" alt=""></a>
                    </div>
                    <p>The objective of the project is to create an online platform for "Asiya Bari Ideal School" for the poor/underprivileged meritorious students in helping with their study related costs from the donation services.</p>
                    <ul class="footer-contact">
                        <li><i class="fa fa-map-marker"></i>United City, Madani Ave, Dhaka 1212</li>
                        <li><i class="fa fa-phone"></i> 544334340</li>
                        <li><i class="fa fa-envelope"></i> <a href="#">shikkharPashe@email.com</a></li>
                    </ul>
                </div>
            </div>
            <!-- /footer contact -->

            <!-- footer galery -->
            <div class="col-md-4">
                <div class="footer">
                    <h3 class="footer-title">Gallery</h3>
                    <ul class="footer-galery">
                        <li>
                            <a href="{{route('causesgallary.index')}}"><img src="user/img/galery-1.jpg" alt=""></a>
                        </li>
                        <li>
                            <a href="{{route('causesgallary.index')}}"><img src="user/img/galery-2.jpg" alt=""></a>
                        </li>
                        <li>
                            <a href="{{route('causesgallary.index')}}"><img src="user/img/galery-3.jpg" alt=""></a>
                        </li>
                        <li>
                            <a href="{{route('causesgallary.index')}}"><img src="user/img/galery-4.jpg" alt=""></a>
                        </li>
                        <li>
                            <a href="{{route('causesgallary.index')}}"><img src="user/img/galery-5.jpg" alt=""></a>
                        </li>
                        <li>
                            <a href="{{route('causesgallary.index')}}"><img src="user/img/galery-6.jpg" alt=""></a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /footer galery -->

            <!-- footer newsletter -->
            <div class="col-md-4">
                <div class="footer">
                    <h3 class="footer-title">Subscribe us</h3>
                    <p>You will get the latest news and updates about us</p>
                    <form class="footer-newsletter" method="post" action="{{route('subscribe.store')}}">
                    @csrf
                        <input class="input" name="email" type="email" placeholder="Enter your email" require="">
                        <button class="primary-button" type="submit">Subscribe</button>
                    </form>
                    <ul class="footer-social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    </ul>
                </div>
            </div>
            <!-- /footer newsletter -->
        </div>
        <!-- /row -->

        <!-- footer copyright & nav -->
        <div id="footer-bottom" class="row">
            <div class="col-md-6 col-md-push-6">
                <ul class="footer-nav">
                    <li><a href="{{route('user.index')}}">Home</a></li>
                    <li><a href="{{route('abouts.index')}}">About</a></li>
                    <li><a href="{{route('navcaus.index')}}">Causes</a></li>
                    <li><a href="{{route('running.index')}}">Events</a></li>
                    <li><a href="{{route('studentblog.index')}}">Blog</a></li>
                    <li><a href="{{route('contact.index')}}">Contact</a></li>
                </ul>
            </div>

            <div class="col-md-6 col-md-pull-6">
                <div class="footer-copyright">
                    <span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved by Shikkhar Pashe <i class="fa fa-heart-o" aria-hidden="true"></i><a href="https://shikkharpashe.com" target="_blank"></a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
                </div>
            </div>
        </div>
        <!-- /footer copyright & nav -->
    </div>
    <!-- /container -->
</footer>
<!-- /FOOTER -->
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5e22ff62daaca76c6fcea9f4/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->