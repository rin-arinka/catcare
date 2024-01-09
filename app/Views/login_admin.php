<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?= base_url(); ?>css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="<?= base_url(); ?>style.css" type="text/css" />
	<link rel="stylesheet" href="<?= base_url(); ?>css/dark.css" type="text/css" />
	<link rel="stylesheet" href="<?= base_url(); ?>css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="<?= base_url(); ?>css/animate.css" type="text/css" />
	<link rel="stylesheet" href="<?= base_url(); ?>css/magnific-popup.css" type="text/css" />

	<link rel="stylesheet" href="<?= base_url(); ?>css/custom.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Document Title
	============================================= -->
	<title>Login | Cat Care</title>

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Content
		============================================= -->
		<section id="content">
			<div class="content-wrap py-0">

				<div class="section p-0 m-0 h-100 position-absolute" style="background: url(<?= base_url('demos/pet/images/hero-image.jpg'); ?>) center center no-repeat; background-size: cover;"></div>

				<div class="section bg-transparent min-vh-100 p-0 m-0">
					<div class="vertical-middle">
						<div class="container-fluid py-5 mx-auto">
							<div class="center">
							</div>

							<div class="card mx-auto rounded-0 border-0" style="max-width: 400px; background-color: rgba(255,255,255,0.93);">
								<div class="card-body" style="padding: 40px;">
									<form id="login-form" name="login-form" class="mb-0" action="<?= base_url('panel/masuk'); ?>" method="post">
										<h3>Login to your Account</h3>

										<?php if (session()->getFlashKeys()): ?>
												<?php echo session()->getFlashdata('salah'); ?>
												<?php echo session()->getFlashdata('salahpw'); ?>
												<?php echo session()->getFlashdata('berhasilbuatakun'); ?>
												<?php echo session()->getFlashdata('cologindulu'); ?>
												<?php echo session()->getFlashdata('belumlogin'); ?>
										<?php endif; ?>

										<div class="row">
											<div class="col-12 form-group">
												<label for="login-form-username">Username:</label>
												<input type="text" id="login-form-username" name="username" value="" class="form-control not-dark" />
											</div>

											<div class="col-12 form-group">
												<label for="login-form-password">Password:</label>
												<input type="password" id="login-form-password" name="password" value="" class="form-control not-dark" />
											</div>

											<div class="col-12 form-group">
												<input type="submit" class="button button-3d button-black m-0" id="login-form-submit" name="submit" value="Login">
												<a href="<?= base_url('panel/register'); ?>" class="float-right">Belum Punya Akun?</a>
											</div>
										</div>
									</form>
								</div>
							</div>

							<div class="text-center dark mt-3"><small>Copyrights &copy; All Rights Reserved by Cat Care Inc.</small></div>
						</div>
					</div>
				</div>

			</div>
		</section><!-- #content end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- JavaScripts
	============================================= -->
	<script src="<?= base_url() ?>js/jquery.js"></script>
	<script src="<?= base_url() ?>js/plugins.min.js"></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="<?= base_url() ?>js/functions.js"></script>

</body>
</html>