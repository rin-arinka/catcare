		<!-- Slider
		============================================= -->
		<section id="slider" class="slider-element min-vh-60 min-vh-md-100 include-header" style="background: url(<?= base_url()?>demos/pet/images/hero-image.jpg);) center right no-repeat; background-size: cover;">
			<div class="slider-inner">

				<div class="vertical-middle">
					<div class="container py-5">
						<div class="emphasis-title dark m-0">

							<h2 style="font-size: 40px; line-height: 1.4; font-weight: 600; text-shadow: 1px 1px 1px rgba(0,0,0,0.5);">Selamat datang di CatCare.com <br> Pemeliharaan Kucing Terpercaya!</h2><br>
							<p class="font-weight-light d-none d-md-block" style="font-size: 16px; opacity: .7;">CatCare.com adalah website yang didedikasikan untuk memberikan informasi lengkap <br> dan berguna mengenai pemeliharaan kucing. Kami percaya bahwa kucing adalah sahabat <br> yang setia dan memberikan kebahagiaan dalam kehidupan kita.</p>
						</div>
					</div>
				</div>

			</div>
		</section>

		<!-- Content
		============================================= -->
		<section id="content">
			<div class="content-wrap pt-0 clearfix">

				<div class="section m-0 clearfix" style="background-color: #eef2f5;">
					<div class="container clearfix">
						<?php if (session('id_user') != null) { ?>
							<h2 style="text-align: center">Hi, <?=session('nama')?><br>Selamat Datang Di Member <?=session('level')?></h2>
						<?php } ?>
						<div class="heading-block center border-bottom-0 bottommargin topmargin-sm mx-auto" style="max-width: 640px">
							<h3 class="nott font-secondary font-weight-normal" style="font-size: 36px;">Our Services</h3>
							<span>Kami menawarkan beberapa jasa kebutuhan dan layanan untuk kucing kesayangan anda</span>
						</div>

						<div class="row clearfix">
							<!-- Features colomns
							============================================= -->
							<div class="row clearfix">

								<?php foreach ($services as $s) : ?>
									<div class="col-lg-3 col-md-6 bottommargin-sm">
										<div class="feature-box media-box fbox-bg">
											<div class="fbox-media">
												<a data-toggle="modal" data-target="#myModal"><img src="/demos/pet/images/services/<?= $s->foto ?>" alt="Featured Box Image"></a>
											</div>
											<div class="fbox-content border-0">
												<h3 class="nott ls0 font-weight-bold"><?= $s->nama_service ?><span class="subtitle font-weight-light ls0"><?= $s->deskripsi_service ?></span></h3><br>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
		
							</div>
						</div>
					</div>
				</div>
