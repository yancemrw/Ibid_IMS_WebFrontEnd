<section class="section section-auction">
	<div class="container">
		<div class="row">
			<div class="col-md-7 col-sm-6">
				<h2>Keuntungan Titip lelang di IBID?</h2>
				<ul class="auction-info clearfix">
					<li class="item">
						<div class="form-info ic ic-Mudah"></div>
						<div class="content-media">
							<h2>Mudah</h2>
							<p>Proses registrasi dan pemilihan jadwal inspeksi kendaraan cukup dengan mengisi form via website.</p>
						</div>
					</li>
					<li class="item">
						<div class="form-info ic ic-Cepat"></div>
						<div class="content-media">
							<h2>Cepat</h2>
							<p>Setelah melalui proses inspeksi, apapun kendaraan Anda dapat langsung ikut dilelang pada jadwal lelang terdekat </p>
						</div>
					</li>
					<li class="item">
						<div class="form-info ic ic-Harga-Jual-Optimal"></div>
						<div class="content-media">
							<h2>Harga Jual Option</h2>
							<p>Setelah melalui proses inspeksi, apapun kendaraan Anda dapat langsung ikut dilelang pada jadwal lelang terdekat </p>
						</div>
					</li>
					<li class="item">
						<div class="form-info ic ic-Cepat-Terjual"></div>
						<div class="content-media">
							<h2>Cepat Terjual</h2>
							<p>Setelah melalui proses inspeksi, apapun kendaraan Anda dapat langsung ikut dilelang pada jadwal lelang terdekat </p>
						</div>
					</li>
					<li class="item">
						<div class="form-info ic ic-Solusi-Jual-Aset"></div>
						<div class="content-media">
							<h2>Solusi Jual Asset Kendaraan Perusahaan</h2>
							<p>erusahaan ingin menjual asset kendaraan? Titip jual saja via lelang. Mudah, aman & efisien. <a href="">Hubungi kami sekarang</a>, tim kami siap membantu.</p>
						</div>
					</li>
				</ul>
			</div>
			<div class="col-md-5 col-sm-6">
				<div class="booking-schedule">
					<h2>Perbaharui Data Anda <span>Hanya di Isi Untuk User Baru</span></h2>
					<form class="form-filter">
						<div class="form-group floating-label">
							<input type="text" name="" id="notif-telepon" class="form-control input-custom" />
							<label class="label-schedule">No Telepon</label>
							<div class="help-info help-info-1">
								<i class="fa fa-info"></i> Pastikan nomor handphone yang Anda masukan aktif
							</div>
						</div>
						<div class="form-group">
							<select class="form-control select-custom">
								<option>Bank</option>
								<option>BCA</option>
								<option>MANDIRI</option>
								<option>BRI</option>
							</select>
						</div>
						<div class="form-group floating-label">
							<input type="text" name="" id="notif-rekening" class="form-control input-custom" />
							<label class="label-schedule">Nomor Rekening</label>
							<div class="help-info help-info-2">
								<i class="fa fa-info"></i> Nomor rekening merupakan nomor rekening yang di gunakan ibid untuk pengembalian deposit. mohon periksa nomor rekening tersebut dengan benar
							</div>
						</div>
						<div class="form-group floating-label">
							<input type="text" name="" class="form-control input-custom" />
							<label class="label-schedule">Atas Nama</label>
						</div>
						<div class="form-group">
							<select class="form-control select-custom" id="biodata">
								<option value="0">Tipe Identitas Diri</option>
								<option value="k">Pilih Ktp</option>
								<option value="n">Pilih Npwp</option>
							</select>
						</div>
						<div class="form-group floating-label" id="ktp" style="display: none;">
							<input type="text" name="" class="form-control input-custom" />
							<label class="label-schedule">Nomor KTP</label>
						</div>
						<div class="form-group floating-label" id="npwp" style="display: none;">
							<input type="text" name="" class="form-control input-custom" />
							<label class="label-schedule">MPWP</label>
						</div>
						<div class="g-recaptcha" data-theme="light" data-sitekey="XXXXXXXXXXXXX" style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;">
						</div>
						<div class="g-recaptcha recaptcha" id="idrecaptcha" required></div>
						<div class="input-group agree-required">
							<input type="checkbox" name="checkbox" id="agree-required" />
							<label for="agree-required">Dengan melakukan pendaftaran, saya setuju dengan <a href="">Kebijakan Privasi</a> dan <a href="">Syarat & Ketentuan</a> IBID.</label>
						</div>
						<button class="btn btn-green" onclick="location.href='titip-lelang.html'" type="button">KIRIM</button>
                    </form>
                </div>
            </div>
		</div>
	</div>
</section>

<script>
	$(document).ready(function() {
		$("nav").sticky({
			topSpacing:0
		});

		$(".select-custom").select2({
			minimumResultsForSearch: -1
		});

		$('.input-group.date').datepicker({
			format: "dd//mm/yyyy"
		});

		$("input[name$='tipe-object']").click(function() {
			var test = $(this).val();
			$(".desc-object").hide();
			$("#object" + test).show();
		});

		$('.auction-info').slick({
			dots: false,
			infinite: false,
			speed: 300,
			prevArrow: false,
			nextArrow: false,
			slidesToShow: 5,
			slidesToScroll: 5,
			responsive: [
				{
					breakpoint: 768,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1,
						dots: true,
						prevArrow: false,
						nextArrow: false
					}
				}
			]
		});

	    $('input').blur(function() {
			tmpval = $(this).val();
			if(tmpval == '') {
				$(this).addClass('empty');
				$(this).removeClass('not-empty');
			}
			else {
				$(this).addClass('not-empty');
				$(this).removeClass('empty');
			}
		});

		$('#toggle-nav').click(function() {
			$('.navbar-collapse.collapse').toggleClass('open')
		})

		$('.nav-close').click(function() {
			$('.navbar-collapse.collapse').toggleClass('open')
		})
	         
		$('.lang-mob a').click(function() {
			$('.help-mob ul').removeClass('open')
			$(this).toggleClass('opened')
			$(this).siblings('ul').toggleClass('open')
		});

		$('.help-mob a').click(function() {
			$('.lang-mob ul').removeClass('open')
			$(this).toggleClass('opened')
			$(this).siblings('ul').toggleClass('open')
		});


		$("#notif-rekening").on("focus", function(e) {
			$('.help-info-2').show();
		});

		$("#notif-telepon").on("focus", function(e) {
			$('.help-info-1').show();
		});

		// input identity
		$(function() {
			$("#biodata").change(function() {
				if ($(this).val() == "k") {
					$("#ktp").show() && $("#npwp").hide();
				}
				else if ($(this).val() == "n") {
					$("#npwp").show() && $("#ktp").hide(); 
				}
				else {
					$("#npwp").hide() && $("#ktp").hide();
				}
			});
		});
	});
</script>