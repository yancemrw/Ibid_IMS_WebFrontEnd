<script src='https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit' async defer></script>
<script>
    var verifyCallback = function(response) {
        $('#e8df0fade2ce52c6a8cf8c8d2309d08a').val(response);
    };
    var onloadCallback = function() {
        grecaptcha.render('idrecaptcha', {
            'sitekey'   : '6Lee4z8UAAAAAG8bdnCYM-ZKfsRa6fniZlq5HTRn',
            'callback'  : verifyCallback,
            'theme'     : 'light'
        });
    };
</script>

<section class="section section-auction">
	<input type="hidden" id="e8df0fade2ce52c6a8cf8c8d2309d08a" />
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
					<h2>Lengkapi data Anda <span>* Khusus pengguna baru</span></h2>
					<form class="form-filter" id="beli-npl" data-provide="validation">
						<input type="hidden" name="otpkirim" value="true">
						<div class="form-group floating-label">
							<input type="number" name="Phone" id="notif-telepon" class="form-control input-custom"
									value="<?php echo @$detailBiodata['Phone']; ?>" 
									oninvalid="this.setCustomValidity('No telepon tidak boleh kosong')" 
									oninput="setCustomValidity('')" required />
							<label class="label-schedule">No Telepon *</label>
							<div class="help-info help-info-1">
								<i class="fa fa-info"></i> Pastikan nomor telepon aktif
							</div>
						</div>
						<div class="form-group">
							<select class="form-control select-custom" name="BankId" 
                                    oninvalid="this.setCustomValidity('Tipe bank tidak boleh kosong')" 
                                    onchange="setCustomValidity('')" required>
                                <option value="">Bank *</option>
                                <?php foreach($listBank as $row){ ?>
                                <option value="<?php echo $row->BankId; ?>" <?php echo (@$detailBiodata['BankId'] == $row->BankId) ? 'selected' : ''; ?>><?php echo $row->BankName; ?></option>
                                <?php } ?>
                            </select>
						</div>
						<div class="form-group floating-label">
							<input type="number" name="BankAccountNumber" id="notif-rekening" class="form-control input-custom" 
									value="<?php echo @$detailBiodata['BankAccountNumber']; ?>" 
                                    oninvalid="this.setCustomValidity('Nomor rekening tidak boleh kosong')" 
                                    oninput="setCustomValidity('')" required />
							<label class="label-schedule">Nomor Rekening *</label>
							<div class="help-info help-info-2">
								<i class="fa fa-info"></i> IBID membutuhkan nomor rekening Anda untuk pengembalian deposit. Pastikan nomor rekening sudah benar.
							</div>
						</div>
						<div class="form-group floating-label">
							<input type="text" name="BankAccountName" class="form-control input-custom"
									value="<?php echo @$detailBiodata['BankAccountName']; ?>" oninvalid="this.setCustomValidity('Atas nama tidak boleh kosong')" 
                                    oninput="setCustomValidity('')" required />
							<label class="label-schedule">Atas Nama *</label>
						</div>
						<div class="form-group floating-label" id="ktp">
                            <input type="number" name="IdentityNumber" id="notif-identity" class="form-control input-custom"  
                                    value="<?php echo @$detailBiodata['IdentityNumber']; ?>"
                                    oninvalid="this.setCustomValidity('Nomor KTP tidak boleh kosong')" 
                                    oninput="setCustomValidity('')" required />
                            <label class="label-schedule">Nomor KTP *</label>
                        </div>
                        <div class="g-recaptcha recaptcha" id="idrecaptcha" required></div>
                        <div class="input-group agree-required">
                            <input type="checkbox" name="checkbox" id="agree-required" class="cursor-pointer">
                            <label for="agree-required">Dengan melakukan pendaftaran, saya setuju dengan <a href="javascript:void(0)" data-toggle="modal" data-target="#privacy-modal">Kebijakan Privasi</a> dan <a href="javascript:void(0)" data-toggle="modal" data-target="#bijak-modal">Syarat & Ketentuan</a> IBID.</label>
                        </div>
						<button class="btn btn-green" id="btn-kirim">KIRIM</button>
                    </form>
                </div>
            </div>
		</div>
	</div>
</section>

<!-- MODAL PRIVASI -->
<div class="modal fade" id="privacy-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog width-80">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><i class="ic ic-Close"></i><span class="sr-only">Close</span></button>
        <h3 class="modal-title" id="lineModalLabel">Kebijakan Privasi</h3>
      </div>
      <div class="modal-body clearfix">
        <div class="col-md-12 col-sm-12">
          <?php $this->load->view('userguide/privacy_policy.html'); ?>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- MODAL Syarat & Ketentuan -->
<div class="modal fade" id="bijak-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog width-80">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><i class="ic ic-Close"></i><span class="sr-only">Close</span></button>
        <h3 class="modal-title" id="lineModalLabel">Syarat & Ketentuan IBID</h3>
      </div>
      <div class="modal-body clearfix">
        <div class="col-md-12 col-sm-12">
          <?php $this->load->view('userguide/syarat_ketentuan.html'); ?>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
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