<!-- 
				<div class="section mb-0 clearfix">
					<div class="heading-block center border-bottom-0 mb-0 mx-auto" style="max-width: 640px">
						<h3 class="nott font-secondary font-weight-normal" style="font-size: 36px;">Gallery</h3>
						<span>Berikut kumpulan gambar pelanggan yang telah mempercayakan hewan kesayangan mereka kepada kami</span>
					</div>
				</div>

				<div class="masonry-thumbs grid-container grid-6" data-big="3" data-lightbox="gallery">
					<a class="grid-item" href="demos/pet/images/gallery/1.jpg" data-lightbox="gallery-item">
						<div class="grid-inner">
							<img src="demos/pet/images/gallery/thumbs/1.jpg" alt="Gallery Thumb 1">
							<div class="bg-overlay">
								<div class="bg-overlay-content dark">
									<i class="icon-line-plus h4 mb-0" data-hover-animate="fadeIn"></i>
								</div>
								<div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
							</div>
						</div>
					</a>
					<a class="grid-item" href="demos/pet/images/gallery/2.webp" data-lightbox="gallery-item">
						<div class="grid-inner">
							<img src="demos/pet/images/gallery/thumbs/2.webp" alt="Gallery Thumb 2">
							<div class="bg-overlay">
								<div class="bg-overlay-content dark">
									<i class="icon-line-plus h4 mb-0" data-hover-animate="fadeIn"></i>
								</div>
								<div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
							</div>
						</div>
					</a>
					<a class="grid-item" href="demos/pet/images/gallery/3.jpg" data-lightbox="gallery-item">
						<div class="grid-inner">
							<img src="demos/pet/images/gallery/thumbs/3.jpg" alt="Gallery Thumb 3">
							<div class="bg-overlay">
								<div class="bg-overlay-content dark">
									<i class="icon-line-plus h4 mb-0" data-hover-animate="fadeIn"></i>
								</div>
								<div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
							</div>
						</div>
					</a>
					<a class="grid-item" href="demos/pet/images/gallery/4.jpg" data-lightbox="gallery-item">
						<div class="grid-inner">
							<img src="demos/pet/images/gallery/thumbs/4.jpg" alt="Gallery Thumb 4">
							<div class="bg-overlay">
								<div class="bg-overlay-content dark">
									<i class="icon-line-plus h4 mb-0" data-hover-animate="fadeIn"></i>
								</div>
								<div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
							</div>
						</div>
					</a>
					<a class="grid-item" href="demos/pet/images/gallery/5.jpg" data-lightbox="gallery-item">
						<div class="grid-inner">
							<img src="demos/pet/images/gallery/thumbs/5.jpg" alt="Gallery Thumb 5">
							<div class="bg-overlay">
								<div class="bg-overlay-content dark">
									<i class="icon-line-plus h4 mb-0" data-hover-animate="fadeIn"></i>
								</div>
								<div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
							</div>
						</div>
					</a>
					<a class="grid-item" href="demos/pet/images/gallery/6.webp" data-lightbox="gallery-item">
						<div class="grid-inner">
							<img src="demos/pet/images/gallery/thumbs/6.webp" alt="Gallery Thumb 6">
							<div class="bg-overlay">
								<div class="bg-overlay-content dark">
									<i class="icon-line-plus h4 mb-0" data-hover-animate="fadeIn"></i>
								</div>
								<div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
							</div>
						</div>
					</a>
					<a class="grid-item" href="demos/pet/images/gallery/7.jpg" data-lightbox="gallery-item">
						<div class="grid-inner">
							<img src="demos/pet/images/gallery/thumbs/7.jpg" alt="Gallery Thumb 7">
							<div class="bg-overlay">
								<div class="bg-overlay-content dark">
									<i class="icon-line-plus h4 mb-0" data-hover-animate="fadeIn"></i>
								</div>
								<div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
							</div>
						</div>
					</a>
					<a class="grid-item" href="demos/pet/images/gallery/8.jpg" data-lightbox="gallery-item">
						<div class="grid-inner">
							<img src="demos/pet/images/gallery/thumbs/8.jpg" alt="Gallery Thumb 8">
							<div class="bg-overlay">
								<div class="bg-overlay-content dark">
									<i class="icon-line-plus h4 mb-0" data-hover-animate="fadeIn"></i>
								</div>
								<div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
							</div>
						</div>
					</a>
					<a class="grid-item" href="demos/pet/images/gallery/9.jpg" data-lightbox="gallery-item">
						<div class="grid-inner">
							<img src="demos/pet/images/gallery/thumbs/9.jpg" alt="Gallery Thumb 9">
							<div class="bg-overlay">
								<div class="bg-overlay-content dark">
									<i class="icon-line-plus h4 mb-0" data-hover-animate="fadeIn"></i>
								</div>
								<div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
							</div>
						</div>
					</a>
					<a class="grid-item" href="demos/pet/images/gallery/10.jpg" data-lightbox="gallery-item">
						<div class="grid-inner">
							<img src="demos/pet/images/gallery/thumbs/10.jpg" alt="Gallery Thumb 10">
							<div class="bg-overlay">
								<div class="bg-overlay-content dark">
									<i class="icon-line-plus h4 mb-0" data-hover-animate="fadeIn"></i>
								</div>
								<div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
							</div>
						</div>
					</a>
					<a class="grid-item" href="demos/pet/images/gallery/11.webp" data-lightbox="gallery-item">
						<div class="grid-inner">
							<img src="demos/pet/images/gallery/thumbs/11.webp" alt="Gallery Thumb 11">
							<div class="bg-overlay">
								<div class="bg-overlay-content dark">
									<i class="icon-line-plus h4 mb-0" data-hover-animate="fadeIn"></i>
								</div>
								<div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
							</div>
						</div>
					</a>
					<a class="grid-item" href="demos/pet/images/gallery/12.jpg" data-lightbox="gallery-item">
						<div class="grid-inner">
							<img src="demos/pet/images/gallery/thumbs/12.jpg" alt="Gallery Thumb 12">
							<div class="bg-overlay">
								<div class="bg-overlay-content dark">
									<i class="icon-line-plus h4 mb-0" data-hover-animate="fadeIn"></i>
								</div>
								<div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
							</div>
						</div>
					</a>
					<a class="grid-item" href="demos/pet/images/gallery/13.jpg" data-lightbox="gallery-item">
						<div class="grid-inner">
							<img src="demos/pet/images/gallery/thumbs/13.jpg" alt="Gallery Thumb 13">
							<div class="bg-overlay">
								<div class="bg-overlay-content dark">
									<i class="icon-line-plus h4 mb-0" data-hover-animate="fadeIn"></i>
								</div>
								<div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
							</div>
						</div>
					</a>
					<a class="grid-item" href="demos/pet/images/gallery/14.jpg" data-lightbox="gallery-item">
						<div class="grid-inner">
							<img src="demos/pet/images/gallery/thumbs/14.jpg" alt="Gallery Thumb 14">
							<div class="bg-overlay">
								<div class="bg-overlay-content dark">
									<i class="icon-line-plus h4 mb-0" data-hover-animate="fadeIn"></i>
								</div>
								<div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
							</div>
						</div>
					</a>
					<a class="grid-item" href="demos/pet/images/gallery/15.gif" data-lightbox="gallery-item">
						<div class="grid-inner">
							<img src="demos/pet/images/gallery/thumbs/15.gif" alt="Gallery Thumb 15">
							<div class="bg-overlay">
								<div class="bg-overlay-content dark">
									<i class="icon-line-plus h4 mb-0" data-hover-animate="fadeIn"></i>
								</div>
								<div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
							</div>
						</div>
					</a>
				</div>

				<div class="section m-0 bg-transparent clearfix">
					<div class="container clearfix">
						<div class="heading-block center border-bottom-0 mx-auto" style="max-width: 640px">
							<h3 class="nott font-secondary font-weight-normal" style="font-size: 36px;">Our Products</h3>
							<span>Kami akan menawarkan solusi dan rekomendasi produk yang tepat dan berkualitas sehingga membuat hewan peliharaan Anda lebih sehat dan terawat</span>
						</div>
						<div class="row topmargin clearfix">
							<div class="col-lg-5 d-none d-lg-block">
								<img src="demos/pet/images/others/1.png" alt="Dogs">
							</div>
							<div class="col-lg-7 col-md-12">
								<div class="row clearfix">
									<div class="col-md-4 col-6">
										<div class="product">
											<div class="product-image shadow-none">
												<a href="#"><img src="demos/pet/images/products/1.jpg" alt="High-Heel Girl's Sandals"></a>
											</div>
											<div class="product-desc center">
												<div class="product-title"><h3><a href="#">Makanan Kucing</a></h3></div>
												<div class="product-price"><ins>Rp. 10.000,-</ins></div>
											</div>
										</div>
									</div>
									<div class="col-md-4 col-6">
										<div class="product">
											<div class="product-image shadow-none">
												<a href="#"><img src="demos/pet/images/products/2.png" alt="High-Heel Girl's Sandals"></a>
											</div>
											<div class="product-desc center">
												<div class="product-title"><h3><a href="#">Shampo Kucing</a></h3></div>
												<div class="product-price"><ins>Rp. 27.500,-</ins></div>
											</div>
										</div>
									</div>
									<div class="col-md-4 col-6">
										<div class="product">
											<div class="product-image shadow-none">
												<a href="#"><img src="demos/pet/images/products/3.jpg" alt="High-Heel Girl's Sandals"></a>
											</div>
											<div class="product-desc center">
												<div class="product-title"><h3><a href="#">Antiseptic Kucing</a></h3></div>
												<div class="product-price"><ins>Rp. 35.000,-</ins></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

		</section> -->