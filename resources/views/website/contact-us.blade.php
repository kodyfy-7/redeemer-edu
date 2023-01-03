<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fav Icon -->
    <link rel="shortcut icon" href="{{url('website/favicon.ico')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{url('website/css/bootstrap.min.css')}}">
    <link href="{{url('website/css/all.css')}}" rel="stylesheet">
    <link href="{{url('website/css/owl.carousel.css')}}" rel="stylesheet">

    <!-- <link rel="stylesheet" href="css/switcher.css"> -->
    <link rel="stylesheet" href="{{url('website/rs-plugin/css/settings.css')}}">
    <!-- Jquery Fancybox CSS -->
    <link rel="stylesheet" type="text/css" href="{{url('website/css/jquery.fancybox.min.css')}}" media="screen" />
    <link href="{{url('website/css/animate.css')}}" rel="stylesheet">
    <link href="{{url('website/css/style.css')}}" rel="stylesheet"  id="colors">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
    <title>RTIS - Contact Us</title>
</head>
<body>

<!--Header Start-->
<div class="header-wrap">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-12 navbar-light">
                <div class="logo"> <a href="/"><img alt="" class="logo-default" src="{{url('website/images/logo.png')}}"></a></div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="navigation-wrap" id="filters">
                    <nav class="navbar navbar-expand-lg navbar-light"> <a class="navbar-brand" href="#">Menu</a>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <button class="close-toggler" type="button" data-toggle="offcanvas"> <span><i class="fas fa-times-circle" aria-hidden="true"></i></span> </button>
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item"> <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a> </li>
                                <li class="nav-item"><a class="nav-link" href="/about-us">About</a></li>

                                <li class="nav-item"><a class="nav-link" href="/our-teachers">Teachers</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="/gallery">Gallery</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="">Portal</a> <i class="fas fa-caret-down"></i>
                                    <ul class="submenu">
                                        <li><a href="{{url('administrator/login')}}">Admininstrator</a></li>
                                        <li><a href="{{url('parent/login')}}">Parent</a></li>
                                        <li><a href="{{url('teacher/login')}}">Teacher</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="/testimonials">Testimonials</a>
                                <li class="nav-item"><a class="nav-link active" href="/contact-us">Contact Us</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>

        </div>
    </div>
</div>
<!--Header End-->


<!--main-->
<!-- Inner Heading Start -->
<div class="innerHeading-wrap">
    <div class="container">
        <h1>Contact Us</h1>
    </div>
</div>
<!-- Inner Heading End -->

<!-- Inner Content Start -->
<div class="innerContent-wrap">
    <div class="container">
        <div class="cont_info ">
            <div class="row">
                <div class="col-lg-3 col-md-6 md-mb-30">
                    <div class="address-item style">
                        <div class="address-icon"> <i class="fas fa-phone-alt"></i> </div>
                        <div class="address-text">
                            <h3 class="contact-title">Call Us</h3>
                            <ul class="unorderList">
                                <li><a href="tel:77701234567">08035132506</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 md-mb-30">
                    <div class="address-item style">
                        <div class="address-icon"> <i class="far fa-envelope"></i> </div>
                        <div class="address-text">
                            <h3 class="contact-title">Mail Us</h3>
                            <ul class="unorderList">
                                <li><a href="#">info@redeemerstreasures.com</a></li>
                                <li><a href="#">admin@redeemerstreasures.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 sm-mb-30">
                    <div class="address-item">
                        <div class="address-icon"> <i class="far fa-clock"></i> </div>
                        <div class="address-text">
                            <h3 class="contact-title">Opening Hours</h3>
                            <ul class="unorderList">
                                <li>Mon - Fri : 10am to 2pm</li>
                                <li>Sat - Sun : Closed</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="address-item">
                        <div class="address-icon"> <i class="fas fa-map-marker-alt"></i> </div>
                        <div class="address-text">
                            <h3 class="contact-title">Address</h3>
                            <p> 1 Redemption Way, Km 7, Bening Sapele RD, Benin City</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7">

                <!-- Register Start -->
                <div class="login-wrap">
                    <div class="contact-info login_box">
                        <div class="contact-form loginWrp registerWrp">
                            <form id="contactForm" novalidate="">
                                <h3>Get In Touch</h3>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="email" name="name" class="form-control" placeholder="First Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="email" name="name" class="form-control" placeholder="Last Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="Email Address">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="email" name="phone" class="form-control" placeholder="Phone">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <textarea class="form-control" placeholder="Message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <button type="submit" class="default-btn btn send_btn"> Submit <span></span></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Register End -->
            </div>
            <div class="col-lg-5">
                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.2518292463815!2d5.635013615231241!3d6.230494728227576!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1040d160ea823c53%3A0xc74d8db023bcec85!2sTHE%20REDEEMED%20CHRISTIAN%20CHURCH%20OF%20GOD%2C%20REGION%2013%20HQ%2C%20TRINITY%20SACTUARY!5e0!3m2!1sen!2sng!4v1663222710067!5m2!1sen!2sng"  width="100%" height="511" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Inner Content Start -->

