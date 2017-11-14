<?php
include("auth.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Home-Page</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link rel="stylesheet" type="text/css" media="screen" href="home/css/reset.css">
<link rel="stylesheet" type="text/css" media="screen" href="home/css/style.css">
<link rel="stylesheet" type="text/css" media="screen" href="home/css/grid_12.css">
<link rel="stylesheet" type="text/css" media="screen" href="home/css/slider.css">
<link rel="stylesheet" type="text/css" media="screen" href="home/css/jqtransform.css">
<script src="home/js/jquery-1.7.min.js"></script>
<script src="home/js/jquery.easing.1.3.js"></script>
<script src="home/js/cufon-yui.js"></script>
<script src="home/js/vegur_400.font.js"></script>
<script src="home/js/Vegur_bold_700.font.js"></script>
<script src="home/js/cufon-replace.js"></script>
<script src="home/js/tms-0.4.x.js"></script>
<script src="home/js/jquery.jqtransform.js"></script>
<script src="home/js/FF-cash.js"></script>
<script>
$(document)
    .ready(function () {
    $('.form-1')
        .jqTransform();
    $('.slider')
        ._TMS({
        show: 0,
        pauseOnHover: true,
        prevBu: '.prev',
        nextBu: '.next',
        playBu: false,
        duration: 1000,
        preset: 'fade',
        pagination: true,
        pagNums: false,
        slideshow: 7000,
        numStatus: false,
        banners: false,
        waitBannerAnimation: false,
        progressBar: false
    })
});
</script>
<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="css/ie.css">
<![endif]-->
</head>
<body>
<div class="main">
  <!--==============================header=================================-->
  <header>
    <div>
      <div class="social-icons"> <span>WELCOME : <?php echo $_SESSION['login_user']; ?>!</span></div>
      <div id="slide">
        <div class="slider">
          <ul class="items">
            <li><img src="home/images/slider3.jpeg" ></li>
            <li><img src="home/images/slider2.jpg" ></li>
            <li><img src="home/images/slider1.jpg"></li>
          </ul>
        </div>
        <a href="#" class="prev"></a><a href="#" class="next"></a>
       </div>
      <nav>
        <ul class="menu">
          <li class="current"><a href="booking.php">Home</a></li>
          <li><a href="bookingTicket.php">Book Bus</a></li>
          <li><a href="hotel_booking.html">Book Hotel</a></li>
          <li><a href="contacts.php">Contact</a></li>
          <li><a href="services.php">Services</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <!--==============================content================================-->
  <section id="content">
    <div class="container_12">
      <div class="grid_12">
        <h2 class="top-1 p3">Welcome message!</h2>
        <p class="p2">Real Estate is one of free website templates created by TemplateMonster.com team. This website template is optimized for 1280X1024 screen resolution. It is also XHTML &amp; CSS valid.</p>
        <p class="line-1">Download the basic package of this Real Estate Template (without PSD source) that is available for anyone without registration. If you need PSD source files, please go to the template download page at TemplateMonster to leave the e-mail address that you want the free template ZIP package to be delivered to.</p>
      </div>
      <div class="clear"></div>
    </div>
  </section>
</div>
<!--==============================footer=================================-->
<footer>
  <p>© 2017 Ankush and Arbaaz</p>
</footer>
<script>Cufon.now();</script>
</body>
</html>
