<?php
//uploadしたデータを取得する
$data = file_get_contents('store.json');
$array = json_decode($data);
$cnt = count($array) - 1;

//シャッフルのロジック
$array_num = range(0,$cnt);
shuffle($array_num);

?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
<meta charset="utf-8">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>道後浴衣図鑑 official Page</title>
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
			<a class="logo" href="#">Dogo YuKata Dict</a>
			<nav class="navigation" role="navigation">
				<ul class="primary-nav">
					<li><a href="#header-slider">Home</a></li>
					<li><a href="#services">Our Services</a></li>
					<li><a href="#portfolio">Gallary</a></li>
					<li><a href="#portfolio">Impression</a></li>
					<li><a href="#contact">Contact</a></li>
					<li><a href="upload.php">Upload</a></li>
				</ul>
			</nav>
			<a href="#" class="nav-toggle">Menu<span></span></a>
		</div>
	</header>
<!-- Navigation Section --> 
</section>
<!-- Header Section --> 
<!-- Slider Section -->
<section id="header-slider" class="section">
	<div id="myCarousel" class="carousel slide" data-ride="carousel"> 
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
		</ol>
		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">
		<div class="item active">
			<img src="images/slider/slider1_m.jpg" alt="Chania">
			<div class="carousel-caption">
				<h3>Dogokan</h3>
				<p></p>
			</div>
		</div>
		<div class="item">
			<img src="images/slider/slider2_m.jpg" alt="Chania">
			<div class="carousel-caption">
				<h3>Hanayuzuki</h3>
				<p>this is beautiful place at:2020.1.20</p>
			</div>
		</div>
		<div class="item">
			<img src="images/slider/slider3_m.jpg" alt="Chania">
			<div class="carousel-caption">
				<h3>Chaharu</h3>
				<p>this is beautiful place at:2020.1.20</p>
			</div>
		</div>
		<div class="item">
			<img src="images/slider/slider4_m.jpg" alt="Chania">
			<div class="carousel-caption">
				<h3>Yamatoya</h3>
				<p>this is beautiful place at:2020.1.20</p>
			</div>
		</div>
	</div>
	<!-- Controls --> 
	<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span></a> <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span></a></div>
</section>
<!-- Slider Section --> 
<!-- Service Section -->
<section id="services" class="section services">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6 col-sm-6">
				<div class="services-content">
					<h4>Photo Gallary <br>Japanese Yukata <br>from Dogo</h4>
					<p>This Site is uploaded to Traveler only Dogo's Yukata is very beautiful, please enjoy Yukata Gallary<br>
						※if you hope to upload this Service , please Confirm Dogo's Holel
					</p>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="services-content">
					<h5>Dogo Hotel Ranking</h5>
					<ul>
					<li><a href="https://www.yamatoyahonten.com/english/footer/">1.Yamatoya</a></li>
					<li><a href="http://www.dogokan.co.jp/en/">2.Dogokan</a></li>
					<li><a href="http://www.chaharu.com/en/">3.Chaharu</a></li>
					<li><a href="https://www.dogo-funaya.co.jp/">4.Funaya</a></li>
					<li><a href="https://www.dogoprince.co.jp/en/">5.Dogo PrinceHotel</a></li>
					</ul>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="services-content">
					<h5>List of Hotels you can Rent Yukata</h5>
					<ul>
					<li><a href="https://www.yamatoyahonten.com/english/footer/">Yamatoya</a></li>
					<li><a href="http://www.dogokan.co.jp/en/">Dogokan</a></li>
					<li><a href="https://www.dogo-funaya.co.jp/">Funaya</a></li>
					<li><a href="https://www.dogoprince.co.jp/en/">Dogo PrinceHotel</a></li>
					<li><a href="http://www.hotel-hanayuzuki.jp/en/">Hanayuduki</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Service Section --> 

<!-- portfolio grid section -->
<section id="portfolio" class="section portfolio">
	<div class="container-fluid">
	<div class='row'>
	<?php if($cnt == -1): ?>
	<p>画像はまだありません</p>
	<?php elseif($cnt < 10): ?>
		<?php for($i=0; $i <= $cnt; $i++): ?>
			<div class="col-sm-6 portfolio-item">
				<a href="work-details.php?id=<?php echo $array_num[$i] ?>" class="portfolio-link">
					<!-- ここから画像 -->
					<div class="caption">
						<div class="caption-content">
							<h3>
								<?php print_r($array[$array_num[$i]]->Title); ?>
							</h3>
							<h4>
								<?php print_r($array[$array_num[$i]]->RyokanName); ?>
							</h4>
						</div>
					</div>
					<img src="images/upload/<?php print_r($array[$array_num[$i]]->img); ?>" class="img-responsive" alt="">
				</a>
			</div>
		<?php endfor; ?> 
	<?php else: ?>
		<?php for($i=0; $i < 10; $i++): ?>
			<div class="col-sm-6 portfolio-item">
				<a href="work-details.php?id=<?php echo $array_num[$i] ?>" class="portfolio-link">
					<!-- ここから画像 -->
					<div class="caption">
						<div class="caption-content">
							<h3>
								<?php print_r($array[$array_num[$i]]->Title); ?>
							</h3>
							<h4>
								<?php print_r($array[$array_num[$i]]->RyokanName); ?>
							</h4>
						</div>
					</div>
					<img src="images/upload/<?php print_r($array[$array_num[$i]]->img); ?>" class="img-responsive" alt="">
				</a>
			</div>
		<?php endfor; ?> 
		<?php endif; ?>
	</div>
	</div>
</section>
<!-- portfolio grid section --> 

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
				<li>
					<a href="#"><i class="fa fa-facebook"></i></a>
				</li>
				<li>
					<a href="#"><i class="fa fa-twitter"></i></a>
				</li>
				<li>
					<a href="#"><i class="fa fa-linkedin"></i></a>
				</li>
				<li>
					<a href="#"><i class="fa fa-google-plus"></i></a>
				</li>
			</ul>
		</div>
		<div class="col-md-6 right">
			<p>© 2015 All rights reserved. All Rights Reserved<br>
				Made with <i class="fa fa-heart pulse"></i> by <a href="http://www.designstub.com/">Designstub</a>
			</p>
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