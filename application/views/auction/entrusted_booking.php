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
					<form class="form-filter" action="<?php echo site_url('auction/entrusted_booking/saveBooking'); ?>" method="POST" target="_blank">
					<div class="object-type clearfix">
						<div class="form-group">
							<input type="radio" name="tipe-object" id="type_1" class="input-hidden" value="6" checked />
							<label for="type_1">
								<div class="car-type ic ic-Mobil"></div>
								<p>Mobil</p>
							</label>
						</div>
						<div class="form-group">
							<input type="radio" name="tipe-object" id="type_2" class="input-hidden" value="7" />
							<label for="type_2">
								<div class="motorcycle-type ic ic-Motor"></div>
								<p>Motor</p>
							</label>
						</div>
						<div class="form-group">
							<input type="radio" name="tipe-object" id="type_4" class="input-hidden" value="12" />
							<label for="type_4">
								<div class="gadget-type ic ic-Gadget"></div>
								<p>Gadget</p>
							</label>
						</div>
						<div class="form-group">
							<input type="radio" name="tipe-object" id="type_3" class="input-hidden" value="14" />
							<label for="type_3">
								<div class="hve-type ic ic-HVE"></div>
								<p>HVE</p>
							</label>
						</div>
					</div>
					<div id="object6" class="desc-object" style="display: block">
						<?php foreach($formDinamisMobil as $row){ echo $row['typeInput']; } ?>
						
					</div>
					<div id="object7" class="desc-object">
						<?php foreach($formDinamisMotor as $row){ echo $row['typeInput']; } ?>
					</div>
					<div id="object14" class="desc-object">
						<?php foreach($formDinamisHve as $row){ echo $row['typeInput']; } ?>
						<!-- div class="form-group floating-label">
							<input type="text" name="" class="form-control input-custom">
							<label class="label-schedule">No Polisi untuk HVE</label>
						</div -->
					</div>
					<div id="object12" class="desc-object">
						<?php foreach($formDinamisGadget as $row){ echo $row['typeInput']; } ?>
						<!-- div class="form-group floating-label">
							<input type="text" name="" class="form-control input-custom">
							<label class="label-schedule">No Polisi untuk gadget</label>
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
							</span>
						</div -->
					</div>
					<div>
						<div class="form-group floating-label">
							<div class="form-group floating-label">
								<textarea class="form-control border-radius-none" name="deskripsi" rows="3"></textarea>
								<label class="label-schedule">Deskripsi</label>
							</div>
						</div>
					</div>
					<div>
						<div class="form-group floating-label">
							<select class="select-custom form-control" id="cabangLelang" name="cabang">
								<option value="">-Pilih Cabang-</option>
								<?php foreach($cabang as $row){ ?>
								<option value="<?php echo $row['CompanyId']; ?>" ><?php echo strtoupper(strtolower($row['CompanyName'])); ?></option>
								<?php } ?>
							</select>
						</div>
						<div id="thisFieldTanggal" class="input-group-ss form-group floating-label">
							<select class="select-custom form-control" id="tanggalLelang" name="ScheduleBookingCalendarId">
								<option value="">-Pilih Tanggal-</option>
							</select>
							<span class="input-group-addon thisFaSs" style="display: none"><i class="fa fa-spin fa-refresh"></i></span>
						</div>
						<!-- div class="input-group date">
							<input type="text" class="border-radius-none disabled-white form-control floating-handle height-50px" id="tanggalLelang" name="ScheduleBookingCalendarId" placeholder="Tanggal Lelang" readonly>
							<span class="input-group-addon cursor-pointer" id="tgl-lahir-span">
							<i class="fa fa-calendar"></i>
							</span>
						</div -->
					</div>
					
					<h3>Syarat & Ketentuan Lelang.</h3>
					<ol>
						<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
						<li>It has survived not only five centuries, but also the leap into electronic typesetting.</li>
						<li>It was popularised in the 1960s with the release of Letraset... <a href="">Lihat Selengkapnya</a></li>
					</ol>
					<button class="btn btn-green" type="submit">KIRIM</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

<script>
function searchJadwal(){
	itemId = $("input[name$='tipe-object']:checked").val();
	cabang = $('#cabangLelang').val();
	if (cabang != ''){
		$.ajax( {
			url: "<?php echo linkservice('taksasi') ."schedule/search"; ?>",
			dataType: "json",
			method: 'GET',
			data: {
				cab: cabang,
				item: itemId,
			},
			beforeSend: function( ) {
				$('#formDinamis').html('');
				$('#thisFieldTanggal span').removeAttr('style');
				$('#thisFieldTanggal').removeClass('input-group-ss');
				$('#thisFieldTanggal').addClass('input-group');
				
				$('#tanggalLelang option').remove();
				$('#tanggalLelang')
					.append($("<option></option>")
					.attr("value",'')
					.text("-Pilih Tanggal-"));
			},
			success: function( data ) {
				thisArr = data.data;
				for(i=0; i<thisArr.length; i++){
					row = thisArr[i];
					$('#tanggalLelang')
						.append($("<option></option>")
						.attr("value",row.ScheduleBookingCalendarId)
						.text(row.AvailableDate));
				}
			},
			complete: function(){
				$('#thisFieldTanggal span.thisFaSs').css('display','none');
				$('#thisFieldTanggal').addClass('input-group-ss');
				$('#thisFieldTanggal').removeClass('input-group');
			}
		});
	}
}
$(function(){
	$('#cabangLelang').change(function(){
		searchJadwal();
	});
	$("input[name$='tipe-object']").click(function() {
		var test = $(this).val();
		$(".desc-object").hide();
		$("#object" + test).show();
		
		searchJadwal();
		
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
	// $('#tanggalLelang').datepicker({
		// language: 'en',
		// minDate: new Date(),
		// dateFormat: 'dd/mm/yyyy',
		// autoClose: true
	// });
	// $('#tgl-lahir-span').click(function() {
		// $('#tanggalLelang').focus();
	// });

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

	$('textarea').blur(function() {
        tmpval = $(this).val();
        if(tmpval == '') {
            $(this).addClass('empty');
            $(this).removeClass('not-empty');
        } else {
            $(this).addClass('not-empty');
            $(this).removeClass('empty');
        }
    });
	
});
</script>