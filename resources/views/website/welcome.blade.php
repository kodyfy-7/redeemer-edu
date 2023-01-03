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
<title>RTIS</title>
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
                <li class="nav-item"> <a class="nav-link active" href="/">Home <span class="sr-only">(current)</span></a> </li>
                  <li class="nav-item"><a class="nav-link" href="/about-us">About Us</a> <i class="fas fa-caret-down"></i>
                      <ul class="submenu">
                          <li><a href="/testimonials">Testimonials</a></li>
                      </ul>
                  </li>

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

<!-- Revolution slider start -->
<div class="tp-banner-container">
  <div class="tp-banner">
    <ul>
      <li data-slotamount="7" data-transition="3dcurtain-horizontal" data-masterspeed="1000" data-saveperformance="on"> <img alt="" src="{{url('website/images/dummy.png')}}" data-lazyload="{{url('website/images/slider1.jpg')}}">
        <div class="caption lft large-title tp-resizeme slidertext2" data-x="center" data-y="150" data-speed="600" data-start="1600"><span> Redeemer's Treasures  </span></div>
        <div class="caption lft large-title tp-resizeme slidertext2" data-x="center" data-y="220" data-speed="600" data-start="1600"><span> International School  </span></div>
        <div class="caption lfb large-title tp-resizeme slidertext3" data-x="center" data-y="300" data-speed="600" data-start="2200"> We create a conducive academic environment for individual to realise their potentials</div>
        <div class="caption lfb large-title tp-resizeme slidertext4" data-x="330" data-y="370" data-speed="600" data-start="2800"> <a href="#"><i class="fas fa-edit"></i> Enroll Today</a> </div>
        <div class="caption lfb large-title tp-resizeme slidertext4 slidertext5" data-x="610" data-y="370" data-speed="600" data-start="3400"> <a href="#"><i class="far fa-calendar-alt"></i> Schedule a Tour</a> </div>
      </li>
      <li data-slotamount="7" data-transition="slotzoom-horizontal" data-masterspeed="1000" data-saveperformance="on"> <img alt="" src="{{url('website/images/dummy.png')}}" data-lazyload="{{url('website/images/slider.jpg')}}">
        <div class="caption lft large-title tp-resizeme slidertext2" data-x="center" data-y="170" data-speed="600" data-start="1600"><span> Building a Total Child </span></div>
        <div class="caption lfb large-title tp-resizeme slidertext3" data-x="center" data-y="260" data-speed="600" data-start="2200"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nibh dolor, gravida faucibus dolor consectetur, <br/>
          pulvinar rhoncus risus. Fusce vel rutrum mi. Suspendisse pretium tellus eu ipsum.</div>
        <div class="caption lfb large-title tp-resizeme slidertext4" data-x="330" data-y="350" data-speed="600" data-start="2800"> <a href="#"><i class="fas fa-edit"></i> Enroll Today</a> </div>
        <div class="caption lfb large-title tp-resizeme slidertext4 slidertext5" data-x="610" data-y="350" data-speed="600" data-start="3400"> <a href="#"><i class="far fa-calendar-alt"></i> Schedule a Tour</a> </div>
      </li>
    </ul>
  </div>
</div>
<!-- Revolution slider end -->

