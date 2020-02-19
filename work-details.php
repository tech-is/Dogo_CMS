<?php
//uploadしたデータを取得する
$data = file_get_contents('store.json');
$array = json_decode($data);

$id = $_GET['id'];
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
<meta charset="utf-8">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Auro - Elegant, Minimal, Creative Bootstrap Template</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/flexslider.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/responsive.css">
<link rel="stylesheet" href="css/animate.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>

<body>

<!-- Header Section -->
<section class="tophead" role="tophead"> 
  <!-- Navigation Section -->
  <header id="header">
    <div class="header-content clearfix">
      <a class="logo" href="#">Auro</a>
        <nav class="navigation" role="navigation">
          <ul class="primary-nav">
            <li>
              <a href="./l#header-slider">Home</a>
            </li>
            <li>
              <a href="./#services">Our Services</a>
            </li>
            <li>
              <a href="./#portfolio">Our Portfolio</a>
            </li>
            <li>
              <a href="./#testimonials">Testimonials</a>
            </li>
            <li>
              <a href="./#contact">Contact</a>
            </li>
            <li>
              <a href="/upload.php">Upload</a>
            </li>
          </ul>
        </nav>
      <a href="#" class="nav-toggle">Menu<span></span></a> </div>
  </header>
  <!-- Navigation Section --> 
</section>
<!-- Header Section -->
<!-- work details section -->
<section id="work-detail" class="section work-detail">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8 work-detail-margin detail-image">
        <div class="work-image">
          <p> <img src="./images/upload/<?php print_r($array[$id]->img); ?>"></p>
          <!-- <p> <img src="images/portfolio/work-3.jpg"></p>
          <p> <img src="images/portfolio/work-5.jpg"></p> -->
        </div>
      </div>
      <div class="col-md-4 work-detail-margin detail-contentbox">
        <div class="detail-content">
          <h4><?php print_r($array[$id]->Title); ?></h4>
          <p><?php print_r($array[$id]->Text); ?></p>
          <!-- <p>Fusce dapibus, tellus ac cursus commodo, tortor mauris, ut fermentum massa justo sit amet risus. Maecenas sed diam eget risus varius blandit sit amet non magna. Nullam quis risus eget urna mollis ornare vel eu leo. condimentum nibh, ut fermentum massa justo sit amet risus. Maecenas sed diam eget risus varius blandit sit amet non magna. Nullam quis risus eget urna mollis ornare vel eu leo.</p> -->
          <a class="btn" href="#">Visit Site <i class="fa fa-long-arrow-right"></i></a> </div>
      </div>
    </div>
  </div>
</section>
<!-- work details section --> 

<!-- Testimonials section -->
<section id="testimonials" class="section testimonials no-padding">
  <div class="container-fluid">
    <div class="row no-gutter">
      <div class="flexslider">
        <ul class="slides">
          <li>
            <div class="col-md-12">
              <blockquote>
                <h1>"Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Donec sed odio dui. Phasellus non dolor nibh. Nullam elementum Aenean eu leo quam..." </h1>
                <p>Rene Brown, Open Window production</p>
              </blockquote>
            </div>
          </li>
          <li>
            <div class="col-md-12">
              <blockquote>
                <h1>"Cras dictum tellus dui, vitae sollicitudin ipsum. Phasellus non dolor nibh. Nullam elementum tellus pretium feugiat shasellus non dolor nibh. Nullam elementum tellus pretium feugiat." </h1>
                <p>Brain Rice, Lexix Private Limited.</p>
              </blockquote>
            </div>
          </li>
          <li>
            <div class="col-md-12">
              <blockquote>
                <h1>"Cras mattis consectetur purus sit amet fermentum. Donec sed odio dui. Aenean lacinia bibendum nulla sed consectetur...." </h1>
                <p>Andi Simond, Global Corporate Inc</p>
              </blockquote>
            </div>
          </li>
          <li>
            <div class="col-md-12">
              <blockquote>
                <h1>"Lorem ipsum dolor sit amet, consectetur adipiscing elitPhasellus non dolor nibh. Nullam elementum tellus pretium feugiat. Cras dictum tellus dui sollcitudin." </h1>
                <p>Kristy Gabbor, Martix Media</p>
              </blockquote>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>
<!-- Testimonials section --> 

<!-- footer section -->
<footer id="contact" class="footer">
  <div class="container-fluid">
    <div class="col-md-2 left">
      <h4>Office Location</h4>
      <p> Collins Street West Victoria 8007 Australia.</p>
    </div>
    <div class="col-md-2 left">
      <h4>Contact</h4>
      <p> Call: 612.269.8419 <br>
        Email : <a href="mailto:hello@agency.com"> hello@agency.com </a>
      </p>
    </div>
    <div class="col-md-2 left">
      <h4>Social presense</h4>
      <ul class="footer-share">
        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
      </ul>
    </div>
    <div class="col-md-6 right">
      <p>© 2015 All rights reserved. All Rights Reserved<br>
        Made with <i class="fa fa-heart pulse"></i> by <a href="http://www.designstub.com/">Designstub</a></p>
    </div>
  </div>
</footer>
<!-- footer section --> 

<!-- JS FILES --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.flexslider-min.js"></script> 
<script src="js/retina.min.js"></script> 
<script src="js/modernizr.js"></script> 
<script src="js/main.js"></script>
</body>
</html>