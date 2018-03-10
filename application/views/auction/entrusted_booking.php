<link rel="stylesheet" href="<?php echo base_url('assetsfront/air-datepicker/dist/css/datepicker.min.css'); ?>">
<script src="<?php echo base_url('assetsfront/air-datepicker/dist/js/datepicker.min.js'); ?>"></script>
<script src="<?php echo base_url('assetsfront/air-datepicker/dist/js/i18n/datepicker.en.js'); ?>"></script>
<section class="section section-auction">
	<div class="container">
		<div class="row">
			<div class="col-md-7 col-sm-6">
				<h2>Keuntungan Titip lelang di IBID?</h2>
				<ul class="auction-info clearfix">
					<li class="item">
						<div class="form-info ic ic-Mudah display-block"></div>
						<div class="content-media">
							<h2>Mudah</h2>
							<p>Proses registrasi dan pemilihan jadwal inspeksi kendaraan cukup dengan mengisi form via website.</p>
						</div>
					</li>
					<li class="item">
						<div class="form-info ic ic-Cepat display-block"></div>
						<div class="content-media">
							<h2>Cepat</h2>
							<p>Setelah melalui proses inspeksi, apapun kendaraan Anda dapat langsung ikut dilelang pada jadwal lelang terdekat </p>
						</div>
					</li>
					<li class="item">
						<div class="form-info ic ic-Harga-Jual-Optimal display-block"></div>
						<div class="content-media">
							<h2>Harga Jual Option</h2>
							<p>Setelah melalui proses inspeksi, apapun kendaraan Anda dapat langsung ikut dilelang pada jadwal lelang terdekat </p>
						</div>
					</li>
					<li class="item">
						<div class="form-info ic ic-Cepat-Terjual display-block"></div>
						<div class="content-media">
							<h2>Cepat Terjual</h2>
							<p>Setelah melalui proses inspeksi, apapun kendaraan Anda dapat langsung ikut dilelang pada jadwal lelang terdekat </p>
						</div>
					</li>
					<li class="item">
						<div class="form-info ic ic-Solusi-Jual-Aset display-block"></div>
						<div class="content-media">
							<h2>Solusi Jual Asset Kendaraan Perusahaan</h2>
							<p>erusahaan ingin menjual asset kendaraan? Titip jual saja via lelang. Mudah, aman & efisien. <a href="">Hubungi kami sekarang</a>, tim kami siap membantu.</p>
						</div>
					</li>
				</ul>
			</div>
			<div class="col-md-5 col-sm-6">
				<div class="booking-schedule">
					<h2>Booking Schedule dan Data Kendaraan</h2>
					<form class="form-filter">
					<div class="object-type clearfix">
						<div class="form-group">
							<input type="radio" name="tipe-object" id="type_1" class="input-hidden" value="1" checked />
							<label for="type_1">
								<div class="car-type ic ic-Mobil"></div>
								<p>Mobil</p>
							</label>
						</div>
						<div class="form-group">
							<input type="radio" name="tipe-object" id="type_2" class="input-hidden" value="2" />
							<label for="type_2">
								<div class="motorcycle-type ic ic-Motor"></div>
								<p>Motor</p>
							</label>
						</div>
						<div class="form-group">
							<input type="radio" name="tipe-object" id="type_4" class="input-hidden" value="4" />
							<label for="type_4">
								<div class="gadget-type ic ic-Gadget"></div>
								<p>Gadget</p>
							</label>
						</div>
						<div class="form-group">
							<input type="radio" name="tipe-object" id="type_3" class="input-hidden" value="3" />
							<label for="type_3">
								<div class="hve-type ic ic-HVE"></div>
								<p>HVE</p>
							</label>
						</div>
					</div>
					<div id="object1" class="desc-object" style="display:block;">
						<div class="form-group floating-label">
							<input type="text" name="" class="form-control input-custom">
							<label class="label-schedule">No Polisi</label>
						</div>
						<div class="form-group floating-label">
							<select class="select-custom form-control class-merk">
								<option value="0">Merk</option>
								<option value="other-merk1">Lainnya</option>
							</select>
						</div>
						<div class="form-group floating-label other-option" id="other-merk1" style="display:none">
							<input type="text" name="" class="form-control input-custom">
							<label class="label-schedule">Merk</label>
						</div>
						<div class="form-group floating-label">
							<select class="form-control select-custom class-seri">
								<option value="0">Seri</option>
								<option value="other-seri1">Lainnya</option>
							</select>
						</div>
						<div class="form-group floating-label other-option" id="other-seri1" style="display:none">
							<input type="text" name="" class="form-control input-custom">
							<label class="label-schedule">Seri</label>
						</div>
						<div class="form-group floating-label">
							<select class="form-control select-custom class-silinder">
								<option value="0">Silinder</option>
								<option value="other-silinder1">Lainnya</option>
							</select>
						</div>
						<div class="form-group floating-label other-option" id="other-silinder1" style="display:none">
							<input type="text" name="" class="form-control input-custom">
							<label class="label-schedule">Silinder</label>
						</div>
						<div class="form-group floating-label">
							<select class="form-control select-custom" id="tipe">
								<option value="0">Tipe</option>
								<option value="other-tipe">Lainnya</option>
							</select>
						</div>
						<div class="form-group floating-label other-option" id="other-tipe" style="display:none">
							<input type="text" name="" class="form-control input-custom">
							<label class="label-schedule">Tipe</label>
						</div>
						<div class="form-group floating-label">
							<input type="text" name="" class="form-control input-custom">
							<label class="label-schedule">Tahun</label>
						</div>
						<div class="input-group date">
							<input type="text" class="border-radius-none disabled-white form-control floating-handle height-50px" id="tgl-lahir1" name="dob" placeholder="Tanggal Lahir" value="" readonly>
							<span class="input-group-addon cursor-pointer" id="tgl-lahir-span1">
							<i class="fa fa-calendar"></i>
							</span>
						</div>
					</div>
					<div id="object2" class="desc-object">
						<div class="form-group floating-label">
							<input type="text" name="" class="form-control input-custom">
							<label class="label-schedule">No Polisi</label>
						</div>
						<div class="form-group floating-label">
							<select class="select-custom form-control class-merk">
								<option value="0">Merk</option>
								<option value="other-merk2">Lainnya</option>
							</select>
						</div>
						<div class="form-group floating-label other-option" id="other-merk2" style="display:none">
							<input type="text" name="" class="form-control input-custom">
							<label class="label-schedule">Merk</label>
						</div>
						<div class="form-group floating-label">
							<select class="form-control select-custom class-seri">
								<option value="0">Seri</option>
								<option value="other-seri2">Lainnya</option>
							</select>
						</div>
						<div class="form-group floating-label other-option" id="other-seri2" style="display:none">
							<input type="text" name="" class="form-control input-custom">
							<label class="label-schedule">Seri</label>
						</div>
						<div class="form-group floating-label">
							<select class="form-control select-custom class-silinder">
								<option value="0">Silinder</option>
								<option value="other-silinder2">Lainnya</option>
							</select>
						</div>
						<div class="form-group floating-label other-option" id="other-silinder2" style="display:none">
							<input type="text" name="" class="form-control input-custom">
							<label class="label-schedule">Silinder</label>
						</div>
						<div class="form-group floating-label">
							<input type="text" name="" class="form-control input-custom">
							<label class="label-schedule">Tahun</label>
						</div>
						<div class="input-group date">
							<input type="text" class="border-radius-none disabled-white form-control floating-handle height-50px" id="tgl-lahir2" name="dob" placeholder="Tanggal Lahir" value="" readonly>
							<span class="input-group-addon cursor-pointer" id="tgl-lahir-span2">
							<i class="fa fa-calendar"></i>
							</span>
						</div>
					</div>
					<div id="object3" class="desc-object">
						<div class="form-group floating-label">
							<input type="text" name="" class="form-control input-custom">
							<label class="label-schedule">No Polisi</label>
						</div>
						<div class="form-group floating-label">
							<select class="select-custom form-control class-merk">
								<option value="0">Merk</option>
								<option value="other-merk3">Lainnya</option>
							</select>
						</div>
						<div class="form-group floating-label other-option" id="other-merk3" style="display:none">
							<input type="text" name="" class="form-control input-custom">
							<label class="label-schedule">Merk</label>
						</div>
						<div class="form-group floating-label">
							<select class="form-control select-custom class-seri">
								<option value="0">Seri</option>
								<option value="other-seri3">Lainnya</option>
							</select>
						</div>
						<div class="form-group floating-label other-option" id="other-seri3" style="display:none">
							<input type="text" name="" class="form-control input-custom">
							<label class="label-schedule">Seri</label>
						</div>
						<div class="form-group floating-label">
							<select class="form-control select-custom class-silinder">
								<option value="0">Silinder</option>
								<option value="other-silinder3">Lainnya</option>
							</select>
						</div>
						<div class="form-group floating-label other-option" id="other-silinder3" style="display:none">
							<input type="text" name="" class="form-control input-custom">
							<label class="label-schedule">Silinder</label>
						</div>
						<div class="form-group floating-label">
							<input type="text" name="" class="form-control input-custom">
							<label class="label-schedule">Tahun</label>
						</div>
						<div class="input-group date">
							<input type="text" class="border-radius-none disabled-white form-control floating-handle height-50px" id="tgl-lahir3" name="dob" placeholder="Tanggal Lahir" value="" readonly>
							<span class="input-group-addon cursor-pointer" id="tgl-lahir-span3">
							<i class="fa fa-calendar"></i>
						</div>
					</div>
					<div id="object4" class="desc-object">
						<div class="form-group floating-label">
							<input type="text" name="" class="form-control input-custom">
							<label class="label-schedule">No Polisi</label>
						</div>
						<div class="form-group floating-label">
							<select class="select-custom form-control class-merk">
								<option value="0">Merk</option>
								<option value="other-merk4">Lainnya</option>
							</select>
						</div>
						<div class="form-group floating-label other-option" id="other-merk4" style="display:none">
							<input type="text" name="" class="form-control input-custom">
							<label class="label-schedule">Merk</label>
						</div>
						<div class="form-group floating-label">
							<select class="form-control select-custom class-seri">
								<option value="0">Seri</option>
								<option value="other-seri4">Lainnya</option>
							</select>
						</div>
						<div class="form-group floating-label other-option" id="other-seri4" style="display:none">
							<input type="text" name="" class="form-control input-custom">
							<label class="label-schedule">Seri</label>
						</div>
						<div class="form-group floating-label">
							<select class="form-control select-custom class-silinder">
								<option value="0">Silinder</option>
								<option value="other-silinder4">Lainnya</option>
							</select>
						</div>
						<div class="form-group floating-label other-option" id="other-silinder4" style="display:none">
							<input type="text" name="" class="form-control input-custom">
							<label class="label-schedule">Silinder</label>
						</div>
						<div class="form-group floating-label">
							<input type="text" name="" class="form-control input-custom">
							<label class="label-schedule">Tahun</label>
						</div>
						<div class="input-group date">
							<input type="text" class="border-radius-none disabled-white form-control floating-handle height-50px" id="tgl-lahir4" name="dob" placeholder="Tanggal Lahir" value="" readonly>
							<span class="input-group-addon cursor-pointer" id="tgl-lahir-span4">
							<i class="fa fa-calendar"></i>
						</div>
					</div>
					<h3>Syarat & Ketentuan Lelang.</h3>
					<ol>
						<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
						<li>It has survived not only five centuries, but also the leap into electronic typesetting.</li>
						<li>It was popularised in the 1960s with the release of Letraset... <a href="">Lihat Selengkapnya</a></li>
					</ol>
					<button class="btn btn-green" onclick="location.href='titip-lelang-success.html'" type="button">KIRIM</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

