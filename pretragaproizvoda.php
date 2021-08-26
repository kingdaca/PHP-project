<?php
$connection = mysqli_connect('localhost','root','','it210Proba');
$output='';
if(isset($_POST['search'])){
    $searchkey= $_POST['search'];
    $searchkey=preg_replace("#[^0-9a-z]#i", "", $searchkey);

    $query = mysqli_query($connection,"SELECT * FROM tbl_product WHERE id LIKE '%$searchkey%' OR name LIKE '%$searchkey%'") or die("Could not search!");
    $count = mysqli_num_rows($query);

    if($count == 0){
        $output="Nema rezultata";
    }
    else{
        while($row=mysqli_fetch_array($query)){
            $id=$row['id'];
            $name=$row['name'];

            $output .='<div> ID je:  '.$id.' ---> Ime je: '.$name.' <br></div>' ;


        }
    }
}
?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Karma Shop</title>

	<!--
            CSS
            ============================================= -->
	<link rel="stylesheet" href="css/linearicons.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/main.css">
</head>

<body id="category">

	<!-- Start Header Area -->
	<header class="header_area sticky-header">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="index.php"><img src="img/logo.png" alt=""></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
							<li class="nav-item active"><a class="nav-link" href="index.php">Pocetna</a></li>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Kupovina</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="korpa.php">Naruci porizvod</a></li>
									<li class="nav-item"><a class="nav-link" href="pretragaproizvoda.php">Pretrazi Proizvode</a></li>
									<li class="nav-item"><a class="nav-link" href="single-product.html">Product Details</a></li>
									<li class="nav-item"><a class="nav-link" href="checkout.html">Product Checkout</a></li>
									<li class="nav-item"><a class="nav-link" href="cart.html">Shopping Cart</a></li>
									<li class="nav-item"><a class="nav-link" href="confirmation.html">Confirmation</a></li>
								</ul>
							</li>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Blog</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>
									<li class="nav-item"><a class="nav-link" href="single-blog.html">Blog Details</a></li>
								</ul>
							</li>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Stranice</a>
								  <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="login.php">Prijavi se</a></li>
                  <li class="nav-item"><a class="nav-link" href="logout.php">Odjavi se </a></li>
                  <li class="nav-item"><a class="nav-link" href="index.php">Pocetna</a></li>
                  <li class="nav-item"><a class="nav-link" href="korpa.php">Kupovina</a></li>
                  <li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>
                  <li class="nav-item"><a class="nav-link" href="kontakt.php">Kontakt</a></li>
                </ul>
              </li>
              <li class="nav-item"><a class="nav-link" href="kontakt.php">Kontakt</a></li>
            </ul>
						
					</div>
				</div>
			</nav>
		</div>


		
	</header>
	<!-- End Header Area -->

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Pretraga proizvoda</h1>
					<nav class="d-flex align-items-center">
						<a href="index.php">Pocetna<span class="lnr lnr-arrow-right"></span></a>
						<a href="korpa.php">Kupovina<span class="lnr lnr-arrow-right"></span></a>
						<a href="pretragaproizvoda.php">Pretraga Proizvoda</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->
	<center>




<body>
<h1>Pretraga proizvoda po imenu i ID-u.</h1>
	<form action="pretragaproizvoda.php" method="post">
	<input type="text" name="search" placeholder="Pretraga proizvoda"/>
	<input type="submit" value="Pretrazi"/>
	</form>
	<?php print  ("$output");?>
</body>




</html>


			
				
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

	
	



	<script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery.sticky.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="js/gmaps.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>