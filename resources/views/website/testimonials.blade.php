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
                                <li class="nav-item"><a class="nav-link active" href="/testimonials">Testimonials</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="/contact-us">Contact Us</a></li>
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
        <h1>Testimonials</h1>
    </div>
</div>
<!-- Inner Heading End -->

<!-- Inner Content Start -->
<div class="innerContent-wrap">
    <div class="container">

        <!-- Testimonials Start -->
        <div class="testimonials-wrap">
            <ul class="row  unorderList">
                @foreach($testimonials as $testimonial)
                <li class="col-lg-6 ">
                    <div class="testimonials_sec">
                        <div class="client_box">
                            <div class="clientImg"><img alt="" src="images/{{$testimonial->image}}" style="width: 80px"></div>
                            <ul class="unorderList starWrp">
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                            </ul>
                        </div>
                        <p>{{$testimonial->testimonial}}</p>
                        <h3>{{$testimonial->name}}</h3>
                        <div class="quote_icon"><i class="fas fa-quote-left"></i></div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>

        <!-- Testimonials End -->

    </div>
</div>
<!-- Inner Content Start -->



<!-- Enroll Start -->
<div class="choice-wrap enroll-wrap">
    <div class="container">
        <div class="title">
            <h1>Call To Enroll Your Child</h1>
        </div>
        <p>At Redeemer's Treasures International school, our aim is to provide a structured, purposeful and caring learning environment for all its pupils, within which each girl or boy can feel confident to explore, develop and realise his or her full potential, helped and encouraged by teachers who are expert practitioners of their craft and fully committed to meeting the needs of the children in their care.
            Enroll
        </p>
        <div class="phonewrp"><img src="{{url('website/images/phone_icon.png')}}" alt=""><a href="#">08035132506</a></div>
    </div>
</div>
<!-- Enroll End -->


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