<!-- School Start -->
<div class="our-course-categories-two ">
  <div class="container">
    <div class="categories_wrap">
      <ul class="row unorderList">
        <li class="col-lg-3 col-md-6">
          <!-- single-course-categories -->
          <div class="categories-course">
            <div class="item-inner">
              <div class="cours-icon"> <span class="coure-icon-inner"> <img src="{{url('website/images/teacher.png')}}" alt=""> </span> </div>
              <div class="cours-title">
                <h4>Expert teachers</h4>
                  <p>All our teachers are certified, and our classes are equipped with state-of-art learning facilities.</p>
              </div>
            </div>
          </div>
          <!--// single-course-categories -->
        </li>
        <li class="col-lg-3 col-md-6">
          <!-- single-course-categories -->
          <div class="categories-course">
            <div class="item-inner">
              <div class="cours-icon"> <span class="coure-icon-inner"> <img src="{{url('website/images/book.png')}}" alt=""> </span> </div>
              <div class="cours-title">
                <h4>Quality Education</h4>
                <p>We offer pupils a higher quality education</p>
              </div>
            </div>
          </div>
          <!--// single-course-categories -->
        </li>
        <li class="col-lg-3 col-md-6">
          <!-- single-course-categories -->
          <div class="categories-course" >
            <div class="item-inner">
              <div class="cours-icon"> <span class="coure-icon-inner"> <img src="{{url('website/images/support.png')}}" alt=""> </span> </div>
              <div class="cours-title">
                <h4>School Life</h4>
                <p>Our students are involved in a wide range of extracurricular activities without compromising their exceptional academic performance.</p>
              </div>
            </div>
          </div>
          <!--// single-course-categories -->
        </li>
        <li class="col-lg-3 col-md-6">
          <!-- single-course-categories -->
          <div class="categories-course">
            <div class="item-inner">
              <div class="cours-icon"> <span class="coure-icon-inner"> <img src="{{url('website/images/scholarship.png')}}" alt=""> </span> </div>
              <div class="cours-title">
                <h4>Leadership</h4>
                <p>We provide an extensive array of leadership opportunities including involvement in community services for all students.</p>
              </div>
            </div>
          </div>
          <!--// single-course-categories -->
        </li>
      </ul>
    </div>
  </div>
</div>

<!-- School End -->

<!-- About Start -->
<div class="about-wrap  " id="about">
  <div class="container">
    <div class="row">
      <div class="col-lg-7">
        <div class="aboutImg"><img src="{{url('website/images/aboutImg.png')}}" alt=""></div>
      </div>
      <div class="col-lg-5">
        <div class="about_box">
          <div class="title">
              <h2><strong>Welcome to <span>Reedemer's Treasures International School</span></strong></h2>
          </div>

            <div class="learn_info">
                <h3>Message from the Head of School</h3>
            </div>
            <br>
            <p>I feel extremely privileged and honoured to welcome you to Redeemers Treasures International Schools, Benin City,Nigeria.</p>

              <p>The School cuts aross all classes at the primary level and currently located at 1 Redemption way, Km 7, Benin /Sapele road, Benin City, Edo State.</p>

              <p>Over the years we have worked towards the dedication to the  development of every student thereby making them a total child. Education is about growth, not just about grades.</p>


            <div class="learn_info">
                <h3 style="font-family: Sacramento;
                font-weight: 400;
                margin: 0;
                font-size: 1em;
                line-height: 20px;
                color: #F0AA00;">Mrs Agboola Oluwakemi</h3>

                Head of School
            </div>
<!--          <ul class="edu_list">
            <li>
              <div class="learing-wrp">
                <div class="edu_icon"><img src="{{url('website/images/education.png')}}" alt=""></div>
                <div class="learn_info">
                  <h3>Special Education</h3>
                  <p>Lorem ipsum dolor sit amet, adipiscing elit. Vivamus nibh dolor gravida at eleifend</p>
                </div>
              </div>
            </li>
            <li>
              <div class="learing-wrp">
                <div class="edu_icon"><img src="{{url('website/images/class.png')}}" alt=""></div>
                <div class="learn_info">
                  <h3>Honors classes</h3>
                  <p>Lorem ipsum dolor sit amet, adipiscing elit. Vivamus nibh dolor gravida at eleifend</p>
                </div>
              </div>
            </li>
            <li>
              <div class="learing-wrp">
                <div class="edu_icon"><img src="{{url('website/images/academy.png')}}" alt=""></div>
                <div class="learn_info">
                  <h3>Traditional academies</h3>
                  <p>Lorem ipsum dolor sit amet, adipiscing elit. Vivamus nibh dolor gravida at eleifend</p>
                </div>
              </div>
            </li>
          </ul>-->
        </div>
      </div>
    </div>
  </div>
</div>
<!-- About End -->

