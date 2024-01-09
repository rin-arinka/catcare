

		<!-- Content
		============================================= -->
		<section id="content">
			<div class="content-wrap pt-0 clearfix">

				<div class="section m-0 clearfix" style="background-color: #eef2f5;">
					<div class="container clearfix">

						<div class="heading-block center border-bottom-0 bottommargin topmargin-sm mx-auto" style="max-width: 640px">
							<h3 class="nott font-secondary font-weight-normal" style="font-size: 36px;">Midtrans Transaction</h3>
						</div>
						<ul>
							<?php foreach ($transactions as $transaction): ?>
								<li>
									<?php
										$transactionData = json_decode(json_encode($transaction), true);

										// $customerDetails = isset($transactionData['customer_details']) ? $transactionData['customer_details'] : null;
                						// $customerEmail = isset($customerDetails['email']) ? $customerDetails['email'] : '';

										$transactionTime = isset($transactionData['transaction_time']) ? $transactionData['transaction_time'] : '';
										$grossAmount = isset($transactionData['gross_amount']) ? $transactionData['gross_amount'] : '';
										$transactionStatus = isset($transactionData['transaction_status']) ? $transactionData['transaction_status'] : '';

										echo "Tanggal Transaksi: " . date('Y-m-d H:i:s', strtotime($transactionTime)) . "<br>";
										echo "Jumlah Pembayaran: " . $grossAmount . "<br>";
										echo "Status Transaksi: " . $transactionStatus . "<br>";
										// echo "Customer Email: " . $customerEmail . "<br>";
									?>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>