<script>
	$("input[name$='tipe-object']").click(function() {
		var test = $(this).val();
		$(".desc-object").hide();
		$("#object" + test).show();
	});

	$('.class-merk').each(function(x) {
		$(this).change(function() {
			var count = x + 1;
			if($(this).val() == 'other-merk'+count) {
				$('#other-merk'+count).show();
			} else {
				$('#other-merk'+count).hide();
			}
		});
	});

	$('.class-seri').each(function(x) {
		$(this).change(function() {
			var count = x + 1;
			if($(this).val() == 'other-seri'+count) {
				$('#other-seri'+count).show();
			} else {
				$('#other-seri'+count).hide();
			}
		});
	});

	$('.class-silinder').each(function(x) {
		$(this).change(function() {
			var count = x + 1;
			if($(this).val() == 'other-silinder'+count) {
				$('#other-silinder'+count).show();
			} else {
				$('#other-silinder'+count).hide();
			}
		});
	});

	$("#tipe").change(function() {
		if ($(this).val() == "other-tipe") {
			$("#other-tipe").show()
		} else {
			$("#other-tipe").hide()
		}
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

	// datepicker
	for(var i = 1; i <= 4; i++) {
		$('#tgl-lahir'+i).datepicker({
			language: 'en',
			maxDate: new Date(),
			dateFormat: 'dd/mm/yyyy',
			autoClose: true
		});
		$('#tgl-lahir-span'+i).click(function() {
			$('#tgl-lahir'+i).focus();
		});
	}

	$('input').blur(function() {
		tmpval = $(this).val();
		if (tmpval == '') {
			$(this).addClass('empty');
			$(this).removeClass('not-empty');
		} else {
			$(this).addClass('not-empty');
			$(this).removeClass('empty');
		}
	});
</script>