<!--Newsletter Start-->
<div class="newsletter-wrap ">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="title">
                    <h1>Newsletter</h1>
                </div>
                <p>Sign Up for our newsletters</p>
            </div>
            <div class="col-lg-6">
                <div class="news-info">
                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Email Address">
                            <div class="form_icon"><i class="fas fa-envelope"></i></div>
                        </div>
                        <button class="sigup">Sign Up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Newsletter End-->

<!-- Footer Start -->
<div class="footer-wrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="footer_logo"><img alt="" class="footer-default" src="{{url('website/images/logo2.png')}}"></div>
                <p>At Redeemer's Treasures International School, Our Vision is to have a positive impact on the live of all individual by providing a school that works for all.</p>
            </div>
            <div class="col-lg-2 col-md-3">
                <h3>Quick links</h3>
                <ul class="footer-links">
                    <li> <a href="#">Home</a></li>
                    <li> <a href="#">About</a></li>
                    <li> <a href="#">Classes</a></li>
                    <li> <a href="#">Teachers</a></li>
                    <li> <a href="#">Testimonials</a></li>
                    <li> <a href="contact.html">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-4">
                <h3>Opening Hours</h3>
                <ul class="unorderList hourswrp">
                    <li>Monday <span>08:00 - 02:00</span></li>
                    <li>Tuesday <span>08:00 - 02:00</span></li>
                    <li>Wednesday <span>08:00 - 02:00</span></li>
                    <li>Thursday <span>08:00 - 02:00</span></li>
                    <li>Friday <span>08:00 - 02:00</span></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-4">
                <div class="footer_info">
                    <h3>Get in Touch</h3>
                    <ul class="footer-adress">
                        <li class="footer_address">  <i class="fas fa-map-signs"></i>  <span>  1 Redemption Way, Km 7, Bening Sapele RD, Benin City</span> </li>
                        <li class="footer_email"> <i class="fas fa-envelope" aria-hidden="true"></i> <span><a href="mailto:info@example.com"> info@redeemerstreasures.com</a></span> </li>
                        <li class="footer_phone"> <i class="fas fa-phone-alt"></i> <span><a href="tel:7704282433"> 08035132506</a></span> </li>
                    </ul>
                    <div class="social-icons footer_icon">
                        <ul>
                            <li><a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fab fa-youtube" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

<!--Copyright Start-->
<div class="footer-bottom text-center">
    <div class="container">
        <div class="copyright-text">Copyright © RTIS 2022. Designed by <a href="https://geenius.zyrocs.com">BuySolutions Hub</a></div>
    </div>
</div>
<!--Copyright End-->

<!-- Js -->
<script src="{{url('website/js/jquery.min.js')}}"></script>
<script src="{{url('website/js/extra.min.js')}}"></script>
<script src="{{url('website/js/popper.min.js')}}"></script>
<script src="{{url('website/rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script>
<script src="{{url('website/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>
<!-- Jquery Fancybox -->
<script src="{{url('website/js/jquery.fancybox.min.js')}}"></script>
<!-- Animate js -->
<script src="{{url('website/js/animate.js')}}"></script>
<script>
    new WOW().init();
</script>
<!-- WOW file -->
<script src="{{url('website/js/wow.js')}}"></script>
<!-- general script file -->
<script src="{{url('website/js/owl.carousel.js')}}"></script>
<script src="{{url('website/js/script.js')}}"></script>
</body>

<!-- Mirrored from entiretimes.com/html/school/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Sep 2022 00:04:13 GMT -->
</html>
