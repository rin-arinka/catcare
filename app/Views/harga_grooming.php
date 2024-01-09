
					<div class="container clearfix">

						<div class="heading-block center border-bottom-0 bottommargin topmargin-sm mx-auto" style="max-width: 640px">
							<h3 class="nott font-secondary font-weight-normal" style="font-size: 36px;">Biaya Grooming Cat Care</h3>
							<span>Berikut macam-macam layanan grooming yang kami sediakan. <br>Jangan lewatkan harga promo yang masih berlangsung!</span>
						</div>

						<div class="row clearfix" >
							<!-- Features colomns
							============================================= -->
							<div class="row clearfix">

								<?php foreach ($harga_grooming as $h) : ?>
									<div class="col-lg-3 col-md-6 bottommargin-sm" >
										<div class="feature-box media-box fbox-bg" >
											<div class="fbox-content border-0" style="background-color: #eef2f5;">
												<h3 class="nott ls0 font-weight-bold"><?= $h->jenis_grooming ?><p class="subtitle font-weight-bold ls0"><?= $h->deskripsi_jenis ?></p></h3><br>
                                                <h3 class="nott">Harga Normal : Rp<?= $h->harga_normal ?></br></br><span class="font-weight-bold ls0">HARGA PROMO : Rp<?= $h->harga_promo ?></span></h3><br>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
		
							</div>
						</div>
					</div>
				</div>
					</div>