<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
		rel="stylesheet">

	<title>Sunfloe Library</title>

	<!-- Bootstrap core CSS -->
	<link href="<?=base_url('assets/cyborg/')?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


	<!-- Additional CSS Files -->
	<link rel="stylesheet" href="<?=base_url('assets/cyborg/')?>assets/css/fontawesome.css">
	<link rel="stylesheet" href="<?=base_url('assets/cyborg/')?>assets/css/templatemo-cyborg-gaming.css">
	<link rel="stylesheet" href="<?=base_url('assets/cyborg/')?>assets/css/owl.css">
	<link rel="stylesheet" href="<?=base_url('assets/cyborg/')?>assets/css/animate.css">
	<link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
	<!--

TemplateMo 579 Cyborg Gaming

https://templatemo.com/tm-579-cyborg-gaming

-->
</head>

<body>

	<!-- ***** Preloader Start ***** -->
	<div id="js-preloader" class="js-preloader">
		<div class="preloader-inner">
			<span class="dot"></span>
			<div class="dots">
				<span></span>
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!-- ***** Preloader End ***** -->

	<!-- ***** Header Area Start ***** -->
	<header class="header-area header-sticky">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<nav class="main-nav">
						<!-- ***** Logo Start ***** -->
						
						<!-- ***** Logo End ***** -->
						<!-- ***** Search End ***** -->
						<div class="">
						<!-- <form action="<?= base_url('beranda')?>" method="post">
								<input type="text" placeholder="Cari Buku" id='searchText' name="keyword"
									onkeypress="handle" <i class="fa fa-search" autocomplete="off" ></i>/>
									
								<input class="btn btn-secondary" type="submit" name="submit"></input>
								
							</form>
						</div> -->

						<!-- <form action="<?= base_url('home')?>" method="post">
							<div class="input-group mb-4 ">
								<input type="text" class="form-control" placeholder="Cari Buku" autocomplete="off" autofocus
									name="keyword">
								<input class="btn btn-secondary" type="submit" name="submit"></input>
							</div>
						</form> -->
						<!-- ***** Search End ***** -->
						<!-- ***** Menu Start ***** -->
						<!-- <ul class="nav">
							<li><a href="<?=base_url()?>" class="active">Home</a></li>
							
						</ul>
						<a class='menu-trigger'>
							<span>Menu</span>
						</a> -->
						<!-- ***** Menu End ***** -->
					</nav>
				</div>
			</div>
		</div>
	</header>
	<!-- ***** Header Area End ***** -->

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="page-content">

					<!-- ***** Banner Start ***** -->
					

					<div class="main-bannerku">
						<div class="row mb-2">
							<div class="col-lg-7">
								<div class="header-text">
									<h6>Selamat Datang !</h6>
                  					     <h4><em>Lihat  </em>Daftar Buku yang Tersedia</h4>
									<div class="main-button">
										<a href="">Browse Now</a>
									</div>
								</div>
							</div>
						</div>
					</div>

				
					<!-- ***** Banner End ***** -->

					<!-- ***** Most Popular Start ***** -->
					<div class="most-popular">
						<div class="row ">
							<div class="col-lg-12">
								
								</div>
								<div class="row">
								<?php foreach ($collection as $oo) { ?>
									<div class="col-lg-3 col-sm-6">
										<div class="item">
										
											<img src="<?= base_url('assets/upload/cover/'.$oo['cover'])?>">
											<h4><?=$oo['book_title']?><br><span><?=$oo['name']?></span></h4>
											<span>Penempatan Buku : <?=$oo['nomor_rak']?></span>
											<p><i class=""></i> #<?=$oo['name_category']?></p>
											<ul>
												
												
											</ul>
											
										</div>
									</div>
								<?php } ?>
								
									<div class="col-lg-12">
										<div class="main-button">
											<a href="<?=base_url()?>">---</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- ***** Most Popular End ***** -->

					<!-- ***** Gaming Library Start ***** -->
				

	<footer>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<p>Copyright © <a href="#">Perpustakaan</a> Company. All rights reserved.

						<br>Design: <a href="https://templatemo.com" target="_blank"
							title="free CSS templates">TemplateMo</a> Distributed By <a href="https://themewagon.com"
							target="_blank">ThemeWagon</a></p>
				</div>
			</div>
		</div>
	</footer>


	<!-- Scripts -->
	<!-- Bootstrap core JavaScript -->
	<script src="<?=base_url('assets/cyborg/')?>vendor/jquery/jquery.min.js"></script>
	<script src="<?=base_url('assets/cyborg/')?>vendor/bootstrap/js/bootstrap.min.js"></script>

	<script src="<?=base_url('assets/cyborg/')?>assets/js/isotope.min.js"></script>
	<script src="<?=base_url('assets/cyborg/')?>assets/js/owl-carousel.js"></script>
	<script src="<?=base_url('assets/cyborg/')?>assets/js/tabs.js"></script>
	<script src="<?=base_url('assets/cyborg/')?>assets/js/popup.js"></script>
	<script src="<?=base_url('assets/cyborg/')?>assets/js/custom.js"></script>


</body>

</html>
