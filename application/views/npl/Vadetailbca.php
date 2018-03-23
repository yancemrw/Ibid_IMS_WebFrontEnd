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
						<p>Nomor Rekening Virtual Account BCA:</p>
						<span><?php echo @$_SESSION['userdata']['thisVa']; unset($_SESSION['userdata']['thisVa']); ?></span>
					</div>
				</div>

				<div class="box-virtual-payment">
					<h2>Petunjuk pembayaran melalui Transfer Virtual Account BCA</h2>
					<div class="box-carousel-p">
						<div class="border-top panel panel-default panel-custom">
							<div class="panel-body no-padding accordion-list-on-panel">
								<div class="panel-group no-margin" id="accordion">
									<div class="panel panel-default">
										<a href="#collapse-rules1" data-toggle="collapse" class="collapsed" data-parent="#accordion" aria-expanded="false">
											<div class="panel-heading">
												<h4 class="panel-title expand">
													<div class="right-arrow pull-right"></div> Pembayaran BCA Virtual Account dengan ATM BCA
												</h4>
											</div>
										</a>
										<div id="collapse-rules1" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
											<div class="panel-body bg-grey">
												<p>
													<ul>
														<li>Masukkan Kartu ATM BCA & PIN</li>
														<li>Pilih menu Transaksi Lainnya --> Transfer --> ke Rekening BCA Virtual Account</li>
														<li>Masukkan nomor Virtual Account yang dikirimkan IBID</li>
														<li>Di halaman konfirmasi, pastikan informasi detail pembayaran seperti nomor Virtual Account, jumlah NPL, dan total tagihan sudah sesuai</li>
														<li>Masukkan Jumlah Transfer sesuai dengan total tagihan</li>
														<li>Ikuti instruksi untuk menyelesaikan transaksi</li>
														<li>Simpan struk transaksi sebagai bukti pembayaran</li>
													</ul>
												</p>
											</div>
										</div>
									</div>
									<div class="panel panel-default">
										<a href="#collapse-rules2" data-toggle="collapse" class="collapsed" data-parent="#accordion" aria-expanded="false">
											<div class="panel-heading">
												<h4 class="panel-title expand">
													<div class="right-arrow pull-right"></div> Pembayaran BCA Virtual Account dengan mobile banking BCA (m-BCA)
												</h4>
											</div>
										</a>
										<div id="collapse-rules2" class="panel-collapse collapse" aria-expanded="false">
											<div class="panel-body bg-grey">
												<p>
													<ul>
														<li>Lakukan login m-BCA pada aplikasi BCA Mobile di gawai Anda</li>
														<li>Pilih m-Transfer --> BCA Virtual Account</li>
														<li>Pilih dari "IBID" dari Daftar Transfer, atau masukkan nomor Virtual Account (jika baru pertama kali melakukan transaksi VA bersama IBID)</li>
														<li>Periksa detail informasi pembayaran seperti nama dan total tagihan</li>
														<li>Klik "bayar" dan masukkan pin m-BCA</li>
														<li>Pembayaran selesai. Simpan notifikasi yang muncul sebagai bukti pembayaran</li>
													</ul>
												</p>
											</div>
										</div>
									</div>
									<div class="panel panel-default">
										<a href="#collapse-rules3" data-toggle="collapse" class="collapsed" data-parent="#accordion" aria-expanded="false">
											<div class="panel-heading">
												<h4 class="panel-title expand">
													<div class="right-arrow pull-right"></div> Pembayaran BCA Virtual Account dengan KlikBCA Individual
												</h4>
											</div>
										</a>
										<div id="collapse-rules3" class="panel-collapse collapse" aria-expanded="false">
											<div class="panel-body bg-grey">
												<p>
													<ul>
														<li>Lakukan login pada aplikasi KlikBCA Individual (https://ibank.klikbca.com/)</li>
														<li>Masukkan User ID dan PIN</li>
														<li>Pilih Transfer Dana --> Transfer ke BCA Virtual Account Masukkan nomor BCA Virtual Account</li>
														<li>Masukkan jumlah yang ingin dibayarkan</li>
														<li>Validasi pembayaran</li>
														<li>Cetak nomor referensi sebagai bukti transaksi Anda</li>
													</ul>
												</p>
											</div>
										</div>
									</div>
									<div class="panel panel-default">
										<a href="#collapse-rules4" data-toggle="collapse" class="collapsed" data-parent="#accordion" aria-expanded="false">
											<div class="panel-heading">
												<h4 class="panel-title expand">
													<div class="right-arrow pull-right"></div> Pembayaran BCA Virtual Account di Kantor Bank BCA
												</h4>
											</div>
										</a>
										<div id="collapse-rules4" class="panel-collapse collapse" aria-expanded="false">
											<div class="panel-body bg-grey">
												<p>
													<ul>
														<li>Ambil nomor antrian transaksi teller dan isi slip setoran</li>
														<li>Serahkan slip dan jumlah setoran kepada teller BCA</li>
														<li>Teller BCA akan melakukan validasi transaksi sebelum Anda menyerahkan dana</li>
														<li>Simpan slip setoran hasil validasi sebagai bukti pembayaran</li>
													</ul>
												</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
		
	</div>
</section>