$("input[name$='tipe-object']").click(function() {
	var test = $(this).val();
	$(".desc-object").hide();
	$("#object" + test).show();
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

// handle input if exists data
$('input').each(function() {
	if($(this).val() !== '') {
		$(this).addClass('not-empty');
	}
});

$('.lang-mob a').click(function() {
	$('.help-mob ul').removeClass('open')
	$(this).toggleClass('opened')
	$(this).siblings('ul').toggleClass('open')
})
$('.help-mob a').click(function(){
	$('.lang-mob ul').removeClass('open')
	$(this).toggleClass('opened')
	$(this).siblings('ul').toggleClass('open')
})


$("#notif-rekening").on("focus", function( e ) {
	$('.help-info-2').show();
});
$("#notif-telepon").on("focus", function( e ) {
	$('.help-info-1').show();
});

$('#notif-telepon').on('keypress', function(e) {console.log(e.keyCode);
	var max = 13;
	if(e.keyCode === 46 || e.keyCode === 44) {
		event.preventDefault();
		return false;
	}
	else {
		if($('#notif-telepon').val().length >= max) {
			$('#notif-telepon').val($('#notif-telepon').val().substr(0, max));
		}
	}
});

$('#notif-rekening').on('keypress', function(e) {
	var max = 16;
	if(e.keyCode === 46 || e.keyCode === 44) {
		event.preventDefault();
		return false;
	}
	else {
		if($('#notif-rekening').val().length >= max) {
			$('#notif-rekening').val($('#notif-rekening').val().substr(0, max));
		}
	}
});

$('#notif-identity').on('keypress', function(e) {
	var max = 16;
	if(e.keyCode === 46 || e.keyCode === 44) {
		event.preventDefault();
		return false;
	}
	else {
		if($('#notif-identity').val().length >= max) {
			$('#notif-identity').val($('#notif-identity').val().substr(0, max));
		}
	}
});

// input identity
$(function() {
	$("#biodata").change(function() {
		if ($(this).val() == "k") {
			$("#ktp").show() && $("#npwp").hide();
		} else if ($(this).val() == "n") {
			$("#npwp").show() && $("#ktp").hide();
		} else {
			$("#npwp").hide() && $("#ktp").hide();
		}
	});
});

// handle only number
$('input[name="Phone"]').keypress(function(event) {
	var charCode = (event.which) ? event.which : event.keyCode;
	return ((charCode >= 48 && charCode <= 57) || charCode === 46);
});

$('input[name="BankAccountNumber"]').keypress(function(event) {
	var charCode = (event.which) ? event.which : event.keyCode;
	return ((charCode >= 48 && charCode <= 57) || charCode === 46);
});

$('input[name="IdentityNumber"]').keypress(function(event) {
	var charCode = (event.which) ? event.which : event.keyCode;
	return ((charCode >= 48 && charCode <= 57) || charCode === 46);
});

// handle button kirim
$('#btn-kirim').click(function(e) {
	var phone     = $('input[name="Phone"]').val(), 
		bankid    = $('select[name="BankId"]').val(), 
		bankacc   = $('input[name="BankAccountNumber"]').val(), 
		bankname  = $('input[name="BankAccountName"]').val(),
		ktp       = $('input[name="IdentityNumber"]').val(),
		otpkirim  = $('input[name="otpkirim"]').val(),
		recaptcha = $('#e8df0fade2ce52c6a8cf8c8d2309d08a').val();
	if(phone !== '' && bankid !== '' && bankacc !== '' && bankname !== '' && ktp !== '') {
	if(ktp.length < 16) {
		bootoast.toast({
			message: 'Nomor KTP harus 16 angka!',
			type: 'warning',
			position: 'top-center'
		});
		return false;
	}
	else if(recaptcha === '') {
		bootoast.toast({
			message: 'Mohon klik CAPTCHA untuk melanjutkan',
			type: 'warning',
			position: 'top-center'
		});
		return false;
	}
	else if($('#agree-required').is(":checked") === false) {
		bootoast.toast({
			message: 'Silahkan centang untuk menyetujui Syarat & Ketentuan juga Kebijakan Privasi IBID',
			type: 'warning',
			position: 'top-center'
		});
		return false;
	}
	else {
		$('#btn-kirim').attr('disabled', true);
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url("biodata/otp"); ?>',
			data: 'Phone='+phone+'&BankId='+bankid+'&BankAccountNumber='+bankacc+'&BankAccountName='+bankname+'&IdentityNumber='+ktp+'&otpkirim='+otpkirim+'&otpsource=titip',
			success: function(data) {
				var data = JSON.parse(data);
				if(data.status === 1) {
					bootoast.toast({
						message: data.messages,
						type: 'warning',
						position: 'top-center',
						timeout: 3
					});
					setTimeout(function() {
						location.href = data.redirect;
						$('#btn-kirim').attr('disabled', false);
					}, 1500);
				}
				else {
				$('#btn-kirim').attr('disabled', false);
					bootoast.toast({
						message: data.messages,
						type: 'warning',
						position: 'top-center',
						timeout: 4
					});
					if(data.redirect !== 'ktp') location.href = data.redirect;
				}
			},
			error: function() {
				$('#btn-kirim').attr('disabled', false);
					bootoast.toast({
						message: 'Terjadi kesalahan saat koneksi ke server',
						type: 'warning',
						position: 'top-center',
						timeout: 3
					});
				}
			});
			return false;
		}
	}
});
</script>