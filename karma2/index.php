<?php
session_start();

if (!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

require_once "config/config.php";
require_once "header.php";

style1();
nav_header();


?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>

</head>

<body>


	<!-- start banner Area -->
	<section class="banner-area">
		<div class="container">
			<div class="row fullscreen align-items-center justify-content-start">
				<div class="col-lg-12">
					<div class="active-banner-slider owl-carousel">
						<!-- single-slide -->
						<div class="row single-slide align-items-center d-flex">
							<div class="col-lg-5 col-md-6">
								<div class="banner-content">
									<h1>48 Sati Najbolje  <br>Kupovine!</h1>
									<p>Ostvarite velike popuste uz nasu clansku kartu, postanite deo zajednice.</p>
									<div class="add-bag d-flex align-items-center">
										<a class="add-btn" href="korpa.php"><span class="lnr lnr-cross"></span></a>
										<span class="add-text text-uppercase">Naruci proizvod</span>
									</div>
								</div>
							</div>
							<div class="col-lg-7">
								<div class="banner-img">
									<img class="img-fluid" src="img/banner/banner.png" alt="">
								</div>
							</div>
						</div>
						<!-- single-slide -->
						<div class="row single-slide">
							<div class="col-lg-5">
								<div class="banner-content">
									<h1>Velika Letnja <br>Akcija!</h1>
									<p>Velika letnja akcija kojom Vam omogucavamo da ustedite.
										Ustedite kupujuci kod nas.
									</p>
									<div class="add-bag d-flex align-items-center">
										<a class="add-btn" href="korpa.php"><span class="lnr lnr-cross"></span></a>
										<span class="add-text text-uppercase">Naruci proizvod</span>
									</div>
								</div>
							</div>
							<div class="col-lg-7">
								<div class="banner-img">
									<img class="img-fluid" src="img/banner/1.png" alt="">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!-- start features Area -->
	<section class="features-area section_gap">
		<div class="container">
			<div class="row features-inner">
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="img/features/f-icon1.png" alt="">
						</div>
						<h6>Besplatna Dostava</h6>
						<p>Besplatna dosatava na teriroriji Srbije.</p>
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="img/features/f-icon2.png" alt="">
						</div>
						<h6>Vracanje Posiljke</h6>
						<p>Mogucnost vracanja posiljke u koliko je ostecena.</p>
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="img/features/f-icon3.png" alt="">
						</div>
						<h6>24/7 Podrska</h6>
						<p>Za sva Vasa pitanja dostupni smo.</p>
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="img/features/f-icon4.png" alt="">
						</div>
						<h6>Bezbedno Placanje</h6>
						<p>Vasi podaci su sacuvani od strane treceg lica.</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end features Area -->

	<!-- Start category Area -->
	<section class="category-area">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8 col-md-12">
					<div class="row">
						<div class="col-lg-8 col-md-8">
							<div class="single-deal">
								<div class="overlay"></div>
								<img class="img-fluid w-100" src="img/category/lenovo.jpg" alt="">
								<a href="img/category/lenovo.jpg" class="img-pop-up" target="_blank">
									<div class="deal-details">
										<h6 class="deal-title">Vidi blize</h6>
									</div>
								</a>
							</div>
						</div>
						<div class="col-lg-4 col-md-4">
							<div class="single-deal">
								<div class="overlay"></div>
								<img class="img-fluid w-100" src="img/category/333.jpg" alt="">
								<a href="img/category/333.jpg" class="img-pop-up" target="_blank">
									<div class="deal-details">
										<h6 class="deal-title">Vidi blize</h6>
									</div>
								</a>
							</div>
						</div>
						<div class="col-lg-4 col-md-4">
							<div class="single-deal">
								<div class="overlay"></div>
								<img class="img-fluid w-100" src="img/category/555.jpg" alt="">
								<a href="img/category/555.jpg" class="img-pop-up" target="_blank">
									<div class="deal-details">
										<h6 class="deal-title">Vidi blize</h6>
									</div>
								</a>
							</div>
						</div>
						<div class="col-lg-8 col-md-8">
							<div class="single-deal">
								<div class="overlay"></div>
								<img class="img-fluid w-100" src="img/category/laptop.jpg" alt="">
								<a href="img/category/laptop.jpg" class="img-pop-up" target="_blank">
									<div class="deal-details">
										<h6 class="deal-title">Vidi blize</h6>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="single-deal">
						<div class="overlay"></div>
						<img class="img-fluid w-100" src="img/category/cccc.jpg" alt="">
						<a href="img/category/cccc.jpg" class="img-pop-up" target="_blank">
							<div class="deal-details">
								<h6 class="deal-title">Vidi blize</h6>
							</div>
						</a>
					</div>
				</div>

<h1>Brendovi sa kojima imamo ostvarnu saradnju.</h1>
			</div>

		</div>
		
	</section>
	

	
		
			
	<section class="brand-area section_gap">


		<div class="container">

			
			<div class="row">
				
				<a class="col single-img" href="https://www.asus.com">
					<img class="img-fluid d-block mx-auto" src="img/brand/11.png" alt="">
				</a>
				<a class="col single-img" href="https://www.dell.com">
					<img class="img-fluid d-block mx-auto" src="img/brand/22.png" alt="">
				</a>
				<a class="col single-img" href="https://www.apple.com">
					<img class="img-fluid d-block mx-auto" src="img/brand/33.png" alt="">
				</a>
				<a class="col single-img" href="https://www.lenovo.com">
					<img class="img-fluid d-block mx-auto" src="img/brand/44.png" alt="">
				</a>
				<a class="col single-img" href="https://www.hp.com">
					<img class="img-fluid d-block mx-auto" src="img/brand/55.png" alt="">
				</a>
			</div>
		</div>
	</section>
	<!-- End brand Area -->

	<!-- Start related-product Area -->
	<section class="related-product-area section_gap_bottom">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 text-center">
					<div class="section-title">
						<h1>Nedeljne Ponude!</h1>
						<p>Ovde mozete videti sve nedeljne ponude, koje imamo u nasoj firmi.</p>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-9">
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-6 mb-20">
							<div class="single-related-product d-flex">
								<a href="korpa.php"><img src="img/macbook.png" alt=""></a>
								<div class="desc">
									<a href="#" class="title">Laptop MacBook</a>
									<div class="price">
										<h6>$590.00</h6>
										<h6 class="l-through">$970.00</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6 mb-20">
							<div class="single-related-product d-flex">
								<a href="korpa.php"><img src="img/lenovo.png" alt=""></a>
								<div class="desc">
									<a href="#" class="title">Laptop Lenovo</a>
									<div class="price">
										<h6>$500.00</h6>
										<h6 class="l-through">$700.00</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6 mb-20">
							<div class="single-related-product d-flex">
								<a href="korpa.php"><img src="img/macbook.png" alt=""></a>
								<div class="desc">
									<a href="#" class="title">Laptop HP</a>
									<div class="price">
										<h6>$455.00</h6>
										<h6 class="l-through">$653.00</h6>
									</div>
								</div>
							</div>
						</div>
						
	</section>
	<!-- End related-product Area -->

	<!-- start footer Area -->
	<footer class="footer-area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-3  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>O nama </h6>
						<p>
							Nasa firma se bavi uvozom i prodajom laptop racunara na manje i vece kolicine u zavisnotsi od Vasih potreba.
						</p>
					</div>
				</div>
				<div class="col-lg-4  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>Pretplati se </h6>
						<p>Informisite se za sve nase popuste koje imamo.</p>
						<div class="" id="mc_embed_signup">

							<form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
							 method="get" class="form-inline">

								<div class="d-flex flex-row">

									<input class="form-control" name="EMAIL" placeholder="Unesite Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Unesite Email '"
									 required="" type="email">


									<button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
									<div style="position: absolute; left: -5000px;">
										<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
									</div>

									
								</div>
								<div class="info"></div>
							</form>
						</div>
					</div>
				</div>
				
				<div class="col-lg-2 col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>Pratite nas</h6>
						<p>Pratite nas na drustevnim mrezama.</p>
						<div class="footer-social d-flex align-items-center">
							<a href="https://www.facebook.com"><i class="fa fa-facebook"></i></a>
							<a href="https://twitter.com"><i class="fa fa-twitter"></i></a>
							<a href="https://www.instagram.com"><i class="fa fa-instagram"></i></a>
							<a href="https://www.youtube.com"><i class="fa fa-youtube"></i></a>
							
						</div>
					</div>
				</div>
			</div>
	
		</div>
	</footer>
	<!-- End footer Area -->

	<script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery.sticky.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/countdown.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="js/gmaps.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>