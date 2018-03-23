<script type="text/javascript" src="<?php echo base_url('assetsfront/js/countdown_va.js'); ?>"></script>
<section class="section section-success">
	<div class="container">
		<div class="margin-left-min15px margin-right-min15px">
			<div class="col-md-12 text-center">
				<div class="box-virtual-info">
					<div class="col-md-2"><img src="<?php echo base_url('assetsfront/images/icon/virtual-secure.png'); ?>"></div>
					<div class="col-md-10">
						<ul>
							<li>Selalu waspada terhadap pihak tidak bertanggung jawab</li>
							<li>Jangan lakukan pembayaran dengan nominal yang berbeda dengan yang tertera pada tagihan kamu.</li>
							<li>Jangan lakukan transfer di luar nomor rekening atas nama Ibid.</li>
						</ul>
					</div>
				</div>
				<div class="box-virtual-account">
					<h2>Pembayaran Via Transfer Virtual Account</h2>
					<div class="box-v-count col-md-6">
						<p>Batas Waktu Pembayaran</p>
						<span><div id="divotp">Memuat Waktu...</div></span>
					</div>
					<div class="box-v col-md-6">
						<p>Nomor tagihan:</p>
						<span class="purple"><?php echo @$_SESSION['userdata']['kodeTransaksi']; unset($_SESSION['userdata']['kodeTransaksi']); ?></span>
						<p>Jumlah Tagihan</p>
						<span>Rp <?php echo number_format(@$_SESSION['userdata']['nilaiTransaksi']); unset($_SESSION['userdata']['nilaiTransaksi']); ?>,-</span>
						<p>Nomor Rekening Virtual Account Mandiri:</p>
						<span><?php echo @$_SESSION['userdata']['thisVa']; unset($_SESSION['userdata']['thisVa']); ?></span>
					</div>
				</div>

				<div class="box-virtual-payment">
					<h2>Petunjuk pembayaran melalui Transfer Virtual Account Mandiri</h2>
					<div class="box-carousel-p">
						<div class="border-top panel panel-default panel-custom">
							<div class="panel-body no-padding accordion-list-on-panel">
								<div class="panel-group no-margin" id="accordionMandiri">
									<div class="panel panel-default">
										<a href="#collapse-rules-mandiri1" data-toggle="collapse" class="collapsed" data-parent="#accordionMandiri" aria-expanded="false">
											<div class="panel-heading">
												<h4 class="panel-title expand">
													<div class="right-arrow pull-right"></div> Pembayaran Mandiri Virtual Account dengan ATM bank Mandiri
												</h4>
											</div>
										</a>
										<div id="collapse-rules-mandiri1" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
											<div class="panel-body bg-grey">
												<p>
													<ul>
														<li>Masukkan kartu ATM dan Pin</li>
														<li>Pilih Menu "Bayar/Beli"</li>
														<li>Pilih menu "Lainnya", hingga menemukan menu "Multipayment"</li>
														<li>Masukkan kode biller IBID XXXXX, lalu pilih Benar</li>
														<li>Masukkan "Nomor Virtual Account" IBID, lalu pilih tombol Benar</li>
														<li>Masukkan Angka "1" untuk memilih tagihan, lalu pilih tombol Ya</li>
														<li>Akan muncul konfirmasi pembayaran, lalu pilih tombol Ya</li>
														<li>Simpan struk sebagai bukti pembayaran anda</li>
													</ul>
												</p>
											</div>
										</div>
									</div>
									<div class="panel panel-default">
										<a href="#collapse-rules-mandiri2" data-toggle="collapse" class="collapsed" data-parent="#accordionMandiri" aria-expanded="false">
											<div class="panel-heading">
												<h4 class="panel-title expand">
													<div class="right-arrow pull-right"></div> Pembayaran Mandiri Virtual Account dengan Internet Banking atau Mandiri Online
												</h4>
											</div>
										</a>
										<div id="collapse-rules-mandiri2" class="panel-collapse collapse" aria-expanded="false">
											<div class="panel-body bg-grey">
												<p>
													<ul>
														<li>Login Mandiri Online dengan memasukkan username dan password</li>
														<li>Pilih menu "Pembayaran"</li>
														<li>Pilih menu "Multipayment"</li>
														<li>Pilih penyedia jasa "IBID"</li>
														<li>Masukkan "Nomor Virtual Account" dan "Nominal" yang akan dibabayarkan , lalu pilih Lanjut</li>
														<li>setelah muncul tagihan, pilih Konfirmasi</li>
														<li>Masukkan PIN/kode token</li>
														<li>Transaksi selesai, simpan bukti bayar Anda</li>
													</ul>
												</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<h3>Jika Ada kendala, silakan langsung Hubungi Ibid</h3>
				</div>
			</div>
		</div>
		
	</div>
</section>