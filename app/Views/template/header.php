<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700|Chewy&display=swap" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?= base_url('css/bootstrap.css') ?>" type="text/css" />
	<link rel="stylesheet" href="<?= base_url('style.css') ?>" type="text/css" />
	<link rel="stylesheet" href="<?= base_url('css/dark.css') ?>" type="text/css" />

	<!-- Pet Demo Specific Stylesheet -->
	<link rel="stylesheet" href="<?= base_url('demos/pet/pet.css') ?>" type="text/css" />
	<link rel="stylesheet" href="<?= base_url('demos/pet/css/fonts.css') ?>" type="text/css" />

	<link rel="stylesheet" href="<?= base_url('css/font-icons.css') ?>" type="text/css" />
	<link rel="stylesheet" href="<?= base_url('css/animate.css') ?>" type="text/css" />
	<link rel="stylesheet" href="<?= base_url('css/magnific-popup.css') ?>" type="text/css" />

	<link rel="stylesheet" href="<?= base_url('css/custom.css') ?>" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="<?= base_url('css/colors.php?color=f0a540') ?>" type="text/css" />

	<!-- Document Title
	============================================= -->
	<title>Cat Care</title>

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->
		<header id="header" class="transparent-header dark" data-sticky-class="not-dark">
			<div id="header-wrap">
						<div id="primary-menu-trigger">
							<svg class="svg-trigger" viewBox="0 0 100 100"><path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path><path d="m 30,50 h 40"></path><path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path></svg>
						</div>

						<!-- Primary Navigation
						============================================= -->
						<nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco_navbar ftco-navbar-light" id="ftco-navbar">
	<div class="container d-flex align-items-center">
		<a class="navbar-brand" href="#">Cat Care</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="oi oi-menu"></span> Menu
		</button>
		<div class="collapse navbar-collapse" id="ftco-nav">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item"><a href="<?= base_url(); ?>" class="nav-link pl-0">Home</a></li>
				<li class="nav-item"><a href="<?= base_url(); ?>home/tentang" class="nav-link">About</a></li>
				<li class="nav-item"><a href="<?= base_url(); ?>home/servis" class="nav-link">Services</a></li>
				<li class="nav-item"><a href="<?= base_url(); ?>home/produk" class="nav-link">Product</a></li>

				<?php
							if(session('logged_in') == TRUE){
								echo '<ul class="menu-container">
								<li><a href="'.base_url("home/logout").'"><div>Logout</div></a></li>';
								if(session('level') != "reguler") {
									echo '<li class="nav-item"><a href="'.base_url("user/index").'"  class="nav-link">&nbsp;Management</a></li>';
								}
								echo '</ul>';
							}
							else{
								
								echo '<ul class="menu-container">
								<li><a href="'.base_url("home/login").'"><div>Login</div></a></li>
								</ul>';
							}
				?>
			</ul>
		</div>
	</div>
</nav>
						
				</div>
			</div>
			<div class="header-wrap-clone"></div>
		</header><!-- #header end -->