<!-- Classes Start -->
<div class="class-wrap">
  <div class="container">
    <div class="title">
      <h1> Study at Redeemer's Treasures International School</h1>
    </div>
    <ul class="owl-carousel  ">
      <li class="item">
        <div class="class_box">
          <div class="class_Img"><img src="{{url('website/images/education_img.jpg')}}" alt="">
            <div class="time_box"><span>08:00 am - 10:00 am</span></div>
          </div>
          <div class="path_box">
            <h3><a href="#">Education Programs System</a></h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <div class="students_box">
              <div class="students">Students: 30</div>
              <div class="stud_fee">Fee: $150</div>
            </div>
          </div>
        </div>
      </li>
      <li class="item">
        <div class="class_box">
          <div class="class_Img"><img src="{{url('website/images/kid_game.jpg')}}" alt="">
            <div class="time_box"><span>08:00 am - 10:00 am</span></div>
          </div>
          <div class="path_box">
            <h3><a href="#">Games Program held in a Week</a></h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nibh dolor.</p>
            <div class="students_box">
              <div class="students">Students: 30</div>
              <div class="stud_fee">Fee: $150</div>
            </div>
          </div>
        </div>
      </li>
      <li class="item">
        <div class="class_box">
          <div class="class_Img"><img src="{{url('website/images/lab.jpg')}}" alt="">
            <div class="time_box"><span>08:00 am - 10:00 am</span></div>
          </div>
          <div class="path_box">
            <h3><a href="#">Labs Programs</a></h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nibh dolor, gravida faucibus dolor adipiscing consectetur.</p>
            <div class="students_box">
              <div class="students">Students: 30</div>
              <div class="stud_fee">Fee: $150</div>
            </div>
          </div>
        </div>
      </li>
    </ul>
  </div>
</div>
<!-- Classes End -->

<!-- Choice Start -->
<div class="choice-wrap ">
  <div class="container">
    <div class="title">
      <h1>We Inspire Our Pupils<span>To Be Passionate</span></h1>
    </div>
      <div class="learn_info">
          <h3>Our Mission</h3>
      </div>
          <p>Create a conducive academic environment for individual to realise their potentials <br>
              Inspire our pupils to be passionate. <br>
              Develop and support students well being. <br>
          </p>
      <div class="learn_info">
          <h3>Our Vision</h3>
      </div>
          <p>
              To have a positive impact on the live of all individual by providing a school that works for all.
          </p>


    <div class="readmore"><a href="#">Contact Us</a></div>
  </div>
</div>
<!-- Choice End -->

<!-- Video Start -->
<div class="video-wrap  ">
  <div class="container">
    <div class="title center_title">
      <h1>Watch Our Video</h1>
    </div>
    <div class="video">
      <div class="playbtn">
          <a data-fancybox="" href="https://youtu.be/fmKqcR7rAq4"><span></span></a></div>
    </div>
  </div>
</div>
<!-- Video End -->



<!-- Gallery Start -->
<div class="gallery-wrap ">
  <div class="container">
    <div class="row">
      <div class="col-lg-3">
        <div class="gallery_box">
          <div class="gallery_left">
            <div class="title">
              <h1>Photo Gallery</h1>
            </div>
            <p>Checkout our photo gallery.</p>
            <div class="readmore"><a href="/gallery">View All Gallery</a></div>
          </div>
        </div>
      </div>

      <div class="col-lg-9">
        <div class="row">
            @foreach($images as $image)
          <div class="col-lg-4 col-md-6">
            <div class="galleryImg"><img src="/images/{{ $image->image }}" alt="">
              <div class="portfolio-overley">
                <div class="content"> <a href="/images/{{ $image->image }}" class="fancybox image-link" data-fancybox="images" title="Image Caption Here"><i class="fas fa-search-plus"></i></a> </div>
              </div>
            </div>
          </div>
            @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Gallery End -->



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

<!-- Teacher Start -->
<section class="teachers-area-three teacher-wrap pt-100 pb-70  ">
  <div class="container">
    <div class="title center_title">
      <h1>Our Teachers</h1>
    </div>
    <div class="row">
        @foreach($teacher_details as $teacher_detail)
      <div class="col-lg-3 col-sm-6">
        <div class="single-teachers">
          <div class="teacherImg"> <img src="/images/{{ $teacher_detail->image }}" alt="Image">

          </div>
          <div class="teachers-content">
            <h3>{{ $teacher_detail->name }}</h3>
            <div class="designation">{{ $teacher_detail->subject }}</div>
          </div>
        </div>
      </div>
        @endforeach
    </div>
      <div class="readmore" style="text-align: center"><a href="/our-teachers">View All Teachers</a></div>
  </div>
</section>





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
