		<!-- Content
		============================================= -->
		<section id="content">
			<div class="content-wrap pt-0 clearfix">

				<div class="section m-0 clearfix" style="background-color: #eef2f5;">
					<div class="container clearfix">

						<div class="heading-block center border-bottom-0 bottommargin topmargin-sm mx-auto" style="max-width: 640px">
							<h3 class="nott font-secondary font-weight-normal" style="font-size: 36px;">Cat Food</h3>
							<span>Kami menawarkan beberapa produk makanan untuk kucing kesayangan anda</span>
						</div>

							<div class="row clearfix">
								<!-- Features colomns
								============================================= -->
								<div class="row clearfix">

									<?php foreach ($food as $s) : ?>
										<form action="<?= base_url('MidtransController') ?>" method="post" >
												<input type="hidden" name="jenis" value="makanan"/>
												<input type="hidden" name="id_m" value="<?= $s->id_makanan ?>"/>
												<input type="hidden" name="nama" value="<?= $s->nama_makanan ?>"/>
												<input type="hidden" name="harga" value="<?= $s->harga ?>"/>
												<div class="col-lg-12 col-md-6 bottommargin-sm">
													<div class="feature-box media-box fbox-bg">
														<div class="fbox-media">
															<a data-toggle="modal" data-target="#myModal"><img src="/demos/pet/images/products/<?= $s->foto ?>" style="height: 220px; width: 200px" alt="Featured Box Image"></a>
														</div>
														<div class="fbox-content border-0">
															<h3 class="nott ls0 font-weight-bold">
																<?= $s->nama_makanan ?>
																<span class="subtitle font-weight-light ls0" style="color: black;"><b><?= 'Rp ' . number_format($s->harga, 0, ',', '.') ?></b></span>
																<span class="subtitle font-weight-light ls0" style="color: black;">Stok : <?= $s->stok ?></span>
															</h3><br>
														</div>
														<?php if(session('logged_in') == TRUE){ ?>
															<?php if($s->stok < 1){ ?>
																<button type="submit" class="btn btn-primary" disabled>Stok Habis</button>
															<?php } else { ?>
																<button type="submit" class="btn btn-primary">Beli</button>
															<?php } ?>
														<?php } ?>
													</div>
												</div>
											</form>
									<?php endforeach; ?>
								</div>
							</div>
					</div>
				</div>
